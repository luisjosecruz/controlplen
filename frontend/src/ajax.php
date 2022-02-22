<?php 

require_once ('../../backend/bootstrap.php');
require_once ('../../backend/dao/user.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request = $_POST['ajax'];

    switch ($request) {
        case 'login':
            $data = [$_POST['username'], $_POST['password']];
            $userObj = new User();
            handleLogin($data, $userObj, $conn);

            break;
        case 'logout':
            session_start();
            unset($_SESSION["usuarioId"]);
            unset($_SESSION["usuarioCorreo"]);
            echo 'logout 200';

            break;
        default:
            echo 'ajax 404 '.$_POST['ajax'];
            break;
    }

} else {
    echo 'not method post';
}


function handleLogin ($data, $userObj, $conn) {
    $stmt = $userObj->login($data, $conn);
    $row = $stmt->fetch();

    if ($row) {
        
        session_start();
        $_SESSION['usuarioId'] = $row['usuarioId'];
        $_SESSION['usuarioCorreo'] = $row['usuarioCorreo'];

        if (isset($_SESSION["usuarioId"])) {
            echo 'login 200';
        } else {
            echo 'login 500';
        }

    } else {
        echo 'login 404';
    }
}
?>
