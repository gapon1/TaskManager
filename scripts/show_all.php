<?php

include 'db.php';
//====== Choose user use session user id
$user_id = $_SESSION['userID'];

//====== Show user tasks What belong to him
$stmt = $pdo->prepare( "
SELECT tasks.id, tasks.title, tasks.description, tasks.image 
FROM tasks LEFT JOIN users
ON users.id = tasks.user_id
WHERE tasks.user_id = '$user_id'");
$stmt->execute();
$allTasks = $stmt->fetchAll(PDO::FETCH_ASSOC);