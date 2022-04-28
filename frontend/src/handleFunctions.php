<?php 
require_once ('../../backend/dao/user.php');
require_once ('../../backend/dao/value.php');
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

/* --------------------------------- VALUES --------------------------------- */

function handleValues($data, $conn) 
{
    $value = new Value();
    $stmt = $value->createValue($data, $conn);

    echo $stmt;
}

/* -------------------------------- PROJECTS -------------------------------- */

function handleSaveProject($data, $conn) 
{
    $project = new Project();
    $stmt = $project->createProject($data, $conn);
    
    echo $stmt;
}

/* --------------------------------- GOALS --------------------------------- */

function handleSaveGoal($data, $conn) {
    $project = new Project();
    $stmt = $project->createGoal($data, $conn);
    
    echo $stmt;
}

/* --------------------------------- TASKS --------------------------------- */

function handleSaveTask($data, $conn) {
    $project = new Project();
    $stmt = $project->createTask($data, $conn);
    
    echo $stmt;
}

function handleShowGoalDet($data, $conn) {
    $project = new Project();
    $stmt = $project->showGoalDet($data, $conn);

    echo $stmt;
}

function handleTaskUpdate($data, $conn) {
    $project = new Project();
    $stmt = $project->updateStatusTask($data, $conn);

    echo $stmt;
}

?>

