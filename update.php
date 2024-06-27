<?php

require_once 'db.php';
$book_id = $_GET['id'];
$db = new DataBase();
$book = $db->select($book_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nginx</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Update</h2>
    <form action="action_up.php" method = "post">
        <input type="hidden" name="id" value="<?= $book['id']?>">

        <label>Title</label>
        <input type="text" name="name" value="<?= $book['name']?>">

        <label>Author</label>
        <input type="text" name="author" value="<?= $book['author']?>">

        <label>Page number</label>
        <input type="text" name="page" value="<?= $book['page']?>">

        <label>Genre</label>
        <input type="text" name="genre" value="<?= $book['genre']?>">

        <input type="submit" value="Update">
    </form>
</body>
</html>
