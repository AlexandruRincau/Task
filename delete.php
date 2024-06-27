<?php

require_once'db.php';
$db = new DataBase();
$id = $_GET['id'];
$delete = $db->delete($id);

header('Location: index.php');
?>
