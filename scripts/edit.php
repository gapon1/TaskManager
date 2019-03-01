<?php

include 'db.php';

$title = $_POST['title'];
$description = $_POST['description'];
$id = $_POST['get_id'];
$sql = "UPDATE tasks SET title = '$title', description = '$description' WHERE id = '$id' ";

// Prepare statement
$stmt = $pdo->prepare($sql);
// execute the query
$stmt->execute();

header("Location: ../list.php");