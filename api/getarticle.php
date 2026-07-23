<?php
    include_once "db.php";
    header("Content-Type: application/json;charset=UTF-8");
    $list = [];
    
    $id = $_GET['id'] ?? [];
    if($id == []){
        echo json_encode([
            "success" => false,
            "data" => "request query params not found"
        ]);
        exit;    
    }
    
    $articles = $pdo->query("SELECT * FROM `articles` WHERE `id` = '$id'")->fetch();
    if($articles < 1){
        echo json_encode([
            "success" => false,
            "data" => "article not found"
        ]);
        exit;
    }

        $list[] = [
            "id" => $articles['id'],
            "title" => $articles['title'],
            "createdate" => $articles['date'],
            "body" => $articles['content']
        ];
    
    echo json_encode([
        "success" => true,
        "data" => $list
    ]);