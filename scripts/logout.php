
<?php

require_once "db.php";


// ======= Delete all user data form system
$_SESSION = [];

if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() -3600, '/');
}

session_destroy();

header('Location: ../login-form.html');