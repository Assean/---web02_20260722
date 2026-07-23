<?php
    include_once "db.php";
    $send_user = $_GET['now_user'];
    $you_user = $_GET['you_user'];
    $pdo->exec("INSERT INTO `friends` (`id`, `send_user`, `you_user`, `status`) VALUES (NULL, '$send_user', '$you_user', 'pending');");
    header("location:../friends.php");