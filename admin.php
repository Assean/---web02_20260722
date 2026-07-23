<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div id="admin" class="container-fluid min-vh-100 p-4">
        <?php include_once "inc/header.php" ?>
        <div class="row g-3 mt-2">
            <div class="col-12 col-md-3">
                <a href="./admin.php" class="btn btn-info w-100 text-white fw-bold">基本設定</a>
            </div>
            <div class="col-12 col-md-3">
                <a href="./admin_result.php" class="btn btn-info w-100 text-white fw-bold">問卷回應</a>
            </div>
            <div class="col-12 col-md-3">
                <a href="./admin_imgtable.php" class="btn btn-info w-100 text-white fw-bold">統計圖表</a>
            </div>
            <div class="col-12 col-md-3">
                <a href="./form.php" class="btn btn-info w-100 text-white fw-bold">表單</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>