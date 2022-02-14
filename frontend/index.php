<?php 

$URI = $_SERVER['REQUEST_URI'];
$uriParts = explode("/", $URI);
$route = $uriParts[1];

// url server
define("URLSERVER", (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]");

switch($route){
    case '':
        session_start();
        if (!isset($_SESSION["userId"])) header('Location: /login');
        require_once ('views/start.php');
        break;
    case 'login':
        require_once ('views/login.php');
        break;
    default:
        require_once('views/404.php');
}

?>
