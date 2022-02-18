<?php require_once ('templates/header.php'); ?>
<body>
    <main>
        <?php require_once ('templates/navbar.php'); ?>
        <article>
            <section class="sec-left">
                <div class="dashboard">
                    <div class="dashboard-top">
                        <p class="dashboard-top__title">Dashboard</p>
                        <p><?=$date;?></p>
                    </div>
                    <div class="dashboard-body">
                        <div class="dashboard-numbers">
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber">5</p>
                                <p class="normal-text">Salud</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber">6</p>
                                <p class="normal-text">Arte</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber">15</p>
                                <p class="normal-text">Felicidad</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber">4</p>
                                <p class="normal-text">Amor y paz</p>
                            </div>
                            <div class="dashboard-numbers__item">
                                <p class="dashboard-number__bigNumber">5</p>
                                <p class="normal-text">Aprendizaje</p>
                            </div>
                        </div>
                        <div class="title-divider">
                            <p>Páginas individuales</p>
                            <div class="options">
                                <button id="open-button" class="open-button">
                                    <span class="lj lj-plus-circle"></span> 
                                    <span class="small-text">Agregar</span>
                                </button>
                            </div>
                        </div>
                        <div class="home-grid">
                            <div class="home-grid__box home-grid__one"></div>
                            <div class="home-grid__box home-grid__two"></div>
                            <div class="home-grid__box home-grid__three"></div>
                            <div class="home-grid__box home-grid__three"></div>
                            <div class="home-grid__box home-grid__three"></div>
                            <div class="home-grid__box home-grid__one"></div>
                            <div class="home-grid__box home-grid__two"></div>
                            <div class="home-grid__box home-grid__three"></div>
                            <div class="home-grid__box home-grid__three"></div>
                            <div class="home-grid__box home-grid__three"></div>
                            <div class="home-grid__box home-grid__one"></div>
                            <div class="home-grid__box home-grid__two"></div>
                            <div class="home-grid__box home-grid__three"></div>
                            <div class="home-grid__box home-grid__three"></div>
                            <div class="home-grid__box home-grid__three"></div>
                            <div class="home-grid__box home-grid__one"></div>
                            <div class="home-grid__box home-grid__two"></div>
                            <div class="home-grid__box home-grid__three"></div>
                            <div class="home-grid__box home-grid__three"></div>
                            <div class="home-grid__box home-grid__three"></div>
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
                <div class="user-area">
                    <div class="user-area__account">
                        <img src="<?=URLSERVER.'/assets/images/logo.png';?>" alt="userpicture">
                        <ul>
                            <li class="normal-text">Luis José Cruz</li>
                            <li class="small-text">Es bueno verte otra vez</li>
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
                                        <span class="normal-text">Lavar mi cara y usar crema facial</span> 
                                        <span class="small-text">Mañana y noche</span>
                                    </p>
                                </label>
                            </li>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">usar protector solar</span> 
                                        <span class="small-text">Mañana</span>
                                    </p>
                                </label>
                            </li>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">Hacer ejercicio por 30 minutos</span> 
                                        <span class="small-text">Mañana</span>
                                    </p>
                                </label>
                            </li>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">Comer frutas y verduras</span> 
                                        <span class="small-text">Todo el día</span>
                                    </p>
                                </label>
                            </li>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">Lavar  mis dientes 3 veces</span> 
                                        <span class="small-text">Todo el día</span>
                                    </p>
                                </label>
                            </li>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">Usar hilo dental por la noche</span> 
                                        <span class="small-text">Noche</span>
                                    </p>
                                </label>
                            </li>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">Realizar una actividad relajante</span> 
                                        <span class="small-text">Todo el día</span>
                                    </p>
                                </label>
                            </li>
                            <li>
                                <label class="habits-list__text">
                                    <input type="checkbox"> 
                                    <p>
                                        <span class="normal-text">Lavar mis pies y limpiar mis uñas</span> 
                                        <span class="small-text">Noche</span>
                                    </p>
                                </label>
                            </li>
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

    <div class="modal-overlay closed" id="modal-overlay"></div>

    <div class="modal closed" id="modal">
        <button class="close-button" id="close-button">X</button>
        <div class="modal-guts">
            <h1 class="modal-title">Agregar nuevo objetivo</h1>
            <div class="modal-content">
                <form class="modal-form">
                    <label for="objectiveDesc">
                        <input id="objectiveDesc" type="text" placeholder="Objetivo">
                        <select name="objectiveType" id="objectiveType">
                            <option disabled="disabled" selected value="0">Tipo</option>
                            <option value="Salud">Salud</option>
                            <option value="Arte">Arte</option>
                            <option value="Felicidad">Felicidad</option>
                            <option value="Amor y paz">Amor y paz</option>
                            <option value="Aprendizaje">Aprendizaje</option>
                        </select>
                    </label>
                    <label for="objectiveEnd">
                        <input type="date" name="objectiveEnd" id="objectiveEnd" value="<?php echo date("Y-m-d");?>">
                        <select name="objectiveStatus" id="objectiveStatus">
                            <option disabled="disabled" selected value="0">Estado</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="En proceso">En proceso</option>
                            <option value="Alcanzado">Alcanzado</option>
                        </select>
                    </label>
                    <label for="objectives">
                        Este objetivo para ser alcanzado ¿Depende de otro?
                        <select name="objectives" id="objectives">
                            <option disabled="disabled" selected value="0">Objetivo</option>
                            <?php 
                                $goal = new Goals();
                            ?>
                            <option value="0">¿Este objetivo para ser alcanzado depende de otro?</option>
                            <option value="0">¿Este objetivo para ser alcanzado depende de otro?</option>
                            <option value="0">¿Este objetivo para ser alcanzado depende de otro?</option>
                            <option value="0">¿Este objetivo para ser alcanzado depende de otro?</option>
                        </select>
                    </label>
                    <input class="form-btn" id="saveObjective" type="submit" value="Guardar">
                </form>
            </div>
        </div>
    </div>

    <script src="<?=URLSERVER.'/assets/scripts/userFunctions.js';?>"></script>
    <script src="<?=URLSERVER.'/assets/scripts/logout.js';?>"></script>
    <script src="<?=URLSERVER.'/assets/scripts/interactive.js';?>"></script>
    <script src="<?=URLSERVER.'/assets/scripts/app.js';?>"></script>
</body>
</html>