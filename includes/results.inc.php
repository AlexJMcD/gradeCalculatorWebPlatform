<?php
    session_start();
    if(isset($_POST["submit"])){
        $mod_ID = array("comp7001", "comp7002", "tech7005", "dalt7002", "dalt7011", "soft7003", "tech7004", "tech7009");
        $credits = $_POST['credits'];
        $marks = $_POST['marks'];
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';
        for($i=0; $i<8; $i++){
            if(!empty($credits[$i]) && !empty($marks[$i])){
                storeData($conn, $mod_ID[$i], $_SESSION["studentid"], $credits[$i], $marks[$i]);
            }else if(!empty($credits[$i])){
                storeData($conn, $mod_ID[$i], $_SESSION["studentid"], $credits[$i], 0);
            }else if(!empty($marks[$i])){
                storeData($conn, $mod_ID[$i], $_SESSION["studentid"], 0, $marks[$i]);
            }else{
                storeData($conn, $mod_ID[$i], $_SESSION["studentid"], 0, 0);
            }
        }
        echo "<div>Your results have been successfully saved.</div>";
        header("location: ../results.php?error=none");
        exit();
    }else{
        if(isset($_GET["error"])){
            echo"<div>error</div>";
        header("location: ../result.php");
        exit();
        }
    }
    

