<?php
require_once 'dbh.inc.php';
$mod_ID = array("comp7001", "comp7002", "tech7005", "dalt7002", "dalt7011", "soft7003", "tech7004", "tech7009");
$student = $_SESSION['studentid'];
$row = array();


for ($i=0; $i<count($mod_ID); $i++){
    $sql = "SELECT * FROM $mod_ID[$i] WHERE student_id = $student;";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        $result = mysqli_fetch_assoc($result);
        array_push($row, $result['credits'], $result['marks']);
    }else{
        array_push($row, "", "");
    }
}
