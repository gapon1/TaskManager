<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Errors</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
<div class="container text-center mt-5">
    <? if (isset($errormessage)) :?>
        <p class="errorMessage"><?= $errormessage; ?></p>
    <? endif; ?>
    <a class="back btn btn-lg btn-primary" href="<?= $_SERVER['HTTP_REFERER'];?>">Back</a>

</div>
</body>
</html>
