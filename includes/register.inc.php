<?php

if(isset($_POST["submit"])){
    $student_id = $_POST["student-number"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $email_confirm = $_POST["email-confirm"];
    $pwd = $_POST["password"];
    $pwd_confirm = $_POST["password-confirm"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputRegister($student_id, $name, $email, $email_confirm, $pwd, $pwd_confirm) !== false){
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    if(invalidStudentID($student_id) !== false){
        header("location: ../register.php?error=invalidStudentID");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../register.php?error=invalidEmail");
        exit();
    }
    if(emailMatch($email, $email_confirm) !== false){
        header("location: ../register.php?error=emailDiffer");
        exit();
    }
    if(pwdMatch($pwd, $pwd_confirm) !== false){
        header("location: ../register.php?error=pwdDiffer");
        exit();
    }
    if(studentIDTaken($conn, $student_id)){
        header("location: ../register.php?error=studentIDTaken");
        exit();
    }
    if(emailTaken($conn, $email)){
        header("location: ../register.php?error=emailTaken");
        exit();
    }
    if(pwdShort($pwd)){
        header("location: ../register.php?error=pwdShort");
        exit();
    }
    createUser($conn, $student_id, $name, $email, $pwd);
}
else{
    if(isset($_GET["error"])){
        echo"<div>error</div>";
    header("location: ../register.php");
    exit();
    }
}
#This funciton prevents someone from accessing the includes pages via direct address, they can only be accessed using the submit buttons.