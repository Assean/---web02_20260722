<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div id="home" class="container-fluid px-4 py-4">
        <?php include_once "inc/header.php" ?>
        
        <div class="row g-4 mt-1">
            <section class="articles col-lg-8">
                <h3 class="mb-3 pb-2 border-bottom text-primary fw-bold">最新文章</h3>
                <?php
                    $articles = $pdo->query("SELECT * FROM `articles`")->fetchAll();
                    foreach($articles as $row){
                ?>
                <article class="article-item card mb-3 shadow-sm border-0">
                    <div class="card-body p-4">
                        <h5 class="article-title card-title text-dark fw-bold mb-2"><?=$row['title']?></h5>
                        <time class="article-date text-muted small d-block mb-3">發布日期: <?=$row['date']?></time>
                        <p class="article-excerpt card-text text-secondary mb-3"><?=mb_substr($row['content'],0,10)?></p>
                        <a href="./article.php?id=<?=$row['id']?>" class="article-readmore btn btn-info text-white btn-sm px-3 rounded-pill">閱讀更多</a>
                    </div>
                </article>
                <?php } ?>
            </section>

            <aside class="notifications col-lg-4">
                <h3 class="mb-3 pb-2 border-bottom text-primary fw-bold">公告通知</h3>
                <div class="list-group shadow-sm rounded">
                    <div class="notification-item list-group-item list-group-item-action border-0 border-start border-4 border-info p-3 mb-2 bg-white rounded">
                        <div class="notification-title fw-bold text-dark">通知標題: TEST</div>
                        <time class="notification-date text-muted small">發布日期: 2026/07/22</time>
                    </div>
                    <div class="notification-item list-group-item list-group-item-action border-0 border-start border-4 border-info p-3 mb-2 bg-white rounded">
                        <div class="notification-title fw-bold text-dark">通知標題: TEST</div>
                        <time class="notification-date text-muted small">發布日期: 2026/07/22</time>
                    </div>
                    <div class="notification-item list-group-item list-group-item-action border-0 border-start border-4 border-info p-3 mb-2 bg-white rounded">
                        <div class="notification-title fw-bold text-dark">通知標題: TEST</div>
                        <time class="notification-date text-muted small">發布日期: 2026/07/22</time>
                    </div>
                    <div class="notification-item list-group-item list-group-item-action border-0 border-start border-4 border-info p-3 mb-2 bg-white rounded">
                        <div class="notification-title fw-bold text-dark">通知標題: TEST</div>
                        <time class="notification-date text-muted small">發布日期: 2026/07/22</time>
                    </div>
                    <div class="notification-item list-group-item list-group-item-action border-0 border-start border-4 border-info p-3 mb-2 bg-white rounded">
                        <div class="notification-title fw-bold text-dark">通知標題: TEST</div>
                        <time class="notification-date text-muted small">發布日期: 2026/07/22</time>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</body>
</html>