<?php

include 'db.php';

$title = $_POST['title'];
$description = $_POST['description'];
$id = $_POST['get_id'];


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


$sql = "UPDATE tasks SET title = '$title', description = '$description', image = '$filename' WHERE id = '$id' ";

// Prepare statement
$stmt = $pdo->prepare($sql);
// execute the query
$stmt->execute();

header("Location: ../list.php");