<?php include_once "api/db.php" ?>
<link rel="stylesheet" href="assets/css/bootstrap.css">
<script src="./assets/js/jqueryv3.7.1.js"></script>
<script src="./assets/js/bootstrap.js"></script>

<header class="site-header navbar navbar-expand-lg navbar-light bg-light shadow-sm px-4 py-2">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="brand">
            <a href="./index.php" class="brand-link navbar-brand">
                <img src="./assets/img/logo.png" width="90" height="90" class="rounded">
            </a>
        </div>
        <nav class="main-nav d-flex justify-content-center">
            <a href="./index.php" class="home-link btn btn-info m-1 text-white">首頁</a>
            <a href="./games.php" class="games-link btn btn-info m-1 text-white">遊戲</a>
            <a href="./friends.php" class="friends-link btn btn-info m-1 text-white">好友</a>
        </nav>
        <div class="user-area d-flex justify-content-end align-items-center">
            <?php if(!isset($_SESSION['user'])){ ?>
            <a href="./login.php" class="login-link btn btn-info m-1 text-white">登入</a>
            <a href="./register.php" class="register-link btn btn-info m-1 text-white">註冊</a>
            <?php }else{ ?>
            <div class="user-badge d-flex align-items-center me-2">
                <?php
                    $user = $pdo->query("SELECT * FROM `users` WHERE `username` = '{$_SESSION['user']}'")->fetch();
                ?>
                <img src="<?=$user['img']?>" width="90" height="90" class="rounded-circle me-2 border">
                <span class="fw-bold me-2"><?=$_SESSION['user']?></span>
            </div>
            <a href="./admin.php" class="admin-link btn btn-info m-1 text-white">意見調查/問卷管理</a>
            <a href="./profile.php" class="profile-link btn btn-info m-1 text-white">個人檔案</a>
            <a href="./api/logout.php" class="logout-link btn btn-info m-1 text-white">登出</a>
            <?php } ?>
        </div>
    </div>
</header>