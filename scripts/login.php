<?php

require_once "db.php";

//====== Get data from form ======
$password = trim($_POST['password']);
$email = trim($_POST['email']);


if (!empty($password) && !empty($email)) {


    // ====== choose email from DB for comparison ======
    $sql = 'SELECT email, password FROM users WHERE email = :email';


    $params = [':email' => $email];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $user = $stmt->fetch(PDO::FETCH_OBJ);


    //====== Check password =======
    if ($user) {
        if (password_verify($password, $user->password)) {

            //======= if login and password correct Redirect to list page ======
            $_SESSION['user_login'] = $user->email;
            header('Location: ../list.html');


        } else {
            //====== Wrong password ======
            $errormessage = "Wrong email or password.";
            include "../errors.php";
        }

    } else {
        //======= Wrong email ======
        $errormessage = "Wrong email or password";
        include "../errors.php";
    }

} else {
    //======= Empty data ======
    header('Location: ../errors.php');

}

