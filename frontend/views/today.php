<?php 
require_once ('templates/header.php'); 

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
                        <p class="dashboard-top__date"></p>
                        <div id="clock" class="clock" onload="showTime()"></div> 
                    </div>
                    <div class="dashboard-body">
                        <input type="hidden" id="cantValues" value="<?=$value->thereAreValues($conn)?>">
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
                            <p>Prioridades</p>
                            <div class="options">
                                <a href="<?=URLSERVER."/projects";?>" class="a-link">Ver todos</a>
                                <button class="btn-add createProject">
                                    <span class="fa fa-plus"></span> 
                                    <span class="small-text">Nuevo proyecto</span>
                                </buttonclass=>
                            </div>
                        </div>
                        <div class="home-grid">
                            <div class="home-grid-box home-values">
                                ---
                            </div>
                            <div class="home-grid-box">
                                <div class="home-card-temp home-card-info home-card-phrases">
                                    <p class="home-phrases">
                                        <i class="fa fa-calendar-day"></i>
                                        <span>¿Cuál fue tu experiencia hoy?</span>
                                    </p>
                                </div>
                                <div class="home-card-temp home-card-info">
                                    <p>Holaa</p>
                                </div>
                            </div>
                            <div class="home-grid-box">

                            <?php 
                                $proyectos = $project->getProjects($conn);
                                $result = $proyectos->fetchAll();
                                if ($proyectos->rowCount() > 0) {
                                    foreach($result as $element) {
                                        echo '
                                            <div class="home-grid-boxes__item">
                                                <div class="box-body">
                                                    <div class="box-head">
                                                        <span class="box-icon fa '.$element['icon'].'" style="color:'.$element['color'].'"></span>
                                                        <a href="'.URLSERVER.'/projects/'.$element['proyectoLink'].'"><h4 class="box-name">'.$element['proyectoNombre'].'</h4></a>
                                                    </div>
                                                </div>
                                            </div>
                                        ';
                                    }
                                } else {
                                    echo '
                                        <div class="home-card-temp">
                                            <img src="../assets/images/addpro.svg">
                                            <p class="home-card-temp-text" >Comencemos a unir los puntos.</p>
                                        </div>  
                                    ';
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="sec-right">
                <div class="widget">

                    <div class="container">
                        ---
                    </div>

                    <!-- <p class="widget-title"><i class="fa-solid fa-calendar-check"></i> <?=$date;?></p> -->

                    <div class="todo-list">
                        ---
                    </div>
                </div>
            </section>
        </article>
    </main>

<?php require_once ('templates/footer.php'); ?>

<link rel="stylesheet" href="<?=URLSERVER.'/assets/daterangepicker/daterangepicker.css';?>">
<script type="text/javascript" src="<?=URLSERVER.'/assets/daterangepicker/daterangepicker.js';?>"></script>

<script>

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
        },
        function(start, end, label) {
            console.log(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
        }
    });
});

</script>