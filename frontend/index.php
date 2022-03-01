<?php 

$URI = $_SERVER['REQUEST_URI'];
$uriParts = explode("/", $URI);
$route = $uriParts[1];

// url server
define("URLSERVER", (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]");

date_default_timezone_set('America/El_Salvador');
setlocale(LC_ALL, 'es-SV');
$date = utf8_encode(strftime('%A %e de %B, %Y'));

switch($route){
    case '':
        session_start();
        if (!isset($_SESSION["usuarioId"])) header('Location: /login');
        require_once ('views/start.php');

        break;
    case 'login':
        require_once ('views/login.php');

        break;
    case 'projects':
        if (isset($uriParts[2])) {
            $projectLink = $uriParts[2];
            require_once ('views/project-details.php');
        } else {
            require_once ('views/projects.php');
        }
    
        break;
    case 'habits':
        require_once ('views/habits.php');

        break;
    default:
        require_once('views/404.php');
}

?>
