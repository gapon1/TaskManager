<?php

include 'db.php';

//====== Delete select task =====
$id = $_GET['id'];
$sql = "DELETE FROM tasks WHERE id = '$id'";
$pdo->exec($sql);
header("Location: ../list.php");