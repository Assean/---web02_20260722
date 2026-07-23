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
    
    $users = $pdo->query("SELECT * FROM `users` WHERE `id` = '$id'")->fetch();
    if($users < 1){
        echo json_encode([
            "success" => false,
            "data" => "user not found"
        ]);
        exit;
    }

        $list[] = [
            "id" => $users['id'],
            "avatar" => $users['img'],
            "username" => $users['username'],
            "bio" => $users['bio']
        ];
    
    echo json_encode([
        "success" => true,
        "data" => $list
    ]);