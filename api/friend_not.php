<?php
    include_once "db.php";
    $send_user = $_GET['now_user'];
    $you_user = $_GET['you_user'];
    $pdo->exec("DELETE FROM friends WHERE `friends`.`send_user` = '$send_user' AND `you_user` = '$you_user'");
    header("location:../friends.php");