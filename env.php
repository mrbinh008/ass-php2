<?php
//điều chỉnh kết nối db ở đây
define("DB_HOST", "localhost");
define("DB_NAME", "php2");
define("DB_USER", "root");
define("DB_PWD", "");
define("DB_CHARSET", "utf8");
define("BASE_URL","http://localhost/web17312/assignment/");

function url($url = "", $params = ""){
    return BASE_URL . $url. (!empty($params) ? "/" . $params : "/");
}
function asset($path = ""){
    return BASE_URL . "public/" . $path;
}
function redirect($key,$msg,$router){
    $_SESSION[$key]=$msg;
    switch ($key){
        case 'update-success':
        case 'success':
            unset($_SESSION['errors']);
            unset($_SESSION['data']);
            break;
        case 'errors':
            unset($_SESSION['success']);
            break;

    }
    header('Location: '.BASE_URL.$router.'?msg='.$key);
    die();
}
function dd($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
}


