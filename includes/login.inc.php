<?php

if(isset($_POST["submit"])){
    $student_id = $_POST["studentID"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($student_id, $pwd) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $student_id, $pwd);
}
else{
    header("location: ../login.php");
}
#This funciton prevents someone from accessing the includes pages via direct address, they can only be accessed using the submit buttons.