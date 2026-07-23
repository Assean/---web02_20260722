<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="form" class="container-fluid min-vh-100 d-flex flex-column justify-content-center py-5">
        <?php include_once "inc/header.php" ?>
        <div class="row justify-content-center w-100 m-0">
            <div class="col-12 col-md-8 col-lg-6">
                <form action="./api/submit.php" method="post" class="card card-body shadow-sm p-4">
                    <div class="mb-3">
                        <label for="game" class="form-label">遊戲</label>    
                        <select name="game" id="game" class="form-select" required>
                            <option value="數字挑戰">數字挑戰</option>
                            <option value="記憶挑戰">記憶挑戰</option>
                            <option value="反應力測試">反應力測試</option>
                            <option value="打地鼠">打地鼠</option>
                            <option value="滑動拼圖">滑動拼圖</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">姓名</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">電子郵件</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="good_or_nono" class="form-label">體驗評價</label>    
                        <select name="good_or_nono" id="good_or_nono" class="form-select" required>
                            <option value="好">好</option>
                            <option value="不好">不好</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="good_text" class="form-label">寶貴意見</label>
                        <textarea name="good_text" id="good_text" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-info text-white w-100">送出</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>