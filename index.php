<?php

require_once'db.php';
$db = new DataBase();
$books = $db->read();
$search = [];
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['title'])) {
    $title = $_GET['title'];
    $search = $db->search($title);
}
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
    <h1>Books</h1>
    <table class="table">
        <tr>
            <th>Title</th>
	    <th>Author</th>
            <th>Page</th>
            <th>Genre</th>
        </tr>

        <?php

        foreach($books as $book){
        ?>

        <tr>
            <td><?= $book['name']?></td>
            <td><?= $book['author']?></td>
            <td><?= $book['page']?></td>
            <td><?= $book['genre']?></td> 
            <td><a href="update.php?id=<?= $book['id']?>">Update</td>
            <td><a style="color: red;" href="delete.php?id=<?= $book['id']?>">Delete</td>
        </tr>

        <?php
        
        }

        ?>

    </table>
    <h2>Add new book</h2>
    <form action="action.php" method = "post">
        <label>Title</label>
        <input type="text" name="name">

        <label>Author</label>
        <input type="text" name="author">

        <label>Page number</label>
        <input type="text" name="page">

        <label>Genre</label>
        <input type="text" name="genre">

        <input type="submit" value="Add">
    </form>
    <br>
    <h2>Search</h2>
    <form action="" method = "get">
        <label>Title</label>
        <input type="text" name="title">

        <input type="submit" value="Search">
    </form>

    <table class="table2 <?= empty($search) ? 'hidden' : '' ?>">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Page</th>
            <th>Genre</th>
        </tr>

        <?php
        if(!empty($search)){
            foreach($search as $book2){
        ?>

        <tr>
            <td><?= $book2['name']?></td>
            <td><?= $book2['author']?></td>
            <td><?= $book2['page']?></td>
            <td><?= $book2['genre']?></td> 
        </tr>

        <?php
            }
        }

        ?>

    </table>

</body>
</html>
