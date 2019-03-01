<?php

include 'db.php';
$user_id = $_SESSION['userID'];

$stmt = $pdo->prepare( "
SELECT tasks.id, tasks.title, tasks.description, tasks.image 
FROM tasks LEFT JOIN users
ON users.id = tasks.user_id
WHERE tasks.user_id = '$user_id'");
$stmt->execute();
$allTasks = $stmt->fetchAll(PDO::FETCH_ASSOC);