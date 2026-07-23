<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body class="bg-light">
    <?php
        include_once "inc/header.php";
        $username = $_GET['username'];
        $user = $pdo->query("SELECT * FROM `users` WHERE `username` = '$username'")->fetch();
        $now_user = $_SESSION['user'] ?? ''; 
    ?>
    <div id="profile-page" class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <div class="profile-header card mb-4 shadow-sm">
                    <div class="card-body text-center">
                        <img src="<?=$user['img']?>" alt="" class="profile-avatar rounded-circle mb-3 img-thumbnail" style="width: 120px; height: 120px; object-fit: cover;">
                        <h2 class="profile-username h4 card-title"><?=$user['username']?></h2>

                        <p id="bio" class="profile-bio card-text text-muted mb-0"><?=$user['bio']?></p>
                    </div>
                </div>

                <div class="profile-content">

                    <section class="articles row g-3">
                        <?php
                            $articles = $pdo->query("SELECT * FROM `articles` WHERE `WP` = '$username'")->fetchAll();
                            if(count($articles) > 0){
                                foreach($articles as $row){
                        ?>
                        <div class="col-12">
                            <article class="article-item card shadow-sm">
                                <div class="card-body">
                                    <h3 class="article-title card-title h5">文章標題:<?=$row['title']?></h3>
                                    <time class="article-date text-muted small d-block mb-2">發布日期:<?=$row['date']?></time>
                                    <p class="article-excerpt card-text">文章摘要:<?=$row['content']?></p>
                                    <a href="./article.php?id=<?=$row['id']?>" class="article-readmore btn btn-info text-white">閱讀更多</a>
                                </div>
                            </article>
                        </div>
                        <?php }} ?>
                    </section>
                </div>
                
                <div class="profile-friend-actions mt-4 text-center">
                    <?php
                        $friend_sql = "SELECT * FROM `friends` WHERE 
                                      (`send_user` = '$now_user' AND `you_user` = '$username') OR 
                                      (`send_user` = '$username' AND `you_user` = '$now_user')";
                        $friend_record = $pdo->query($friend_sql)->fetch();
                        if($friend_record){
                            if($friend_record['status'] == 'friend'){ ?>
                                <button class="btn btn-danger" onclick="location.href='./api/friend_del.php?send_user=<?=$friend_record['send_user']?>&you_user=<?=$friend_record['you_user']?>&status=friend'">移除好友</button>
                            <?php } elseif ($friend_record['status'] == 'pending'){ ?>
                                <button class="btn btn-warning" onclick="location.href='./api/friend_not.php?now_user=<?=$friend_record['send_user']?>&you_user=<?=$friend_record['you_user']?>'">移除申請好友</button>
                            <?php }
                        } else { ?>
                            <button class="btn btn-primary" onclick="location.href='./api/friend_add.php?now_user=<?=$_SESSION['user']?>&you_user=<?=$username?>'">申請好友</button>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(() => !$.trim($('#bio').text()) && $('#bio').text('尚未填寫自我介紹'));
    </script>
</body>
</html>