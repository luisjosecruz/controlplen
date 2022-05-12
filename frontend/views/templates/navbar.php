<?php 

$userData = $user->getUserDataHome($_SESSION["usuarioId"], $conn);
$userRow = $userData->fetch();

?>

<nav>
    <div class="logo">
        <img src="<?=URLSERVER.'/assets/images/logo.png';?>" alt="logo">
        <p>Control Plen</p> 
    </div>
    <div class="user-area">
        <div class="user-area__account">
            <img src="<?=URLSERVER.'/assets/images/profile.jpg';?>" alt="userpicture">
            <ul>
                <li class="normal-text" id="username"><?=$userRow['usuarioNombre'] .' '.explode(' ', $userRow['usuarioApellido'])[0]?></li>
                <li class="small-text"><?=$userRow['usuarioUnico']?></li>
            </ul>
        </div>
    </div>
    <ul>
        <li><a href="<?=URLSERVER.'/';?>" class="item-menu"><span class="fa fa-house-chimney"></span> Inicio</a></li>
        <li><a href="<?=URLSERVER.'/projects';?>" class="item-menu"><span class="fa fa-bars-progress"></span> Proyectos</a></li>
        <!-- <li><a href="<?=URLSERVER.'/today';?>" class="item-menu"><span class="fa fa-calendar-day"></span> Ahora mismo</a></li> -->
        <!-- <li><a href="<?=URLSERVER.'/tasks';?>" class="item-menu"><span class="lj lj-spell-check"></span> Tareas</a></li>
        <li><a href="<?=URLSERVER.'/habits';?>" class="item-menu"><span class="lj lj-magic-wand"></span> Hábitos</a></li> -->
        <!-- <li><a href="<?=URLSERVER.'/calendar';?>" class="item-menu"><span class="lj lj-calendar-full"></span> Calendario</a></li>
        <li><a href="<?=URLSERVER.'/money';?>" class="item-menu"><span class="lj lj-pie-chart"></span> Finanzas</a></li>
        <li><a href="<?=URLSERVER.'/achievements';?>" class="item-menu"><span class="lj lj-star"></span> Logros</a></li>
        <li><a href="<?=URLSERVER.'/config';?>" class="item-menu"><span class="lj lj-cog"></span> Configuración</a></li> -->
    </ul>
    <div class="user-area__notify">
        <button id="logout" title="Cerrar sesión"><span class="lj lj-power-switch"></span></button>
    </div>
</nav>




