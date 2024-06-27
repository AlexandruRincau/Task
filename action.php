<?php

require_once 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $db = new Database();

    $name = $_POST['name'] ?? null;
    $author = $_POST['author'] ?? null;
    $page = $_POST['page'] ?? null;
    $genre = $_POST['genre'] ?? null;
    
    $db->insert($name, $author, $page, $genre);

    header("Location: / ");
}
?>
