<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="friends-page" class="container-fluid py-4">
        <?php
            include_once "inc/header.php";
            if(!isset($_SESSION['user']))exit(header("location:./login.php"));
            $user = $pdo->query("SELECT * FROM `users`")->fetch();
        ?>
        
        <!-- 搜尋 -->
        <div class="friend-search-section mb-4">
            <form action="./api/s_f.php" class="friend-search-form d-flex gap-2" method="post">
                <input type="text" class="search-input form-control" name="key">
                <button class="search-submit-button btn btn-info text-white text-nowrap">搜尋</button>
            </form>
            <!-- result -->
            <div class="search-result-list list-group mt-3">
                <?php
                    $result = $_SESSION['key'] ?? [];
                    foreach($result as $row){
                ?>
                <div class="search-result-item list-group-item d-flex justify-content-between align-items-center">
                    <div class="result-username fw-bold"><?=$row['username']?></div>
                    <a href="./friend-page.php?username=<?=$row['username']?>" class="view-profile-link btn btn-sm btn-outline-info">前往個人頁面</a>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="row g-4">
            <!-- 好友 -->
            <div class="friend-list-section col-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-header bg-info text-white">
                        <div class="section-title h4 mb-0">好友列表</div>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <?php
                                $friend = $pdo->query("SELECT * FROM `friends` WHERE `status` = 'friend' AND (`send_user` = '{$_SESSION['user']}' OR `you_user` = '{$_SESSION['user']}')")->fetchAll();
                                foreach($friend as $roow){
                                if($roow['send_user'] = $_SESSION['user']){
                                    $you_user = $roow['you_user'];
                                }else{
                                    $you_user = $roow['send_user'];
                                }
                                $friend_img = $pdo->query("SELECT * FROM `users` WHERE `username` = '$you_user'")->fetch();
                            ?>
                            <div class="col-6 col-sm-4 text-center">
                                <a href="./friend-page.php?username=<?=$you_user?>" class="text-decoration-none text-dark">
                                    <div class="friend-item border rounded p-2">
                                        <img src="<?=$friend_img['img']?>" width="90" height="110" class="friend-avatar img-fluid rounded mb-2 object-fit-cover">
                                        <div class="friend-name fw-bold text-truncate"><?=$you_user?></div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 我收到 -->
            <div class="incoming-requests-section col-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-header bg-info text-white">
                        <div class="section-title h4 mb-0">收到的好友申請</div>
                    </div>
                    <div class="card-body">
                        <?php
                            $request = $pdo->query("SELECT * FROM `friends` WHERE `status` = 'pending' AND `you_user` = '{$_SESSION['user']}'")->fetchAll();
                            foreach($request as $rooow){
                            $request_img = $pdo->query("SELECT * FROM `users` WHERE `username` = '{$rooow['send_user']}'")->fetch();
                        ?>
                        <div class="request-item d-flex align-items-center gap-3 border-bottom pb-3 mb-3">
                            <img src="<?=$request_img['img']?>" width="90" height="110" class="request-avatar rounded object-fit-cover">
                            <div class="flex-grow-1">
                                <div class="request-username fw-bold mb-2"><?=$request_img['username']?></div>
                                <div class="d-flex gap-2">
                                    <button class="accept-request-button btn btn-sm btn-success" onclick="location.href='./api/yes.php?send_user=<?=$rooow['send_user']?>&you_user=<?=$rooow['you_user']?>&status=<?=$rooow['status']?>'">接受</button>
                                    <button class="reject-request-button btn btn-sm btn-outline-danger" onclick="location.href='./api/no.php?send_user=<?=$rooow['send_user']?>&you_user=<?=$rooow['you_user']?>&status=<?=$rooow['status']?>'">拒絕</button>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- 我發送 -->
            <div class="sent-requests-section col-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-header bg-info text-white">
                        <div class="section-title h4 mb-0">發送的好友申請</div>
                    </div>
                    <div class="card-body">
                        <?php
                            $request_2 = $pdo->query("SELECT * FROM `friends` WHERE `status` = 'pending' AND `send_user` = '{$_SESSION['user']}'")->fetchAll();
                            foreach($request_2 as $roooow){
                            $request_img_2 = $pdo->query("SELECT * FROM `users` WHERE `username` = '{$roooow['you_user']}'")->fetch();
                        ?>
                        <div class="request-item d-flex align-items-center gap-3 border-bottom pb-3 mb-3">
                            <img src="<?=$request_img_2['img']?>" width="90" height="110" class="request-avatar rounded object-fit-cover">
                            <div class="flex-grow-1">
                                <div class="request-username fw-bold mb-2"><?=$request_img_2['username']?></div>
                                <button class="cancel-request-button btn btn-sm btn-warning text-white" onclick="location.href='./api/no.php?send_user=<?=$roooow['send_user']?>&you_user=<?=$roooow['you_user']?>&status=<?=$roooow['status']?>'">取消</button>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>