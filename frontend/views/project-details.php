<?php 
require_once ('templates/header.php'); 
require_once ('../backend/bootstrap.php');
require_once ('../backend/dao/project.php');
$project = new Project();
?>
    <main>
        <?php require_once ('templates/navbar.php'); ?>
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
                                                        <button class="goal-edit" onclick="editGoal('.$goal['metaId'].')"><span class="lj lj-pencil"></span></button>
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
                                    <form id="formAddGoal" class="add-goals form-group">
                                        <input type="text" placeholder="Agregar nueva meta" name="goal-desc">
                                        <!-- <input class="date-range" type="text" name="range"> -->
                                        <input type="date" name="goal-date" id="goal-date">
                                        <input type="hidden" name="project-link" value="<?=$projectLink;?>">
                                        <button class="btn-classic" type="submit"><span class="lj lj-checkmark-circle"></span></button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
            <section class="sec-right">
                <div class="widget">
                    <!-- <?=$projectLink;?> -->
                    <div class="project-info">
                        <span class="badge">Proyecto Pendiente</span>
                        <span class="badge">etiquetas</span>
                        <span class="badge">test</span>
                        <span class="badge">nuevo</span>
                        <br>
                        <div class="project-info-dates">
                            <table>
                                <tr>
                                    <td>Fecha inicio</td>
                                    <td>Fecha fin</td>
                                </tr>
                                <tr>
                                    <td>28/05/2022</td>
                                    <td>25/08/2022</td>
                                </tr>
                            </table>
                        </div>
                        <div class="project-info-data">
                            <p>20 días desde la creación</p>
                            <p>5 Metas completadas</p>
                            <p>3 Metas pendientes</p>
                            <p>10 días para que se termine el tiempo</p>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </main>
    
<?php require_once ('templates/footer.php'); ?>

<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"> -->

<script>

// $('input[name="range"]').daterangepicker({
//     "locale":{
//         "format": "DD/MM/YYYY",
//         "separator": " - ",
//         "applyLabel": "Aplicar",
//         "cancelLabel": "Cancelar",
//         "daysOfWeek": ["Dom","Lun","Mar", "Mie","Jue","Vie","Sab"],
//         "monthNames": ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
//         "firstDay": 0
//     }
// });

let formAddGoal = document.getElementById("formAddGoal");
document.getElementById("goal-date").value = moment().format('Y-MM-DD');

formAddGoal.addEventListener('submit', (e) => {
    e.preventDefault();
    let formData = new FormData(formAddGoal);
    addOneGoal(formData);
});


</script>