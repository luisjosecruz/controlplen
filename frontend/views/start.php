<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control</title>
    <link rel="stylesheet" href="<?=URLSERVER.'/assets/css/base.css';?>">
    <link rel="stylesheet" href="<?=URLSERVER.'/assets/css/style.css';?>">
    <link rel="shortcut icon" href="<?=URLSERVER.'/assets/images/logo.png';?>" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700&family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <nav>
            <div class="logo">
                <img src="<?=URLSERVER.'/assets/images/logo.png';?>" alt="logo">
                <p>Control</p> 
            </div>
            <ul>
                <li><a href="#" class="item-menu active"><span class="lj lj-home"></span> Inicio</a></li>
                <li><a href="#" class="item-menu"><span class="lj lj-dice"></span> Habitos</a></li>
                <li><a href="#" class="item-menu"><span class="lj lj-database"></span> Proyectos</a></li>
                <li><a href="#" class="item-menu"><span class="lj lj-calendar-full"></span> Calendario</a></li>
                <li><a href="#" class="item-menu"><span class="lj lj-cog"></span> Configuración</a></li>
            </ul>
        </nav>
        <article>
            <section class="sec-left">
                <div class="dashboard">
                    <div class="dashboard-top">
                        <p class="dashboard-top__title">Dashboard</p>
                        <p>Sábado 5 de febrero, 2022</p>
                    </div>
                    <div class="dashboard-body">
                        <div class="dashboard-numbers">
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber">5</p>
                                <p class="normal-text">Salud</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber">6</p>
                                <p class="normal-text">Arte</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber">15</p>
                                <p class="normal-text">Felicidad</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber">4</p>
                                <p class="normal-text">Amor y paz</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber">5</p>
                                <p class="normal-text">Aprendizaje</p>
                            </div>
                        </div>
                        <p class="title-divider">Tareas para hacer hoy</p>
                        <div class="todo">
                            <div class="todo-task">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label class="habits-list__text">
                                                    <input type="checkbox"> 
                                                    <p>
                                                        <span class="normal-text">Terminar la aplicación de control</span> 
                                                        <span class="small-text">Mañana | Hora</span>
                                                    </p>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="habits-list__text">
                                                        <input type="checkbox"> 
                                                        <p>
                                                            <span class="normal-text">Terminar la aplicación de control</span> 
                                                            <span class="small-text">Mañana | Hora</span>
                                                        </p>
                                                    </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="habits-list__text">
                                                        <input type="checkbox"> 
                                                        <p>
                                                            <span class="normal-text">Terminar la aplicación de control</span> 
                                                            <span class="small-text">Mañana | Hora</span>
                                                        </p>
                                                    </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="todo-metrics">
                                <div class="todo-metrics__card">
                                    <p><span>10</span> Tareas totales</p>
                                </div>
                                <div class="todo-metrics__card">
                                    <p><span>1</span> Tareas completadas</p>
                                </div>
                                <div class="todo-metrics__card">
                                    <p><span>9</span> Tareas pendientes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="sec-right">
                <div class="user-area">
                    <div class="user-area__account">
                        <img src="<?=URLSERVER.'/assets/images/logo.png';?>" alt="userpicture">
                        <ul>
                            <li class="normal-text">Luis José Cruz</li>
                            <li class="small-text">Es bueno verte otra vez</li>
                        </ul>
                    </div>
                    <div class="user-area__notify">
                        <button id="logout" title="Cerrar sesión"><span class="lj lj-power-switch"></span></button>
                    </div>
                </div>
                <div class="widget">
                    <p class="widget-title"><span class="lj lj-select"></span> Hábitos</p>
                    <div class="habits-list">
                        <ul>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">Lavar mi cara y usar crema facial</span> 
                                        <span class="small-text">Mañana y noche</span>
                                    </p>
                                </label>
                            </li>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">usar protector solar</span> 
                                        <span class="small-text">Mañana</span>
                                    </p>
                                </label>
                            </li>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">Hacer ejercicio por 30 minutos</span> 
                                        <span class="small-text">Mañana</span>
                                    </p>
                                </label>
                            </li>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">Comer frutas y verduras</span> 
                                        <span class="small-text">Todo el día</span>
                                    </p>
                                </label>
                            </li>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">Lavar  mis dientes 3 veces</span> 
                                        <span class="small-text">Todo el día</span>
                                    </p>
                                </label>
                            </li>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">Usar hilo dental por la noche</span> 
                                        <span class="small-text">Noche</span>
                                    </p>
                                </label>
                            </li>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">Realizar una actividad relajante</span> 
                                        <span class="small-text">Todo el día</span>
                                    </p>
                                </label>
                            </li>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">Lavar mis pies y limpiar mis uñas</span> 
                                        <span class="small-text">Noche</span>
                                    </p>
                                </label>
                            </li>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">Domir 8 horas</span> 
                                        <span class="small-text">Noche</span>
                                    </p>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </article>
    </main>

    <script src="<?=URLSERVER.'/assets/scripts/userFunctions.js';?>"></script>
    <script src="<?=URLSERVER.'/assets/scripts/logout.js';?>"></script>
</body>
</html>