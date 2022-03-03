<?php require_once ('templates/header.php'); ?>
<body>
    <main>
        <?php 
            require_once ('templates/navbar.php'); 
            require_once ('../backend/bootstrap.php');
            require_once ('../backend/dao/project.php');
            $project = new Project();
        ?>
        <article>
            <section class="sec-left">
                <div class="dashboard">
                    <div class="dashboard-top">
                        <div id="clock" class="clock" onload="showTime()"></div> 
                        <p class="dashboard-top__date"><?=$date;?></p>
                    </div>
                    <div class="dashboard-body">
                        <div class="dashboard-numbers">
                        <?php 
                            $totals = $project->getQtyData($conn);
                            $cantProyectos = $totals['cantProyectos'];
                            $cantMetas = $totals['cantMetas'];
                            $cantMetasCompletas = $totals['cantMetasCompletas'];
                            $cantTareas = $totals['cantTareas'];
                            $cantTareasCompletas = $totals['cantTareasCompletas'];
                        ?>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber"><?=$cantProyectos?></p>
                                <p class="normal-text">Proyectos totales</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber"><?=$cantMetas?></p>
                                <p class="normal-text">Metas totales</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber"><?=$cantMetasCompletas?></p>
                                <p class="normal-text">Metas completadas</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber"><?=$cantTareas?></p>
                                <p class="normal-text">Tareas totales</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber"><?=$cantTareasCompletas?></p>
                                <p class="normal-text">Tareas completadas</p>
                            </div>
                        </div>
                        <div class="title-divider">
                            <p>Proyectos recientes</p>
                            <div class="options">
                                <a href="<?=URLSERVER."/projects";?>" class="a-link">Ver todos</a>
                                <button id="createProject" class="open-button">
                                    <span class="lj lj-plus-circle"></span> 
                                    <span class="small-text">Nuevo proyecto</span>
                                </button>
                            </div>
                        </div>
                        <div class="home-grid">
                            <?php 

                                $proyectos = $project->getProjects($conn);
                                $result = $proyectos->fetchAll();
                                foreach($result as $element) {
                                    echo '
                                        <div class="home-grid__box home-grid__one">
                                            <a class="box-cog"><span class="lj lj-cog"></span></a>
                                            <div class="box-body">
                                                <div class="box-head">
                                                    <span class="box-icon lj lj-bookmark"></span>
                                                    <a href="'.URLSERVER.'/projects/'.$element['proyectoLink'].'"><h4 class="box-name">'.$element['proyectoNombre'].'</h4></a>
                                                </div>
                                                <p class="box-desc">'.$element['proyectoDescripcion'].'</p>
                                                <div class="box-todo">
                                                    <span class="box-goals badge '.$element['value'].'">'.$element['cantidad_metas'].' metas</span>
                                                    <span class="box-status badge '.$element['value'].'">'.$element['proyectoEstado'].'</span>
                                                </div>
                                            </div>
                                        </div>
                                    ';
                                }
                            
                            ?>
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
                <div class="widget">
                    <p class="widget-title"><span class="lj lj-select"></span> Tareas de hoy</p>
                    <div class="habits-list">
                        <ul>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">Hacer ejercicio por 30 minutos</span> 
                                        <span class="small-text">Mañana</span>
                                    </p>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </article>
    </main>

<?php require_once ('templates/footer.php'); ?>