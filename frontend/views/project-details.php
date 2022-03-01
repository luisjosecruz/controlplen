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
                        <!-- <p class="dashboard-top__title">Proyectos</p> -->
                        <div id="clock" class="clock" onload="showTime()"></div> 
                        <p class="dashboard-top__date"><?=$date;?></p>
                    </div>
                    <div class="dashboard-body">
                        <div class="dashboard-numbers">
                            <?php 
                                $totals = $project->getCountProjectByStatus('%', $conn);
                                $totalQty = $totals['qty'];
                                $pending = $project->getCountProjectByStatus('Pendiente', $conn);
                                $pendingQty = $pending['qty'];
                                $progress = $project->getCountProjectByStatus('En progreso', $conn);
                                $progressQty = $progress['qty'];
                                $complete = $project->getCountProjectByStatus('Completado', $conn);
                                $completeQty = $complete['qty'];
                            ?>
                                <div class="dashboard-numbers__item">
                                    <p class="dashboard-number__bigNumber"><?=$totalQty?></p>
                                    <p class="normal-text">Proyectos totales</p>
                                </div>
                                <div class="dashboard-numbers__item">
                                    <p class="dashboard-number__bigNumber"><?=$pendingQty?></p>
                                    <p class="normal-text">Proyectos pendientes</p>
                                </div>
                                <div class="dashboard-numbers__item">
                                    <p class="dashboard-number__bigNumber"><?=$progressQty?></p>
                                    <p class="normal-text">Proyectos en progreso</p>
                                </div>
                                <div class="dashboard-numbers__item">
                                    <p class="dashboard-number__bigNumber"><?=$completeQty?></p>
                                    <p class="normal-text">Proyectos completados</p>
                                </div>
                            </div>
                        </div>
                        <div class="title-divider">
                            <p>Todos los proyectos</p>
                            <div class="options">
                                <a class="a-link"><span class="lj lj-menu"></span></a>
                                <a class="a-link"><span class="lj lj-crop"></span></a>
                            </div>
                        </div>
                        <div class="home-grid">
                            <?php 
                                $proyectos = $project->getAllProjects($conn);
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
                    </div>
                </div>
            </section>
            <section class="sec-right">
                <div class="user-area">
                    <div class="user-area__account">
                        <img src="<?=URLSERVER.'/assets/images/logo.png';?>" alt="userpicture">
                        <ul>
                            <li class="normal-text">Luis José Cruz</li>
                            <li class="small-text">Detalle del proyecto</li>
                        </ul>
                    </div>
                    <div class="user-area__notify">
                        <button id="logout" title="Cerrar sesión"><span class="lj lj-power-switch"></span></button>
                    </div>
                </div>
                <div class="widget">
                    Hola Mundo
                </div>
            </section>
        </article>
    </main>

    <div class="modal-overlay closed" id="modal-overlay"></div>

    <div class="modal closed" id="modal">
        <button class="close-button" id="close-button">X</button>
        <div class="modal-guts" id="modal-data">
        </div>
    </div>

<?php require_once ('templates/footer.php'); ?>