<?php


include 'scripts/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT id, title, description, image FROM tasks WHERE id = $id");
    $stmt->execute();
    $allTasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $error = "Choose Task from List";
    $error_link = "list.php";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Show</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<?php foreach ($allTasks as $task): ?>
<body>
<div class="form-wrapper text-center">
    <img src="uploads/<?= $task['image'] ?>" alt="" width="400">
    <h2><?= $task['title'] ?></h2>
    <p><?= $task['description'] ?></p>
    <a class="back btn btn-primary btn-lg" href="<?= $_SERVER['HTTP_REFERER']; ?>">Back</a>
</div>
<?php endforeach; ?>

<div class="col-lg-12 error_link__block">
    <a class="error_link" href="<?= $error_link ?>"><?= $error ?></a>
</div>

</body>
</html>
