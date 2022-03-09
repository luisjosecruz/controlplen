<?php 
require_once ('../../backend/dao/user.php');
require_once ('../../backend/dao/project.php');

function handleLogin ($data, $conn) {

    $userObj = new User();
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

function handleRegister($data, $conn) {
    $userObj = new User();
    $stmt = $userObj->register($data, $conn);
    
    echo ($stmt == 1) ? "register 200" : "register 500 : ".$stmt;
}

function handleLogout() {
    session_start();
    unset($_SESSION["usuarioId"]);
    unset($_SESSION["usuarioCorreo"]);
    echo 'logout 200';
}

function handleSaveProject($data, $conn) {
    $project = new Project();
    $stmt = $project->createProject($data, $conn);
    
    echo $stmt;
}

function handleSaveGoal($data, $conn) {
    $project = new Project();
    $stmt = $project->addGoal($data, $conn);
    
    echo $stmt;
}

?>
