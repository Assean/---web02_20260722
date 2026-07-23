<?php 
// 1. 確保此檔案最上方沒有任何 HTML 結構或空白字元
include_once "inc/header.php"; 

// include_once "inc/header.php"; 

            $action = $_GET['action'] ?? '';

            // 如果是這兩種下載動作之一，才執行以下邏輯
            if ($action === 'json' || $action === 'csv') {
                ob_end_clean();
                $data = $pdo->query("SELECT * FROM `form_result`")->fetchAll(PDO::FETCH_ASSOC);
                
                // 加強
                header("Content-Disposition: attachment; filename=\"問卷回應.{$action}\"");
                // header("Content-Disposition: attachment; filename=\"問卷回應 . {$action}\"");
                if ($action === 'json') {
                    header('Content-Type: application/json; charset=utf-8');
                    echo json_encode($data);
                    
                } elseif ($action === 'csv') {
                    
                    header('Content-Type: text/csv; charset=utf-8');
                    $out = fopen('php://output', 'w');
                    fputcsv($out, ['id', '姓名', '電子郵件', '評價', '寶貴意見']); 
                    foreach ($data as $row) {
                        fputcsv($out, $row); 
                    }
                    fclose($out);
                }
                
                exit;
            }
?>
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
        
        <button class="btn btn-success" onclick="location.href='?action=csv'">下載 CSV</button>
        <button class="btn btn-warning text-white" onclick="location.href='?action=json'">下載 JSON</button>

        <div class="row">
            <div class="col-12">
                <?php
                    $result = $pdo->query("SELECT * FROM `form_result`")->fetchAll();
                    foreach($result as $row){
                ?>
                <div class="card mb-2">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            遊戲:<?=$row['game']?>  |
                            姓名:<?=$row['name']?>  |
                            電子郵件:<?=$row['email']?>  |
                            體驗評價:<?=$row['good_or_nono']?>  |  
                            寶貴意見:<?=$row['good_text']?>
                        </div>
                        <a href="./api/del.php?id=<?=$row['id']?>" class="btn btn-danger btn-sm ms-2">刪除</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>