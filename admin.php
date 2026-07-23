<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech - 基本設定</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div id="admin" class="container-fluid min-vh-100 p-4">
        <?php include_once "inc/header.php"; ?>

        <!-- 導覽按鈕區 -->
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

        <form action="./api/admin_set.php" method="post" class="card shadow-sm p-4 mt-4">
            <div class="row g-3 align-items-center">
                <div class="col-12 col-md-4">
                    <label for="T_F" class="form-label fw-bold">是否接受回應</label>
                    <select name="T_F" id="T_F" class="form-select">
                        <option value="1">是</option>
                        <option value="2">否</option>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <label for="start_time" class="form-label fw-bold">開始時間</label>
                    <input type="datetime-local" name="start_time" id="start_time" class="form-control">
                </div>
                <div class="col-12 col-md-4">
                    <label for="end_time" class="form-label fw-bold">結束時間</label>
                    <input type="datetime-local" name="end_time" id="end_time" class="form-control">
                </div>
                <div class="col-12 text-end mt-4">
                    <button type="submit" class="btn btn-info text-white fw-bold px-4">儲存</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>