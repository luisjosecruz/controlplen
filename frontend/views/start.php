<?php require_once ('templates/header.php'); ?>
<body>
    <main>
        <?php 
            require_once ('templates/navbar.php'); 
            require_once ('../backend/bootstrap.php');
            require_once ('../backend/dao/goals.php');
            $goal = new Goals();
        ?>
        <article>
            <section class="sec-left">
                <div class="dashboard">
                    <div class="dashboard-top">
                        <p class="dashboard-top__title options">
                            <button id="open-button" class="open-button">
                                <span class="lj lj-plus-circle"></span> 
                                <span class="small-text">Nuevo proyecto</span>
                            </button>
                        </p>
                        <p class="dashboard-top__date"><?=$date;?></p>
                    </div>
                    <div class="dashboard-body">
                        <div class="dashboard-numbers">
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber">25</p>
                                <p class="normal-text">Proyectos totales</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber">6</p>
                                <p class="normal-text">Proyectos en progreso</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber">15</p>
                                <p class="normal-text">Proyectos completados</p>
                            </div>
                        </div>
                        <div class="title-divider">
                            <p>Proyectos recientes</p>
                            <div class="options">
                                <a class="a-link">Ver todos</a>
                            </div>
                        </div>
                        <div class="home-grid">
                            <?php 

                                $proyectos = $goal->getProjects($conn);
                                $result = $proyectos->fetchAll();
                                foreach($result as $element) {
                                    echo '
                                        <div class="home-grid__box home-grid__one">
                                            <a class="box-cog"><span class="lj lj-cog"></span></a>
                                            <div class="box-body">
                                                <div class="box-head">
                                                    <span class="box-icon lj lj-bookmark"></span>
                                                    <h4 class="box-name">'.$element['proyectoNombre'].'</h4>
                                                </div>
                                                <p class="box-desc">'.$element['proyectoDescripcion'].'</p>
                                                <span class="box-status badge">'.$element['proyectoEstado'].'</span>
                                                <span class="box-goals badge">15 metas</span>
                                                <div class="box-todo">
                                                    <p class="box-task">2 metas completadas</p>
                                                    <p class="box-dates">10%</p>
                                                </div>
                                            </div>
                                        </div>
                                    ';
                                }
                            
                            ?>
                            <div class="home-grid__box home-grid__two"></div>
                            <div class="home-grid__box home-grid__three"></div>
                            <div class="home-grid__box home-grid__four"></div>
                            <div class="home-grid__box home-grid__five"></div>
                            <div class="home-grid__box home-grid__six"></div>
                        </div>
                        <!-- <div class="todo">
                            <div class="todo-task">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label class="habits-list__text">
                                                    <input type="checkbox"> 
                                                    <p>
                                                        <span class="normal-text">---</span> 
                                                        <span class="small-text">...</span>
                                                    </p>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="todo-metrics">
                                <div class="todo-metrics__card">
                                    <p><span>-</span> ---</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>
            <section class="sec-right">
                <div class="user-area">
                    <div class="user-area__account">
                        <img src="<?=URLSERVER.'/assets/images/user.png';?>" alt="userpicture">
                        <ul>
                            <li class="normal-text">Luis José Cruz</li>
                            <li class="small-text">El tiempo está pasando</li>
                        </ul>
                    </div>
                    <div class="user-area__notify">
                        <button id="logout" title="Cerrar sesión"><span class="lj lj-power-switch"></span></button>
                    </div>
                </div>
                <div class="widget widget-clock">
                    <div class="clock-wrap">
                        <div id="clock" class="clock" onload="showTime()"></div> 
                    </div>               
                </div>
                <div class="widget">
                    <p class="widget-title"><span class="lj lj-select"></span> Tareas de hoy</p>
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

    <div class="modal-overlay closed" id="modal-overlay"></div>

    <div class="modal closed" id="modal">
        <div class="modal-guts">
            <div class="modal-header">
                <p class="modal-title">Crear nuevo proyecto</p>
                <button class="close-button" id="close-button">X</button>
            </div>
            <div class="modal-content">
                <form class="modal-form">
                    <div class="form-left">
                        <div class="form-group">
                            <label for="project-name">Nombre:</label>
                            <input id="project-name" type="text" placeholder="Proyecto">
                        </div>
                        <div class="form-group">
                            <textarea name="project-description" id="project-description" cols="10" rows="2" placeholder="Descripción del proyecto"></textarea>
                        </div>
                        <div class="form-group select-tags">
                            <label for="project-name">Metas</label>
                            <input id="project-name" type="text" placeholder="Crear metas">
                        </div>
                    </div>
                    <div class="form-right">
                        <div class="form-right-title">
                            <p>Atributos</p>
                            <span class="lj lj-clock"></span>
                        </div>
                        <div class="form-group">
                            <label class="attributes" for="project-status">Estado</label>
                            <select name="project-status" id="project-status">
                                <option disabled="disabled" selected value="0">Estado</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Alcanzado">Alcanzado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="attributes" for="project-start-date">Inicio</label>
                            <input type="date" name="project-start-date" id="project-start-date" value="<?php echo date("Y-m-d");?>">
                        </div>
                        <div class="form-group">
                            <label class="attributes" for="project-end-date">Fin</label>
                            <input type="date" name="project-end-date" id="project-end-date" >
                        </div>
                        <div class="form-group select-tags">
                            <label class="attributes" for="project-tags">Etiquetas</label>
                            <textarea type="text" name="project-tags" id="project-tags" ></textarea>
                        </div>
                        <input class="form-btn" id="saveObjective" type="submit" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?=URLSERVER.'/assets/scripts/userFunctions.js';?>"></script>
    <script src="<?=URLSERVER.'/assets/scripts/logout.js';?>"></script>
    <script src="<?=URLSERVER.'/assets/scripts/interactive.js';?>"></script>
    <script src="<?=URLSERVER.'/assets/scripts/app.js';?>"></script>
</body>
</html>