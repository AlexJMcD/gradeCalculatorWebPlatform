<?php
    function emptyInputRegister($student_id, $name, $email, $email_confirm, $pwd, $pwd_confirm){
        $result;
        if(empty($student_id) || empty($name) || empty($email) || empty($email_confirm) || empty($pwd) || empty($pwd_confirm)){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function invalidStudentID($student_id){
        $result;
        if(!preg_match("/^[0-9]*$/", $student_id)){
            $result=true;
        }
        else{
            $result = false;
        }  
        return $result;  
    }

    function invalidEmail($email){
        $result;
        if(filter_var(!$email, FILTER_VALIDATE_EMAIL)){
            $result=true;
        }
        else{
            $result = false;
        }  
        return $result;  
    }

    function pwdMatch($pwd, $pwd_confirm){
        $result;
        if($pwd !== $pwd_confirm){
            $result=true;
        }
        else{
            $result = false;
        }  
        return $result;  
    }

    function emailMatch($email, $email_confirm){
        $result;
        if($email !== $email_confirm){
            $result=true;
        }
        else{
            $result = false;
        }  
        return $result;  
    }

    function studentIDTaken($conn, $student_id){
        $result;
        $sql = "SELECT * FROM student WHERE studentID = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../register.php?error=stmtFailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $student_id);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }
    function emailTaken($conn, $email){
        $result;
        $sql = "SELECT * FROM student WHERE studentEmail = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../register.php?error=stmtFailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }

    function pwdShort($pwd){
        $result;
        if(strlen($pwd) < 7){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }


    #SQL prepared statements provide protection against SQL injection.
    #mySQLi is a more secure version of mysql.

    function createUser($conn, $student_id, $name, $email, $pwd){
        $sql = "INSERT INTO student (studentID, studentName, studentEmail, studentPassword) VALUES(?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../register.php?error=stmtFailed");
            exit();
        }
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "isss", $student_id, $name, $email, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../index.php?error=none");
        exit();
    }
#The PHP hashing function is regularely updated to maintain its secuirty.

#Login functions
function emptyInputLogin($student_id, $pwd){
    $result;
    if(empty($student_id) || empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
function loginUser($conn, $student_id, $pwd){
    $studentIDExists = studentIDTaken($conn, $student_id);

    if($studentIDExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $studentIDExists["studentPassword"];

    $checkPwd = password_verify($pwd, $pwdHashed);
    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    elseif($checkPwd === true){
        session_start();
        $_SESSION["studentid"] = $studentIDExists["studentID"];
        $_SESSION["studentName"] = $studentIDExists["studentName"];
        header("location: ../index.php");
        exit();
    }
}

#Saving results data functions:
function checkData($conn, $student_id, $mod_table){
    $sql = "SELECT * FROM $mod_table WHERE student_id = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../results.php?error=stmtFailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $student_id);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            $result = true;
            return $result;
        }
        else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
}

function storeData($conn, $mod_id, $student_id, $credits, $marks){
    if (checkData($conn, $student_id, $mod_id)){
        $sql = "UPDATE $mod_id SET credits = ?,marks = ? WHERE student_id = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../results.php?error=stmtFailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "iii", $credits, $marks, $student_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        #header("location: ../results.php?error=none");
        #exit();
    }else{
        $sql = "INSERT INTO $mod_id(student_id, credits, marks) VALUES(?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../results.php?error=stmtFailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "iii", $student_id, $credits, $marks);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        #header("location: ../results.php?error=none");
        #exit();
    }
}