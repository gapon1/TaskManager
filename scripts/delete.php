<?php

include 'db.php';

$id = $_GET['id'];
// sql to delete a record
$sql = "DELETE FROM tasks WHERE id = '$id'";
// use exec() because no results are returned
$pdo->exec($sql);
header("Location: ../list.php");