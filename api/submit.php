<?php
    include_once "db.php";
    $game = $_POST['game'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $good_or_nono = $_POST['good_or_nono'];
    $good_text = $_POST['good_text'];
    $pdo->exec("INSERT INTO `form_result` (`id`, `game`, `name`, `email`, `good_or_nono`, `good_text`) VALUES (NULL, '$game', '$name', '$email', '$good_or_nono', '$good_text');");
    header("location:../form.php");