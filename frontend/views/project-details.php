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

                            <h5><span class="badge">25</span> Metas</h5>
                            <div class="wrapro-body">
                                <div class="wrapro-section">
                                    <div class="wrapro-section-header">
                                        <h6>Meta numero 1 para este proyecto</h6>
                                        <div class="wrapro-section-options">
                                            <div class="goal-dates">
                                                <p>22/01/2022 - 26/05/2022</p>
                                            </div>
                                            <div class="goal-opts">
                                                <span class="badge">Pendiente</span>
                                                <span class="badge">5 Tareas</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrapro-subsection">
                                        <ul>
                                            <li>
                                               <div class="wrapro-subsection-item">
                                                   <div class="task">
                                                       <label class="task-desc">
                                                            <p class="line"></p>
                                                            <input type="checkbox">
                                                            <p>Primera tarea para la meta 1 proyecto</p>
                                                        </label>
                                                        <div class="task-opts">
                                                            <div class="task-dates">
                                                                <p>22/01/2022 05:30 - 26/05/2022 12:00</p>
                                                            </div>
                                                            <div class="task-attrs">
                                                                <span class="badge">Habito</span>
                                                                <span class="badge">Pendiente</span>
                                                                <a class="badge Salud">Detalles</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="subtasks">

                                                    </div>
                                               </div>
                                            </li>
                                            <li>
                                               <div class="wrapro-subsection-item">
                                                   <div class="task">
                                                       <label class="task-desc">
                                                            <p class="line"></p>
                                                            <input type="checkbox">
                                                            <p>Hola Mundo sdfs sdfsfd</p>
                                                        </label>
                                                        <div class="task-opts">
                                                            <div class="task-dates">
                                                                <p>22/01/2022 05:30 - 26/05/2022 12:00</p>
                                                            </div>
                                                            <div class="task-attrs">
                                                                <span class="badge">Una vez</span>
                                                                <span class="badge">Pendiente</span>
                                                                <a class="badge Salud">Detalles</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="subtasks">
                                                        
                                                    </div>
                                               </div>
                                            </li>
                                            <li>
                                               <div class="wrapro-subsection-item">
                                                   <div class="task">
                                                       <label class="task-desc">
                                                            <p class="line"></p>
                                                            <input type="checkbox">
                                                            <p>Hola Mundo sdfsd sdfsd sds</p>
                                                        </label>
                                                        <div class="task-opts">
                                                            <div class="task-dates">
                                                                <p>22/01/2022 05:30 - 26/05/2022 12:00</p>
                                                            </div>
                                                            <div class="task-attrs">
                                                                <span class="badge">Habito</span>
                                                                <span class="badge">En progreso</span>
                                                                <a class="badge Salud">Detalles</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="subtasks">
                                                        <label class="subtask">
                                                            <p class="line"></p>
                                                            <input type="checkbox"><p>Tarea 1</p>
                                                        </label>
                                                        <label class="subtask">
                                                            <p class="line"></p>
                                                            <input type="checkbox"><p>Tarea 2</p>
                                                        </label>
                                                    </div>
                                               </div>
                                            </li>
                                            <li>
                                               <div class="wrapro-subsection-item">
                                                   <div class="task">
                                                       <label class="task-desc">
                                                            <p class="line"></p>
                                                            <input type="checkbox">
                                                            <p>Hola Mundo</p>
                                                        </label>
                                                        <div class="task-opts">
                                                            <div class="task-dates">
                                                                <p>22/01/2022 05:30 - 26/05/2022 12:00</p>
                                                            </div>
                                                            <div class="task-attrs">
                                                                <span class="badge">Habito</span>
                                                                <span class="badge">Pendiente</span>
                                                                <a class="badge Salud">Detalles</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="subtasks">
                                                        <label class="subtask">
                                                            <p class="line"></p>
                                                            <input type="checkbox"><p>Tarea 1</p>
                                                        </label>
                                                    </div>
                                               </div>
                                            </li>
                                            <li>
                                               <div class="wrapro-subsection-item">
                                                   <div class="task">
                                                       <label class="task-desc">
                                                            <p class="line"></p>
                                                            <input type="checkbox">
                                                            <p>Hola Mundo</p>
                                                        </label>
                                                        <div class="task-opts">
                                                            <div class="task-dates">
                                                                <p>22/01/2022 05:30 - 26/05/2022 12:00</p>
                                                            </div>
                                                            <div class="task-attrs">
                                                                <span class="badge">Habito</span>
                                                                <span class="badge">Pendiente</span>
                                                                <a class="badge Salud">Detalles</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="subtasks">
                                                        <label class="subtask">
                                                            <p class="line"></p>
                                                            <input type="checkbox"><p>Tarea 1</p>
                                                        </label>
                                                    </div>
                                               </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="wrapro-section-header">
                                        <h6>Meta numero 2 para este proyecto</h6>
                                        <div class="wrapro-section-options">
                                            <div class="goal-dates">
                                                <p>22/01/2022 - 26/05/2022</p>
                                            </div>
                                            <div class="goal-opts">
                                                <span class="badge">Pendiente</span>
                                                <span class="badge">5 Tareas</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrapro-subsection">
                                        <ul>
                                            <li>
                                               <div class="wrapro-subsection-item">
                                                   <div class="task">
                                                       <label class="task-desc">
                                                            <p class="line"></p>
                                                            <input type="checkbox">
                                                            <p>Primera tarea para la meta 1 proyecto</p>
                                                        </label>
                                                    </div>
                                                    <div class="subtasks">
                                                        <label class="subtask">
                                                            <p class="line"></p>
                                                            <input type="checkbox"><p>Tarea 1 sdfs dxfsdf</p>
                                                        </label>
                                                    </div>
                                               </div>
                                            </li>
                                            <li>
                                               <div class="wrapro-subsection-item">
                                                   <div class="task">
                                                       <label class="task-desc">
                                                            <p class="line"></p>
                                                            <input type="checkbox">
                                                            <p>Hola Mundo sdfs sdfsfd</p>
                                                        </label>
                                                    </div>
                                                    <div class="subtasks">
                                                        
                                                    </div>
                                               </div>
                                            </li>
                                            <li>
                                               <div class="wrapro-subsection-item">
                                                   <div class="task">
                                                       <label class="task-desc">
                                                            <p class="line"></p>
                                                            <input type="checkbox">
                                                            <p>Hola Mundo sdfsd sdfsd sds</p>
                                                        </label>
                                                    </div>
                                                    <div class="subtasks">
                                                        
                                                    </div>
                                               </div>
                                            </li>
                                            <li>
                                               <div class="wrapro-subsection-item">
                                                   <div class="task">
                                                       <label class="task-desc">
                                                            <p class="line"></p>
                                                            <input type="checkbox">
                                                            <p>Hola Mundo</p>
                                                        </label>
                                                    </div>
                                                    <div class="subtasks">
                                                        
                                                    </div>
                                               </div>
                                            </li>
                                            <li>
                                               <div class="wrapro-subsection-item">
                                                   <div class="task">
                                                       <label class="task-desc">
                                                            <p class="line"></p>
                                                            <input type="checkbox">
                                                            <p>Hola Mundo</p>
                                                        </label>
                                                    </div>
                                                    <div class="subtasks">
                                                        
                                                    </div>
                                               </div>
                                            </li>
                                        </ul>
                                    </div>
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
