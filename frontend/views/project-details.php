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
                        <p class="dashboard-top__date"><?=$date;?></p>
                        <div id="clock" class="clock" onload="showTime ()"></div> 
                    </div>
                    <div class="dashboard-body">

                        <div class="wrapro">
                            <?php 
                            
                            $proyecto = $project->getProjectByRandom($projectLink, $conn);
                            $result = $proyecto->fetchAll();
                            foreach($result as $row) {
                                echo '
                                <div class="wrapro-header">
                                    <div class="wrapro-name">
                                        <h4 class="wrapro-title ">'.$row['proyectoNombre'].'</h4>
                                        <h4 class="wrapro-desc">'.$row['proyectoDescripcion'].'</h4>
                                        <!--div class="wrapro-det">
                                            <p class="badge '.$row['valorNombre'].'">'.$row['valorNombre'].'</p>
                                            <p class="badge '.$row['valorNombre'].'">'.$row['proyectoEstado'].'</p>
                                            <p class="badge '.$row['valorNombre'].'">'.$row['proyectoEtiquetas'].'</p>
                                        </div-->
                                    </div>
                                </div>';
                            }
                            ?>

                            <div class="wrapro-body">
                                <div class="wrapro-section">

                                <?php 
                                    $metas = $project->getGoalsByRandom($projectLink, $conn);
                                    $metasResult = $metas->fetchAll();
                                    $contador = 1;
                                    foreach($metasResult as $goal) {
                                        echo '
                                            <div class="wrapro-section-header">
                                                <h6>'.$contador.'. '.$goal['metaDescripcion'].'</h6>
                                                <div class="wrapro-section-options">
                                                    <div class="goal-dates">
                                                        <p>'.date_format(date_create($goal['metaFechaInicio']), 'd/m/Y').' — '.date_format(date_create($goal['metaFechaFin']), 'd/m/Y').'</p>
                                                    </div>
                                                    <div class="goal-opts">
                                                        <span class="badge">Meta '.$goal['metaEstado'].'</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrapro-subsection">
                                                <ul>';
                                                $tareas = $project->getTasksByMeta($goal['metaId'], $conn);
                                                $tareasResult = $tareas->fetchAll();
                                                $contador++;
                                                
                                                foreach($tareasResult as $task) { 
                                                echo'<li>
                                                        <div class="wrapro-subsection-item">
                                                            <div class="task">
                                                                <label class="task-desc">
                                                                    <p class="line"></p>
                                                                    <input type="checkbox">
                                                                    <p>'.$task['tareaDescripcion'].'</p>
                                                                </label>
                                                                <div class="task-opts">
                                                                    <div class="task-dates">
                                                                        <p>'.date_format(date_create($task['tareaFechaInicio']), 'd/m/Y').' — '.date_format(date_create($task['tareaFechaFin']), 'd/m/Y').'</p>
                                                                    </div>
                                                                    <div class="task-attrs">
                                                                        <span class="badge">'.$task['tareaTipo'].'</span>
                                                                        <span class="badge">'.$task['tareaEstado'].'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="subtasks">
                                                                <!--label class="subtask">
                                                                    <p class="line"></p>
                                                                    <input type="checkbox"><p>Tarea 1</p>
                                                                </label-->
                                                            </div>
                                                        </div>
                                                    </li>';
                                                }
                                            echo'</ul>
                                            </div>
                                        ';
                                    }    
                                ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
            <section class="sec-right">
                <div class="widget">
                    <?=$projectLink;?>
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
