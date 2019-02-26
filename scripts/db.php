<?php

$driver  = "mysql";
$host    = "localhost";
$db_name = "TaskManager";
$db_user = "root";
$db_pass = "test02156";
$charset = "utf8";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];



try{

    $pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options);

//========== Create Cookies =======
    if (isset($_COOKIE['page_visit'])) {
        setcookie('page_visit', ++$_COOKIE['page_visit'], time() + 5);
    }else{
        setcookie('page_visit', 1, time() + 5);
        $_COOKIE['page_visit'] = 1;
    }

    session_start();

}catch(PDOException $e){
    die("Cant connect to DATA BASE!" ."<br />". $e->getMessage());
}









