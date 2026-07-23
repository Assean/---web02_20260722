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

        <?php
            $good_row = $pdo->query("SELECT COUNT(id) AS good FROM form_result WHERE good_or_nono = '好';")->fetch();
            $good = $good_row['good'];
            $nono_row = $pdo->query("SELECT COUNT(id) AS nono FROM form_result WHERE good_or_nono = '不好';")->fetch();
            $nono = $nono_row['nono'];
            $tol = $good + $nono;
            $good_p = ($good / $tol) *100;
            $nono_p = ($nono / $tol) *100;
        ?>
        <div class="row g-3">
            <div class="good col-6">
                <div class="card p-3">
                    <div class="num">筆數(好):<?=$good?></div>
                    <div class="p mb-2">比例:<?=$good_p?>%</div>
                    <div class="wh bg-info" style="width: 100px;height: <?=$good_p?>px;"></div>    
                </div>
            </div>
            <div class="nono col-6">
                <div class="card p-3">
                    <div class="num">筆數(不好):<?=$nono?></div>
                    <div class="p mb-2">比例:<?=$nono_p?>%</div>
                    <div class="wh bg-info" style="width: 100px;height: <?=$nono_p?>px;"></div>    
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>