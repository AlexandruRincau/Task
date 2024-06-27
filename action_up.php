<?php

require_once 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $db = new DataBase();
    var_dump($_POST);
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'] ?? null;
    $author = $_POST['author'] ?? null;
    $page = $_POST['page'] ?? null;
    $genre = $_POST['genre'] ?? null;

    $db->update($id, $name, $author, $page, $genre);

    header("Location: index.php ");
}

?>
