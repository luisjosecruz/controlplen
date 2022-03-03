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
                <div class="widget">
                    <!-- <p class="widget-title"><span class="lj lj-enter"></span> Proyectos</p> -->
                    
                    <div class="form-group">
                        <!-- <label for="project-name">Nombre:</label> -->
                        <input class="input-project" id="project-name" type="text" placeholder="Proyecto" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <textarea name="project-description" id="project-description" cols="10" rows="2" placeholder="Descripción"></textarea>
                    </div>
                    <!-- <div class="form-right-title">
                        <p>Atributos</p>
                        <span class="lj lj-bookmark"></span>
                    </div> -->
                    <div class="form-group">
                        <select name="project-value" id="project-value">
                            <option value="1" selected>Salud</option>
                            <option value="2">Arte</option>
                            <option value="3">Felicidad</option>
                            <option value="4">Amor y Paz</option>
                            <option value="5">Aprendizaje</option>
                        </select>
                        <select name="project-status" id="project-status">
                            <option disabled="disabled" selected value="0">Estado</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="En progreso">Inactivo</option>
                            <option value="Completado">Completado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="date" name="project-start-date" id="project-start-date" value="<?php echo date("Y-m-d");?>">
                        <input type="date" name="project-end-date" id="project-end-date" >
                    </div>
                    <div class="form-group select-tags">
                        <div class="create-goals">
                            <input class="input-goal" id="inputTag" type="text" placeholder="Agregar etiquetas" autocomplete="off">
                            <a id="createTag" class="add-goal">+</a>
                        </div>
                        <div class="create-goals">
                            <div class="create-tags-list"></div>
                        </div>
                    </div>
                    <div class="create-goals">
                        <input class="input-goal" id="inputGoal" type="text" placeholder="Crear metas" autocomplete="off">
                        <a id="createGoal" class="add-goal">+</a>
                    </div>
                    <div class="create-goals">
                        <div class="create-goals-list"></div>
                    </div>
                    <input class="form-btn" id="saveObjective" type="submit" value="Guardar">
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