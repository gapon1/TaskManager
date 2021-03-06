<?php

//====== Connect to DB ======
include 'db.php';

$title = trim($_POST['title']);
$description = trim($_POST['description']);
$checkbox = $_POST['checkboxVisible'];


//======== Create func Upload img Change name and put in the upload folder ======
if ($_FILES) {
    if (!$_FILES['image']['type'] != 'image/png' || !$_FILES['image']['type'] == '') {

        function UploaddImg($image)
        {
            $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . "." . $extension;
            move_uploaded_file($image['tmp_name'], "../uploads/" . $filename);
            return $filename;
        }

        $filename = UploaddImg($_FILES['image']);
    }
}//==============ENG:: block get data ================


//====== Get user id use Session =====
$user_id = $_SESSION['userID'];

//====== Insert data ======
$sql = "INSERT INTO tasks (title, description, image, checkbox ,user_id) VALUE (:title, :description, :image, :checkbox, :user_id)";

//====== prepare data ======
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":title", $title);
$stmt->bindParam(":description", $description);
$stmt->bindParam(":image", $filename);
$stmt->bindParam(":checkbox", $checkbox);
$stmt->bindParam(":user_id", $user_id);
$stmt->execute();


header("Location: ../list.php");//REDIRECT TO LIST PAGE











