<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div id="admin" class="container-fluid p-4">
        <?php include_once "inc/header.php" ?>
        <div class="row g-2 mb-4">
            <div class="col-12 col-md-3">
                <a href="./admin.php" class="btn btn-info w-100 text-white">基本設定</a>
            </div>
            <div class="col-12 col-md-3">
                <a href="./admin_result.php" class="btn btn-info w-100 text-white">問卷回應</a>
            </div>
            <div class="col-12 col-md-3">
                <a href="./admin_imgtable.php" class="btn btn-info w-100 text-white">統計圖表</a>
            </div>
            <div class="col-12 col-md-3">
                <a href="./form.php" class="btn btn-info w-100 text-white">表單</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <?php
                    $result = $pdo->query("SELECT * FROM `form_result`")->fetchAll();
                    foreach($result as $row){
                ?>
                <div class="card mb-2">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            遊戲:<?=$row['game']?>  |
                            姓名:<?=$row['name']?>  |
                            電子郵件:<?=$row['email']?>  |
                            體驗評價:<?=$row['good_or_nono']?>  |  
                            寶貴意見:<?=$row['good_text']?>
                        </div>
                        <a href="./api/del.php?id=<?=$row['id']?>" class="btn btn-danger btn-sm ms-2">刪除</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>