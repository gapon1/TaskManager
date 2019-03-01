<?php

require_once "db.php";

// ============ GET user data  ==========
$login = trim($_POST['login']);
$password = trim($_POST['password']);
$email = trim($_POST['email']);


if (!empty($login) && !empty($password) && !empty($email)) {


    //==== Check if user Exists in user table ======
    $sql_check = 'SELECT EXISTS( SELECT email FROM users WHERE email = :email)';
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([':email' => $email]);
    if ($stmt_check->fetchColumn()) {
        $errormessage = "User with choose email already EXIST !";
        include '../errors.php';
        exit();
    }
    //==============================================


    //=========== Create hash for password
    $password = password_hash($password, PASSWORD_DEFAULT);


    //============ Insert gets user data to DB ==========
    $sql = 'INSERT INTO users(login, password, email) VALUES(:login, :password, :email)';
    $params = [':login' => $login, ':password' => $password, ':email' => $email];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);


    header("Location: ../login-form.html");
    echo "Registeretad sucsessfuly";

} else {
    $errormessage = "Please fill all colums";
    include '../errors.php';
    exit();
}
