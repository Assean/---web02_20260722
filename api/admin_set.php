<?php
    include_once "db.php";
    $T_F = $_POST['T_F'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $pdo->exec("UPDATE `admin_set` SET `T_F` = '$T_F', `start_time` = '$start_time', `end_time` = '$end_time' WHERE `admin_set`.`id` = 1;");
    header("location:../admin.php");