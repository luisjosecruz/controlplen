<?php 
require_once ('../../backend/dao/user.php');
require_once ('../../backend/dao/project.php');

function handleLogin ($data, $conn) 
{
    $userObj = new User();
    $stmt = $userObj->login($data, $conn);

    echo $stmt;
}

function handleLogout($conn) 
{    
    $userObj = new User();
    $stmt = $userObj->logout($conn);
    
    echo $stmt;
}

function handleSignUp($data, $conn) 
{
    $userObj = new User();
    $stmt = $userObj->signUp($data, $conn);
    
    echo $stmt;
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
