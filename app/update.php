

<?php
require '../db_conn.php';
if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['checked'])){
    require '../db_conn.php';

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['taskDescription'];

    $checked = $_POST['checked'];

    if(empty($id) || empty($title) || !isset($checked)){
       echo 'error';
    } else {
        $stmt = $conn->prepare("UPDATE todos SET title=?, taskDescription=?, checked=? WHERE id=?");
        $res = $stmt->execute([$title, $description, $checked, $id]);

        if($res){
            echo 'success';
        } else {
            echo 'error';
        }

        $conn = null;
        exit();
    }
} else {
    header("Location: ../index.php?mess=error");
}