<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Edit Task</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <style>

    </style>
</head>

<body>
<div class="form-wrapper text-center">
    <form class="form-signin" action="scripts/create_task.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <img class="mb-4" src="assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Add a post</h1>
        <label for="inputEmail" class="sr-only">Title</label>
        <input type="text" id="inputEmail" class="form-control" name="title" placeholder="Title" required>
        <label for="inputEmail" class="sr-only">Description</label>
        <textarea name="description" class="form-control" cols="30"  rows="10" placeholder="Description"></textarea>
        <label>Do not display this Task<input class="radio_visible"  type="checkbox" name="checkboxVisible"></label>
        <input type="file" name="image">
        <!--<img src="assets/img/no-image.jpg" alt="" width="300" class="mb-3">-->
        <button class="btn btn-lg btn-success btn-block" type="submit">Add task</button>
        <br/>
        <a class="back btn btn-primary btn-lg" href="<?= $_SERVER['HTTP_REFERER'];?>">Back</a>

        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>
</div>
</body>
</html>