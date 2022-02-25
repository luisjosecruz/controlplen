document.addEventListener("DOMContentLoaded", function(event) { 

    let route = window.location.pathname;

    // seleccion del menu principal
    let menuItem = document.getElementsByClassName('item-menu');

    // for (let index = 0; index < menuItem.length; index++) {
    //     menuItem[index].addEventListener('click', () => {
    //         for (let j = 0; j < menuItem.length; j++) {
    //             menuItem[j].classList.remove('active');
    //         }
    //         menuItem[index].classList.add('active');
    //     });   
    // }
    
    for (let i = 0; i < menuItem.length; i++) {
        menuItem[i].classList.remove('active');
    }

    switch (route) {
        case '/':
            menuItem[0].classList.add('active');
        
            break;
        case '/habits':
            menuItem[1].classList.add('active');

            break;
        default:
            break;
    }

    // modal
    let modal = document.querySelector("#modal");
    let modalOverlay = document.querySelector("#modal-overlay");
    let closeButton = document.querySelector("#close-button");
    let openButton = document.querySelector(".open-button");

    closeButton.addEventListener("click", function() {
        modal.classList.toggle("closed");
        modalOverlay.classList.toggle("closed");
    });

    openButton.addEventListener("click", function() {
        modal.classList.toggle("closed");
        modalOverlay.classList.toggle("closed");
    });

    // create project
    let createProject = document.getElementById("createProject");
    let modalData = document.getElementById('modal-data');

    createProject.addEventListener("click", () => {
        let data = `
                    <div class="modal-header">
                        <p class="modal-title">Crear nuevo proyecto</p>
                    </div>
                    <div class="modal-content">
                        <form id="formCreateProject" class="modal-form">
                            <div class="form-left">
                                <div class="form-group">
                                    <label for="project-name">Nombre:</label>
                                    <input class="input-project" id="project-name" type="text" placeholder="Proyecto" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <textarea name="project-description" id="project-description" cols="10" rows="2" placeholder="Descripción del proyecto"></textarea>
                                </div>
                                <div class="form-group select-tags">
                                    <label for="inputGoal">Metas</label>
                                    <div class="create-goals">
                                        <input class="input-goal" id="inputGoal" type="text" placeholder="Crear metas" autocomplete="off">
                                        <a id="createGoal" class="add-goal">+</a>
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
                                    <label class="attributes" for="project-status">Estado</label>
                                    <select name="project-status" id="project-status">
                                        <option disabled="disabled" selected value="0">Estado</option>
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="En progreso">Inactivo</option>
                                        <option value="Completado">Completado</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="attributes" for="project-start-date">Inicio</label>
                                    <input type="date" name="project-start-date" id="project-start-date" value="<?php echo date("Y-m-d");?>">
                                </div>
                                <div class="form-group">
                                    <label class="attributes" for="project-end-date">Fin</label>
                                    <input type="date" name="project-end-date" id="project-end-date" >
                                </div>
                                <div class="form-group select-tags">
                                    <label class="attributes" for="project-tags">Etiquetas</label>
                                    <div class="create-goals">
                                        <input class="input-goal" id="inputTag" type="text" placeholder="Agregar etiquetas" autocomplete="off">
                                        <a id="createTag" class="add-goal">+</a>
                                    </div>
                                    <div class="create-goals">
                                        <div class="create-tags-list"></div>
                                    </div>
                                </div>
                                <input class="form-btn" id="saveObjective" type="submit" value="Guardar">
                            </div>
                        </form>
                    </div>
        `;

        modalData.innerHTML = data;
    });

    // create goals (modal add project)
    let addGoal = document.getElementById("createGoal");
    let inputGoal = document.getElementById("inputGoal");
    let goalsList = document.querySelector(".create-goals-list");
    
    addGoal.addEventListener("click", () => {
        const input = document.createElement('input');
        input.setAttribute("type", "text");
        input.setAttribute("readonly", "true");
        input.setAttribute("value", "— " + inputGoal.value);
        goalsList.appendChild(input);
        inputGoal.value = "";
    });

    // create project tags (modal add project)
    let addTag = document.getElementById("createTag");
    let inputTag = document.getElementById("inputTag");
    let tagList = document.querySelector(".create-tags-list");
    
    addTag.addEventListener("click", () => {
        const input = document.createElement('input');
        input.setAttribute("type", "text");
        input.setAttribute("readonly", "true");
        input.setAttribute("value", "— " + inputTag.value);
        tagList.appendChild(input);
        inputTag.value = "";
    });

});

function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("clock").innerText = time;
    document.getElementById("clock").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();
