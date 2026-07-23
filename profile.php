<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light min-vh-100 d-flex flex-column">
    <div id="profile-page" class="container-fluid flex-grow-1 px-0 d-flex flex-column">
        <?php
            include_once "inc/header.php";
            if(!isset($_SESSION['user']))exit(header("location:./login.php"));
            $user = $pdo->query("SELECT * FROM `users` WHERE `username` = '{$_SESSION['user']}'")->fetch();
            // print_r($_SERVER);
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                // 頭像
                if($_FILES['header'] OR $_FILES['header']['tmp_name']){
                    $max = 1*1024*1024;
                    if($_FILES['header']['size'] > $max OR $_FILES['header']['error'] === UPLOAD_ERR_INI_SIZE){
                        echo "<script>alert('頭像上傳失敗');location.href='./profile.php'</script>";
                        exit;
                    }
                    $ext = strtolower(pathinfo($_FILES['header']['name'],PATHINFO_EXTENSION));
                    if(!in_array($ext,['jpeg','jpg','png'])){
                        echo "<script>alert('頭像上傳失敗');location.href='./profile.php'</script>";
                        exit;
                    }
                    $filename = $_SESSION['user'] . "_img." . $ext;
                    $ok = move_uploaded_file($_FILES['header']['tmp_name'],"./assets/img/$filename");
                    if($ok){
                        $pdo->exec("UPDATE `users` SET `img` = './assets/img/$filename' WHERE `users`.`username` = '{$_SESSION['user']}'");
                        echo "<script>location.href='profile.php'</script>";
                        exit;
                    }
                }
                
                // 簡介
                if(isset($_POST['bio'])){
                    $bio = $_POST['bio'];
                    $pdo->exec("UPDATE `users` SET `bio` = '$bio' WHERE `users`.`username` = '{$_SESSION['user']}'");
                    echo "<script>location.href='profile.php'</script>";
                    exit;
                }else{
                    echo "<script>alert('簡介更新失敗');location.href='profile.php'</script>";
                    exit;
                }
            }
        ?>
        <div class="container py-4 flex-grow-1">
            <section class="profile-header card shadow-sm mb-4 border-0">
                <div class="card-body text-center p-4">
                    <!-- 頭像 -->
                    <form method="post" enctype="multipart/form-data" class="mb-3">
                        <label for="file" class="cursor-pointer">
                            <input type="file" name="header" id="file" onchange="this.form.submit()" class="d-none">
                            <img src="<?=$user['img']?>" class="profile-avatar rounded-circle img-thumbnail shadow-sm" style="width: 120px; height: 120px; object-fit: cover;">
                        </label>
                    </form>
                    <div class="profile-username h4 fw-bold mb-3"><?=$user['username']?></div>
                    <!-- 簡介 -->
                    <form method="post" enctype="multipart/form-data" class="row justify-content-center">
                        <div class="profile-bio col-12 col-md-8 col-lg-6">
                            <textarea name="bio" id="bio" cols="30" rows="4" class="profile-bio-input form-control text-center bg-white" placeholder="尚未填寫自我介紹" maxlength="300" readonly><?=$user['bio']?></textarea>
                        </div>
                    </form>
                </div>
            </section>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0">我的文章</h5>
                <a href="./add_article.php" class="new-post-link btn btn-info text-white fw-bold">發布文章</a>
            </div>
            
            <section class="profile-articles row g-3">
                <?php
                    $articles = $pdo->query("SELECT * FROM `articles` WHERE `WP` = '{$_SESSION['user']}'")->fetchAll();
                    if(count($articles) > 1){
                    foreach($articles as $row){
                ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="article-item card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column">
                            <div class="article-title card-title h6 fw-bold mb-2">文章標題:<?=$row['title']?></div>
                            <time class="article-date text-muted small mb-3">發佈日期:<?=$row['date']?></time>
                            <a href="./article.php?id=<?=$row['id']?>" class="article-readmore btn btn-outline-info btn-sm mt-auto">閱讀更多</a>
                        </div>
                    </div>
                </div>
                <?php }}else{ ?>
                <div class="col-12">
                    <div class="empty-article-message alert alert-secondary text-center my-3">目前尚無文章</div>
                </div>
                <?php } ?>
            </section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const $bio = $('#bio');
        $bio.on('click',()=>$bio.prop('readonly',false));
        $bio.on('keydown',(e)=>{
            if(e.key === 'Enter') e.preventDefault();
            e.key === 'Enter' ? $bio.closest('form').submit() : null;
        })
        if($bio.val() === '尚未填寫自我介紹'){
            $bio.val('');
        }
    </script>
</body>
</html>