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
                                            <h4 class="wrapro-title "><i class="fa '.$row['icon'].'" style="color:'.$row['color'].';"></i>'.$row['proyectoNombre'].'</h4>
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
                                                <h6 onclick="goalDetails(this)" goalId="'.$goal['metaId'].'">'.$contador.'. '.$goal['metaDescripcion'].'</h6>
                                                <div class="wrapro-section-options">
                                                <div class="goal-opts">
                                                    <!--span class="badge">'.$goal['metaEstado'].'</span-->
                                                </div>
                                                <div class="goal-dates">
                                                    <p>'.date_format(date_create($goal['metaFechaFin']), 'd/m/Y').'</p>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="wrapro-subsection">
                                                <ul>';
                                                $tareas = $project->getTasksByMeta($goal['metaId'], $conn);
                                                $tareasResult = $tareas->fetchAll();
                                                $contador++;                                                
                                                
                                                foreach($tareasResult as $task) { 
                                                $fechaas = ($task['tareaFechaInicio'] == $task['tareaFechaFin']) ? date_format(date_create($task['tareaFechaFin']), 'd/m/Y') : date_format(date_create($task['tareaFechaInicio']), 'd/m/Y').' — '.date_format(date_create($task['tareaFechaFin']), 'd/m/Y');
                                                echo'<li>
                                                        <div class="wrapro-subsection-item">
                                                            <div class="task">
                                                                <label class="task-desc">
                                                                    <p class="line"></p>
                                                                    <input type="checkbox" onclick="checkTask(this, '.$task['tareaId'].')">
                                                                    <p>'.$task['tareaDescripcion'].'</p>
                                                                </label>
                                                                <div class="task-opts">
                                                                    <div class="task-dates">
                                                                        <p>'.$fechaas.'</p>
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
                                    <form id="formAddGoal" class="add-goals">
                                        <input type="text" placeholder="Agregar nueva meta" name="goalname" autocomplete="off">
                                        <input type="text" name="daterange" class="add-goal-date" placeholder="Fechas">
                                        <input type="hidden" name="project-link" value="<?=$projectLink;?>">
                                        <button class="btn add-goals-btn" type="submit"><span class="fa fa-check"></span></button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
            <section class="sec-right">
                <div class="widget">
                    <div class="project-info">
                        <div class="project-info-dates">
                            <table>
                                <?php 
                                    $createdate = "";
                                    foreach($result as $row) {
                                        echo "<tr><td>Creación: </td><td>".$row['proyectoFecha']."</td></tr>";
                                        echo "<tr><td>Fecha Inicio: </td><td>".$row['proyectoFechaInicio']."</td></tr>";
                                        echo "<tr><td>Fecha Fin: </td><td>".$row['proyectoFechaFin']."</td></tr>";
                                        echo "<tr><td>Estado: </td><td>".$row['proyectoEstado']."</td></tr>";
                                    }  
                                ?>
                            </table>
                        </div>
                        <div class="project-info-data">
                            
                        </div>
                    </div>
                </div>
                <div class="widget goal-details">
                    
                </div>
                <div class="widget create-task hide">
                    <h2 class="widget-title create-task-title">Nueva tarea</h2>
                    <form id="createTask">
                        <input type="hidden" id="goal" name="goalId">
                        <div class="form-group create-task-group">
                            <input type="text" name="taskname" placeholder="Nombre" autocomplete="off">
                        </div>
                        <div class="form-group create-task-group">
                            <input type="text" name="daterange" autocomplete="off" placeholder="Fecha" value="">
                        </div>
                        <div class="form-group create-task-group">
                            <select name="taskstatus">
                                <option value="Pendiente">Pendiente</option>
                                <option value="En progreso">En progreso</option>
                                <option value="Completado">Completado</option>
                            </select>
                            <select name="taskstype" id="selectTaskType">
                                <option value="Una vez">Una vez</option>
                                <option value="Habito">Hábito</option>
                            </select>
                        </div> 
                        <div id="appendhabit">
                            <div class="form-group create-task-group">
                                <select name="habitType" id="habitType">
                                    <option value="Diario">Diario</option>
                                    <option value="Semanal">Semanal</option>
                                </select>
                                <select name="habitStatus" id="habitStatus">
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                            <div class="form-group create-task-group fgroup-habitsdays">
                                <label for="Lunes"><input type="checkbox" name="Lunes" value="Lunes" id="Lunes"> Lunes</label>  
                                <label for="Martes"><input type="checkbox" name="Martes" value="Martes" id="Martes"> Martes</label>    
                                <label for="Miercoles"><input type="checkbox" name="Miercoles" value="Miercoles" id="Miercoles"> Miercoles</label>    
                            </div>
                            <div class="form-group create-task-group fgroup-habitsdays">
                                <label for="Jueves"><input type="checkbox" name="Jueves" value="Jueves" id="Jueves"> Jueves</label>   
                                <label for="Viernes"><input type="checkbox" name="Viernes" value="Viernes" id="Viernes"> Viernes</label>
                                <label for="Sabado"><input type="checkbox" name="Sabado" value="Sabado" id="Sabado"> Sabado</label>
                            </div>
                            <div class="form-group create-task-group fgroup-habitsdays">
                                <label for="Domingo"><input type="checkbox" name="Domingo" value="Domingo" id="Domingo"> Domingo</label>  
                            </div>
                        </div>
                        <div class="form-group create-task-group">
                            <input class="btn" type="submit" value="Guardar">
                        </div>
                    </form>
                
            </section>
        </article>
    </main>
    
<?php require_once ('templates/footer.php'); ?>
<?php require_once ('templates/daterange.html'); ?>

<script>

let formAddGoal = document.getElementById("formAddGoal");
let createTask = document.getElementById("createTask");
let selectTaskType = document.getElementById('selectTaskType');

selectTaskType.addEventListener('change', () => {
    if (selectTaskType.value == 'Habito') {
        $("#appendhabit").show();
    } else {
        $("#appendhabit").hide();
    }
});


formAddGoal.addEventListener('submit', (e) => {
    e.preventDefault();
    let formData = new FormData(formAddGoal);
    if (formData.get('goalname').trim().length != 0) {
        formData.append('ajax', 'save-goal');
        sendAjax('/src/ajax.php', formData);
    } else {
        loast.show("Ingresa la meta", "warning");
    }
});

createTask.addEventListener('submit', (e) => {
    e.preventDefault();
    let formData = new FormData(createTask);
    if (formData.get('taskname').trim().length != 0 && formData.get('daterange').trim().length != 0) {
        formData.append('ajax', 'save-task');
        sendAjax('/src/ajax.php', formData);
    } else {
        loast.show("Hay campos sin llenar", "warning");
    }
});

function goalDetails (i) {
    createTask.reset();
    let wrapGD = $('.goal-details');
    let goalId = $(i).attr('goalId');
    $('#goal').val(goalId);
    let goalName = $(i).text().split('. ')[1];
    $(".wrapro-section-header h6").removeClass('goal-selected');
    $(i).addClass('goal-selected');

    let formData = new FormData();
    formData.append('ajax', 'show-goal-det');
    formData.append('goalId', goalId);

    let ajax = new XMLHttpRequest();
	ajax.open('POST', '/src/ajax.php');
	ajax.onload = () => {
		if(ajax.status == 200 && ajax.responseText != 'error'){
            wrapGD.html(ajax.responseText);
            $(".create-task").show();
		}
		else{
			console.error('error de conexion-> estatus: ' + ajax.status + ', ready estatus: ' + ajax.readyState);
		}   
	}
	ajax.send(formData);
}

// check task
function checkTask(i, taskId) {
    console.log('Task Id '+taskId);
}

</script>