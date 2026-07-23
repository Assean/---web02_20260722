<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div id="game-play" class="container-fluid min-vh-100 d-flex flex-column p-0">
        <?php
            include_once "inc/header.php";
            $id = $_GET['id'];
        ?>
        <div class="container-fluid my-4 px-4 flex-grow-1">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <?php if($id == 1){ ?>
                        <h1 class="current-game-title display-5 fw-bold text-primary">數字挑戰</h1>
                    <?php }elseif($id == 2){ ?>
                        <h1 class="current-game-title display-5 fw-bold text-primary">記憶挑戰</h1>
                    <?php }elseif($id == 3){ ?>
                        <h1 class="current-game-title display-5 fw-bold text-primary">反應力測試</h1>
                    <?php }elseif($id == 4){ ?>
                        <h1 class="current-game-title display-5 fw-bold text-primary">打地鼠</h1>
                    <?php }else{ ?>
                        <h1 class="current-game-title display-5 fw-bold text-primary">滑動拼圖</h1>
                    <?php } ?>
                </div>
            </div>

            <div class="row g-4 align-items-start">
                <section class="game-area col-12 col-lg-8 d-flex justify-content-center">
                    <div class="card shadow-sm w-100 p-3 bg-white text-center">
                        <div class="ratio ratio-1x1 mx-auto" style="max-width: 600px;">
                            <iframe src="./assets/games/<?=$id?>" frameborder="0" class="game-frame rounded"></iframe>
                        </div>
                    </div>
                </section>

                <?php
                    $api_url = "http://localhost/[模]web02_20260722/assets/games/$id/api/pull_score.php";
                    $scores = json_decode(@file_get_contents($api_url),true);
                ?>

                <aside class="game-leaderboard col-12 col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white text-center py-3">
                            <h2 class="leaderboard-title h4 m-0 fw-bold">排行榜</h2>
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php $ix = 1;foreach($scores as $row){ ?>
                            <li class="leaderboard-item list-group-item d-flex justify-content-between align-items-center py-3">
                                <div class="player-rank w-100 d-flex justify-content-between align-items-center">
                                    <span class="fw-semibold">名次: <?=$ix++?></span>
                                    <span class="fw-semibold">玩家名稱: <?=$row['玩家名稱']?></span>
                                    <span class="badge bg-primary rounded-pill px-3 py-2">分數: <?=$row['分數']?></span>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>