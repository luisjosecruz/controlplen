<?php 
session_start();

$URI = $_SERVER['REQUEST_URI'];
$uriParts = explode("/", $URI);
$route = $uriParts[1];

// url server
define("URLSERVER", (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]");

date_default_timezone_set('America/El_Salvador');
setlocale(LC_ALL, 'es-SV');
$date = utf8_encode(strftime('%A, %e de %B de %Y'));

switch($route){
    case '': require_once ('views/home.php');

        break;
    case 'signin': require_once ('views/login.php');

        break;
    case 'signup': require_once ('views/register.php');

        break;    
    case 'projects':
        if (isset($uriParts[2])) {
            $projectLink = $uriParts[2];
            require_once ('views/project-details.php');
        } else {
            require_once ('views/projects.php');
        }
    
        break;
    case 'today': require_once ('views/today.php');
    
        break;
    default: require_once('views/404.php');
}

?>
