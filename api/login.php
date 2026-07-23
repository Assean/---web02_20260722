<?php
    include_once "db.php";
    $username = $_POST['username'];
    // $email = $_POST['email'];
    $password = $_POST['password'];
    // $check_password = $_POST['check_password'];
    $fetch_user = $pdo->query("SELECT * FROM `users` WHERE `username` = '$username'")->fetch();
    $fetch_pass = $pdo->query("SELECT * FROM `users` WHERE `password` = '$password' AND `username` = '$username'")->fetch();
    if($fetch_user < 1){
        echo "<script>alert('帳號密碼錯誤');location.href='../login.php'</script>";
        exit;
    }
    if($fetch_pass < 1){
        echo "<script>alert('帳號密碼錯誤');location.href='../login.php'</script>";
        exit;
    }
    $_SESSION['user'] = $username;
    echo "<script>location.href='../profile.php'</script>";