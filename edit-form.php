<?php

include 'scripts/db.php';

    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT id, title, description, image FROM tasks WHERE id = $id");
    $stmt->execute();
    $allTasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Create Task</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
<?php foreach ($allTasks as $task): ?>
    <div class="form-wrapper text-center">
        <form class="form-signin" method="post" action="scripts/edit.php" enctype="multipart/form-data">
            <img class="mb-4" src="assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Добавить запись</h1>
            <label for="inputEmail" class="sr-only">Название</label>
            <input type="text" name="title" value="<?= $task['title'] ?>" id="inputEmail" class="form-control"
                   placeholder="Название" required>
            <label for="inputEmail" class="sr-only">Описание</label>
            <input type="hidden" name="get_id" value="<?= $_GET['id'] ?>">
            <textarea name="description" class="form-control" cols="30" rows="10"
                      placeholder="Описание"><?= $task['description'] ?></textarea>
            <img src="uploads/<?= $task['image'] ?>" alt="" width="300" class="mb-3">
            <input type="file" name="image">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
<br/>
            <a class="back btn btn-primary btn-lg" href="<?= $_SERVER['HTTP_REFERER']; ?>">Back</a>

            <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
        </form>
    </div>
<?php endforeach; ?>
</body>
</html>
