<?php
    include_once "db.php";
    $key = $_POST['key'] ?? '';
    $result = $pdo->query("SELECT * FROM `users` WHERE `username` LIKE '%$key%'")->fetchAll();
    $_SESSION['key'] = $result;
    // print_r($_SESSION['key']);
    header("location:../friends.php");