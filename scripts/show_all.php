<?php

include 'db.php';

$stmt = $pdo->prepare( "SELECT id, title, description, image FROM tasks");
$stmt->execute();
$allTasks = $stmt->fetchAll(PDO::FETCH_ASSOC);