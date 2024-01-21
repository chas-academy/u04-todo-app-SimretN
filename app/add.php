<?php

if(isset($_POST['title']) && isset($_POST['taskDescription'])){
    require '../db_conn.php';

    $title = $_POST['title'];
    $taskDescription = $_POST['taskDescription'];

    if(empty($title)){
        header("Location: ../index.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO todos(title,taskDescription) VALUE(?,?)");
        $res = $stmt->execute([$title, $taskDescription]);
        if($res){
            header("Location: ../index.php?mess=success"); 
        }else {
            header("Location: ../index.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}