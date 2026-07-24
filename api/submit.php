<?php
include_once "db.php";

// 1. 抓取 admin_set 資料表設定
$cfg = $pdo->query("SELECT * FROM `admin_set` WHERE `id` = 1")->fetch();

// 2. 判斷表單是否開啟 (T_F != 1 代表不接受回應)
if ($cfg['T_F'] != 1) {
    echo "<script>alert('表單目前不接受回應'); location.href='../form.php';</script>";
    exit();
}

// 3. 判斷是否在時間內
if (time() < strtotime($cfg['start_time']) || time() > strtotime($cfg['end_time'])) {
    echo "<script>alert('目前不在回應時間內'); location.href='../form.php';</script>";
    exit();
}

// 4. 寫入回應資料
$pdo->exec("INSERT INTO `form_result` (`game`, `name`, `email`, `good_or_nono`, `good_text`) 
            VALUES ('{$_POST['game']}', '{$_POST['name']}', '{$_POST['email']}', '{$_POST['good_or_nono']}', '{$_POST['good_text']}')");

echo "<script>alert('已送出回應'); location.href='../form.php';</script>";
exit();
?>