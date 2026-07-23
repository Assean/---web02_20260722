<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div id="article" class="container-fluid min-vh-100 p-0">
        <?php include_once "inc/header.php" ?>
        <main class="container-fluid py-5 px-4 px-md-5">
            <section class="articles row justify-content-center">
                <div class="col-12">
                    <?php
                        $id = $_GET['id'];
                        $article = $pdo->query("SELECT * FROM `articles` WHERE `id` = '$id'")->fetch();
                    ?>
                    <article class="card border-0 shadow-sm">
                        <header class="article-header card-header bg-primary text-white p-4">
                            <h1 class="article-title h2 mb-2">文章標題:<?=$article['title']?></h1>
                            <time class="article-date badge bg-light text-dark fs-6">文章發布日期:<?=$article['date']?></time>
                        </header>
                        <section class="article-body card-body p-4 fs-5 leading-relaxed">
                            <?=$article['content']?>
                        </section>
                    </article>
                </div>
            </section>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>