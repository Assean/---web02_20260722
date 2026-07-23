<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light min-vh-100 d-flex flex-column">
    <?php include_once "inc/header.php" ?>
    
    <div id="register" class="container-fluid flex-grow-1 d-flex align-items-center justify-content-center py-5">
        <div class="row w-100 justify-content-center">
            <div class="col-12 col-md-8 col-lg-5 col-xl-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="card-title text-center mb-4 fw-bold">註冊帳號</h2>
                        <form action="./api/register.php" method="post" class="register-form">
                            <div class="username mb-3">
                                <label for="username" class="form-label">帳號</label>
                                <input type="text" id="username" name="username" class="username-input form-control">
                            </div>
                            <div class="email mb-3">
                                <label for="email" class="form-label">電子郵件</label>
                                <input type="email" id="email" name="email" class="email-input form-control">
                            </div>
                            <div class="password mb-3">
                                <label for="password" class="form-label">密碼</label>
                                <input type="password" id="password" name="password" class="password-input form-control">
                            </div>
                            <div class="password mb-4">
                                <label for="check_password" class="form-label">確認密碼</label>
                                <input type="password" id="check_password" name="check_password" class="password-confirm-input form-control">
                            </div>
                            <button class="register-submit btn btn-info text-white w-100 py-2 fw-bold">送出</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>