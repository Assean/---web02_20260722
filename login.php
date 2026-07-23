<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div id="login" class="container-fluid min-vh-100 p-0 d-flex flex-column">
        <?php include_once "inc/header.php" ?>
        <div class="row g-0 flex-grow-1 justify-content-center align-items-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 px-4">
            <h2 class="card-title text-center mb-4 fw-bold">登入頁面</h2>
                <form action="./api/login.php" method="post" class="login-form card p-4 shadow-sm border-0">
                    <div class="username mb-3">
                        <label for="username" class="form-label">帳號</label>
                        <input type="username" name="username" class="username-input form-control">
                    </div>
                    <div class="password mb-3">
                        <label for="password" class="form-label">密碼</label>
                        <input type="password" name="password" class="password-input form-control">
                    </div>
                    <button class="login-submit-button btn btn-info w-100 text-white">送出</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>