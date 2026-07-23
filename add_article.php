<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div id="add-article" class="container-fluid min-vh-100 d-flex flex-column p-0">
        <?php include_once "inc/header.php" ?>
        <div class="row justify-content-center flex-grow-1 align-items-center m-0 w-100">
            <div class="col-12 col-md-8 col-lg-6">
                <form action="./api/add_article.php" class="article-create-form card shadow-sm p-4 border-0" method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label">文章標題</label>
                        <input type="text" class="article-title-input form-control" name="title" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">文章內容</label>
                        <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <button class="article-submit-button btn btn-info text-white w-100">送出</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>