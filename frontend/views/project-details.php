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
                        <div class="title-divider">
                            <p>Detalle del proyecto</p>
                            <div class="options">
                                <a class="a-link"><span class="lj lj-menu"></span></a>
                            </div>
                        </div>

                        <div class="wrapro">
                            <?php 
                            
                            $proyecto = $project->getProjectByRandom($projectLink, $conn);
                            $result = $proyecto->fetchAll();
                            foreach($result as $row) {
                                echo '
                                <div class="wrapro-header">
                                    <div class="wrapro-name">
                                        <h4 class="wrapro-title '.$row['valorNombre'].'">'.$row['proyectoNombre'].'</h4>
                                        <h4 class="wrapro-desc">'.$row['proyectoDescripcion'].'</h4>
                                    </div>
                                    <div class="wrapro-det">
                                        <p class="badge '.$row['valorNombre'].'">'.$row['valorNombre'].'</p>
                                        <p class="badge '.$row['valorNombre'].'">'.$row['proyectoEstado'].'</p>
                                        <p class="badge '.$row['valorNombre'].'">'.$row['proyectoFechaInicio'].'</p>
                                        <p class="badge '.$row['valorNombre'].'">'.$row['proyectoFechaFin'].'</p>
                                        <p class="badge '.$row['valorNombre'].'">'.$row['proyectoEtiquetas'].'</p>
                                    </div>
                                </div>';
                            }

                            ?>

                            <h5>Metas</h5>

                            <div class="container">
                                <div class="header">
                                    <span>➤</span>
                                    
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>This is just some random content.</li>
                                        <li>This is just some random content.</li>
                                        <li>This is just some random content.</li>
                                        <li>This is just some random content.</li>
                                    </ul>
                                </div>

                                <div class="header"><span>➤</span>

                                </div>
                                <div class="content">
                                    <ul>
                                        <li>This is just some random content.</li>
                                        <li>This is just some random content.</li>
                                        <li>This is just some random content.</li>
                                        <li>This is just some random content.</li>
                                    </ul>
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

<script>

$(".header").click(function () {

$header = $(this);
    //getting the next element
    $content = $header.next();
    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
    $content.slideToggle(100, function () {
        //execute this after slideToggle is done
        //change text of header based on visibility of content div
        $header.text(function () {
            //change text based on condition
            return $content.is(":visible") ? "▼" : "➤";
        });
    });

});

</script>