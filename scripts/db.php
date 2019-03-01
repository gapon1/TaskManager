<?php

$driver  = "mysql";
$host    = "webdewel.mysql.tools";
$db_name = "webdewel_task";
$db_user = "webdewel_task";
$db_pass = "dP_0l2Yx6*";
$charset = "utf8";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];



try{

    $pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options);

//========== Create Cookies =======
        setcookie('page_visit', 1, time() + 5);
        $_COOKIE['page_visit'] = 1;

    //===== Start session for user =====
    session_start();

}catch(PDOException $e){
    die("Cant connect to DATA BASE!" ."<br />". $e->getMessage());
}









