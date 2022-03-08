<?php 
require_once ('templates/header.php'); 
require_once ('../backend/bootstrap.php');
require_once ('../backend/dao/project.php');
$project = new Project();

$totals = $project->getQtyData($conn);
$cantProyectos = $totals['cantProyectos'];
$cantMetas = $totals['cantMetas'];
$cantMetasCompletas = $totals['cantMetasCompletas'];
$cantTareas = $totals['cantTareas'];
$cantTareasCompletas = $totals['cantTareasCompletas'];
?>
    <main>
        <?php require_once ('templates/navbar.php'); ?>
        <article>
            <section class="sec-left">
                <div class="dashboard">
                    <div class="dashboard-top">
                        <p class="dashboard-top__date"><?=$date;?></p>
                        <div id="clock" class="clock" onload="showTime()"></div> 
                    </div>
                    <div class="dashboard-body">
                        <div class="dashboard-numbers">
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
                                                    <span class="box-status badge '.$element['value'].'">'.$element['value'].'</span>
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

<script>

// load data into a modal to create a new project
let createProject = document.getElementById("createProject");
createProject.addEventListener("click", () => {
    openModal(` <div class="modal-header">
                    <p class="modal-title">Crear nuevo proyecto</p>
                </div>
                <div class="modal-content">
                    <form id="formCreateProject" class="modal-form">
                        <div class="form-left">
                            <div class="form-group">
                                <label for="project-name">Nombre:</label>
                                <input class="input-project" id="project-name" name="project-name" type="text" placeholder="Proyecto" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <textarea name="project-description" id="project-description" cols="10" rows="2" placeholder="Descripción del proyecto"></textarea>
                            </div>
                            <div class="form-group select-tags">
                                <label for="inputGoal">Metas</label>
                                <div class="create-goals">
                                    <input class="input-goal" id="inputGoal" type="text" placeholder="Crear metas" autocomplete="off">
                                    <a id="createGoal" class="add-goal" onclick="addGoal(this)"><span class="lj lj-plus-circle"></span></a>
                                </div>
                                <div class="create-goals">
                                    <div class="create-goals-list"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-right">
                            <div class="form-right-title">
                                <p>Atributos</p>
                                <span class="lj lj-bookmark"></span>
                            </div>
                            <div class="form-group">
                                <label class="attributes" for="project-value">Valor</label>
                                <select name="project-value" id="project-value">
                                    <option value="1" selected>Salud</option>
                                    <option value="2">Arte</option>
                                    <option value="3">Felicidad</option>
                                    <option value="4">Amor y Paz</option>
                                    <option value="5">Aprendizaje</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="attributes" for="project-status">Estado</label>
                                <select name="project-status" id="project-status">
                                    <option disabled="disabled" value="0">Estado</option>
                                    <option value="Pendiente" selected>Pendiente</option>
                                    <option value="En progreso">En progreso</option>
                                    <option value="Completado">Completado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="attributes" for="project-start-date">Inicio</label>
                                <input type="date" name="project-start-date" id="project-start-date" value="${moment().format('Y-MM-DD')}">
                            </div>
                            <div class="form-group">
                                <label class="attributes" for="project-end-date">Fin</label>
                                <input type="date" name="project-end-date" id="project-end-date" >
                            </div>
                            <div class="form-group select-tags">
                                <label class="attributes" for="project-tags">Etiquetas</label>
                                <div class="create-goals">
                                    <input class="input-goal" id="inputTag" type="text" placeholder="Agregar etiquetas" autocomplete="off">
                                    <a id="createTag" onclick="addTag(this)" class="add-goal"><span class="lj lj-plus-circle"></span></a>
                                </div>
                                <div class="create-goals">
                                    <div class="create-tags-list"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p id="modalMessage" class="modal-message"></p>
                    <input class="form-btn" onclick="saveProject('formCreateProject')" type="submit" value="Guardar">
                </div>`
            );
});

</script>