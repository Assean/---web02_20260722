<?php
    include_once "db.php";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $check_password = $_POST['check_password'];
    $fetch_user = $pdo->query("SELECT * FROM `users` WHERE `username` = '$username'")->fetch();
    if($fetch_user > 1){
        echo "<script>alert('帳號已存在');location.href='../register.php'</script>";
        exit;
    }
    if($password != $check_password){
        echo "<script>alert('密碼不一致');location.href='../register.php'</script>";
        exit;
    }
    $pdo->exec("INSERT INTO `users` (`id`, `username`, `email`, `password`, `img`, `bio`) VALUES (NULL, '$username', '$email', '$password', './assets/img/default.jpg', '尚未填寫自我介紹');");
    echo "<script>location.href='../login.php'</script>";