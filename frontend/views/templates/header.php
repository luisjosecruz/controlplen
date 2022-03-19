<?php 

if(!isset($_SESSION)) session_start(); 

require_once ('../backend/bootstrap.php');
require_once ('../backend/dao/user.php');
require_once ('../backend/dao/project.php');
$user = new User();
$project = new Project();

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Plen</title>
    <link rel="stylesheet" href="<?=URLSERVER.'/assets/css/base.css';?>">
    <link rel="stylesheet" href="<?=URLSERVER.'/assets/css/loast.css';?>">
    <link rel="stylesheet" href="<?=URLSERVER.'/assets/css/weekly.min.css';?>">
    <link rel="stylesheet" href="<?=URLSERVER.'/assets/css/style.css';?>">
    <link rel="stylesheet" href="<?=URLSERVER.'/assets/font/fontawesome/css/all.css';?>">
    <link rel="shortcut icon" href="<?=URLSERVER.'/assets/images/logo.png';?>" type="image/png">
</head>
<body>
