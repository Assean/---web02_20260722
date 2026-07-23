<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php
        include_once "inc/header.php";
        $username = $_GET['username'];
        $user = $pdo->query("SELECT * FROM `users` WHERE `username` = '$username'")->fetch();
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
                            if(count($articles) > 1){
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
                <div class="profile-actions mt-4 text-center">
                    <?php
                        $a = $pdo->query("SELECT * FROM `friends`")->fetchAll();
                        if(count($a) > 1){
                    ?>
                    <button class="btn btn-danger">移除</button>
                    <?php }elseif(count($a) < 1){ ?>
                    <button class="btn btn-primary">申請</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const $bio = $('#bio');
        if($bio.val() === ''){
            $bio.val('尚未填寫自我介紹');
        }
    </script>
</body>
</html>