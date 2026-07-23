<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="games" class="container-fluid min-vh-100 p-0">
        <?php include_once "inc/header.php" ?>
        <section class="game-list row g-4 p-4 m-0">
            <div class="game-item col-12 col-md-6 col-lg-4">
                <div class="card h-100 text-center shadow-sm">
                    <img src="./assets/games/1/cover.svg" alt="" class="game-cover card-img-top img-fluid p-3" style="max-height: 200px; object-fit: contain;">
                    <div class="card-body d-flex flex-column">
                        <div class="game-title card-title h5">數字挑戰</div>
                        <div class="game-description card-text text-muted mb-3">依序點擊數字，按升序完成挑戰！</div>
                        <a href="./game-play.php?id=1" class="play-game-link btn btn-info text-white mt-auto w-100">開始遊戲</a>
                    </div>
                </div>
            </div>
            <div class="game-item col-12 col-md-6 col-lg-4">
                <div class="card h-100 text-center shadow-sm">
                    <img src="./assets/games/2/cover.svg" alt="" class="game-cover card-img-top img-fluid p-3" style="max-height: 200px; object-fit: contain;">
                    <div class="card-body d-flex flex-column">
                        <div class="game-title card-title h5">記憶挑戰</div>
                        <div class="game-description card-text text-muted mb-3">依序點擊數字，按升序完成挑戰！</div>
                        <a href="./game-play.php?id=2" class="play-game-link btn btn-info text-white mt-auto w-100">開始遊戲</a>
                    </div>
                </div>
            </div>
            <div class="game-item col-12 col-md-6 col-lg-4">
                <div class="card h-100 text-center shadow-sm">
                    <img src="./assets/games/3/cover.svg" alt="" class="game-cover card-img-top img-fluid p-3" style="max-height: 200px; object-fit: contain;">
                    <div class="card-body d-flex flex-column">
                        <div class="game-title card-title h5">反應力測試</div>
                        <div class="game-description card-text text-muted mb-3">回合・畫面變綠立即點擊・測試平均反應時間</div>
                        <a href="./game-play.php?id=3" class="play-game-link btn btn-info text-white mt-auto w-100">開始遊戲</a>
                    </div>
                </div>
            </div>
            <div class="game-item col-12 col-md-6 col-lg-4">
                <div class="card h-100 text-center shadow-sm">
                    <img src="./assets/games/4/cover.svg" alt="" class="game-cover card-img-top img-fluid p-3" style="max-height: 200px; object-fit: contain;">
                    <div class="card-body d-flex flex-column">
                        <div class="game-title card-title h5">打地鼠</div>
                        <div class="game-description card-text text-muted mb-3">秒內打越多地鼠分數越高！錯過</div>
                        <a href="./game-play.php?id=4" class="play-game-link btn btn-info text-white mt-auto w-100">開始遊戲</a>
                    </div>
                </div>
            </div>
            <div class="game-item col-12 col-md-6 col-lg-4">
                <div class="card h-100 text-center shadow-sm">
                    <img src="./assets/games/5/cover.svg" alt="" class="game-cover card-img-top img-fluid p-3" style="max-height: 200px; object-fit: contain;">
                    <div class="card-body d-flex flex-column">
                        <div class="game-title card-title h5">滑動拼圖</div>
                        <div class="game-description card-text text-muted mb-3">點擊可移動的方塊，讓數字</div>
                        <a href="./game-play.php?id=5" class="play-game-link btn btn-info text-white mt-auto w-100">開始遊戲</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>