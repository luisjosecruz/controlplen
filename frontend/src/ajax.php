<?php 

require_once ('../../backend/bootstrap.php');
require_once ('handleFunctions.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request = $_POST['ajax'];

    switch ($request) {
        case 'login': handleLogin($_POST, $conn);

            break;
        case 'logout': handleLogout();

            break;
        case 'register': handleRegister($_POST, $conn);

            break;

        case 'save-project': handleSaveProject($_POST, $conn);

            break;
        case 'save-goal': handleSaveGoal($_POST, $conn);

            break;
        default:
            echo 'ajax 404 '.$_POST['ajax'];
            break;
    }

} else {
    echo 'not method post';
}


?>
