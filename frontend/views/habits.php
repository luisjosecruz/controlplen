<?php require_once ('templates/header.php'); ?>
<body>
    <main>
        <?php require_once ('templates/navbar.php'); ?>
        <article>
            <section class="sec-left">
                <div class="dashboard">
                    <div class="dashboard-top">
                        <p class="dashboard-top__title">Hábitos</p>
                        <p><?=$date;?></p>
                    </div>
                    <div class="dashboard-body">
                        <p class="title-divider">Tareas para hacer hoy</p>
                        <div class="todo">
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
                            <li class="small-text">Hábitos</li>
                        </ul>
                    </div>
                    <div class="user-area__notify">
                        <button id="logout" title="Cerrar sesión"><span class="lj lj-power-switch"></span></button>
                    </div>
                </div>
                <div class="widget">
                    <p class="widget-title"><span class="lj lj-select"></span> Hábitos</p>
                    <div class="habits-list">
                        <ul>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">Domir 8 horas</span> 
                                        <span class="small-text">Noche</span>
                                    </p>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </article>
    </main>

    <script src="<?=URLSERVER.'/assets/scripts/userFunctions.js';?>"></script>
    <script src="<?=URLSERVER.'/assets/scripts/logout.js';?>"></script>
    <script src="<?=URLSERVER.'/assets/scripts/interactive.js';?>"></script>
</body>
</html>