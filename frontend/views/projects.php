<?php 
require_once ('templates/header.php'); 

$totals = $project->getCountProjectByStatus('%', $conn);
$totalQty = $totals['qty'];
$pending = $project->getCountProjectByStatus('Pendiente', $conn);
$pendingQty = $pending['qty'];
$progress = $project->getCountProjectByStatus('En progreso', $conn);
$progressQty = $progress['qty'];
$complete = $project->getCountProjectByStatus('Completado', $conn);
$completeQty = $complete['qty'];    
?>
    <main>
        <?php require_once ('templates/navbar.php'); ?>
        <article>
            <section class="sec-left sec-100">
                <div class="dashboard">
                    <div class="dashboard-top">
                        <p class="dashboard-top__title"></p>
                        <!-- <p class="dashboard-top__date"><?=$date;?></p> -->
                        <div id="clock" class="clock" onload="showTime()"></div> 
                    </div>
                    <div class="dashboard-body">
                        <div class="dashboard-numbers">
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
                                <button class="btn btn-opt"><i class="fa fa-list"></i></button>
                                <button class="btn btn-opt active"><i class="fa fa-table"></i></button>
                                <button class="btn-add createProject">
                                    <span class="fa fa-plus"></span> 
                                    <span class="small-text">Nuevo proyecto</span>
                                </buttonclass=>
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
                                                    <span class="box-icon fa '.$element['valorIcono'].'" style="color:'.$element['valorColor'].';"></span>
                                                    <a href="'.URLSERVER.'/projects/'.$element['proyectoLink'].'"><h4 class="box-name">'.$element['proyectoNombre'].'</h4></a>
                                                </div>
                                                <p class="box-desc">'.$element['proyectoDescripcion'].'</p>
                                                <div class="box-todo">
                                                    <span class="box-goals badge">'.$element['cantidad_metas'].' metas</span>
                                                    <span class="box-status badge">'.$element['proyectoEstado'].'</span>
                                                    <span class="box-status badge">'.$element['value'].'</span>
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
        </article>
        <?php 
            $valores = $value->getValues($conn);
            $valoresLista = $valores->fetchAll();
            if ($valores->rowCount() > 0) {
                echo "<div class='values hide'>";
                foreach($valoresLista as $valor) {
                    echo "<p>".$valor['valorNombre']."</p>";
                }
                echo "</div>";
            }
        ?>
    </main>

<?php require_once ('templates/footer.php'); ?>

<link rel="stylesheet" href="<?=URLSERVER.'/assets/daterangepicker/daterangepicker.css';?>">
<script type="text/javascript" src="<?=URLSERVER.'/assets/daterangepicker/daterangepicker.js';?>"></script>

<script>

    // load data into a modal to create a new project
    let createProject = document.querySelector(".createProject");
    createProject.addEventListener("click", () => {
        openModal(` <div class="modal-header">
                        <p class="modal-title">Crear nuevo proyecto</p>
                    </div>
                    <div class="modal-content">
                        <form id="formCreateProject" class="modal-form">
                            <div class="form-left">
                                <div class="form-group">
                                    <input class="input-project" id="project-name" name="project-name" type="text" placeholder="Proyecto" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <textarea name="project-description" id="project-description" cols="10" rows="2" placeholder="Descripción del proyecto"></textarea>
                                </div>
                                <div class="form-group form-group-block">
                                    <label for="inputGoal">Fecha</label>
                                    <input type="text" name="daterange">
                                </div>
                            </div>
                            <div class="form-right">
                                <div class="form-right-title">
                                    <p>Atributos</p>
                                    <span class="lj lj-bookmark"></span>
                                </div>
                                <div class="form-group">
                                    <select name="project-value" id="project-value"></select>
                                </div>
                                <div class="form-group">
                                    <select name="project-status" id="project-status">
                                        <option disabled="disabled" value="0">Estado</option>
                                        <option value="Pendiente" selected>Pendiente</option>
                                        <option value="En progreso">En progreso</option>
                                        <option value="Completado">Completado</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <input class="form-btn" onclick="saveProject('formCreateProject')" type="submit" value="Guardar">
                    </div>`
                );

        for (let i = 1; i <= $(".values p").length; i++) {
            $("#project-value").append(`<option value="${$(".values p:nth-child("+i+")").text()}">${$(".values p:nth-child("+i+")").text()}</option>`);
        }

        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                "locale":{
                    "format": "DD-MM-YYYY",
                    "separator": " - ",
                    "applyLabel": "Aplicar",
                    "cancelLabel": "Cancelar",
                    "daysOfWeek": ["Dom","Lun","Mar", "Mie","Jue","Vie","Sab"],
                    "monthNames": ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                    "firstDay": 0
                }
            });
        });
    });

</script>