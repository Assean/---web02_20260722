<?php
    include_once "db.php";
    $title = $_POST['title'];
    $content = $_POST['content'];
    $pdo->exec("INSERT INTO `articles` (`id`, `title`, `date`, `content`, `WP`) VALUES (NULL, '$title', '2026/07/22', '$content', '{$_SESSION['user']}')");
    $id = $pdo->query("SELECT * FROM `articles` ORDER BY id DESC")->fetch()[0];
    echo "<script>alert('發表成功');location.href='../article.php?id=$id'</script>";
    exit;