document.addEventListener("DOMContentLoaded", function(event) { 

    let route = window.location.pathname;
    let date = moment();

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

    
    route = route.split('/');
    console.log("Ruta: "+route[1]);
    
    switch (route[1].trim()) {
        case '':
            menuItem[0].classList.add('active');
        
            break;
        case 'projects':
            menuItem[1].classList.add('active');
        
            break;
        case 'habits':
            menuItem[2].classList.add('active');

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
                                    <input type="date" name="project-start-date" id="project-start-date" value="${date.format('Y-MM-DD')}">
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
                    </div>
        `;

        modalData.innerHTML = data;
    });
});

// create goals (modal add project)
function addGoal(i) {
    let inputGoal = document.getElementById("inputGoal");
    let goalsList = document.querySelector(".create-goals-list");
    if (inputGoal.value.trim().length > 0) {
        const input = document.createElement('input');
        let cant = document.getElementsByClassName("fast-goal");
        input.setAttribute("type", "text");
        input.setAttribute("class", "fast-goal");
        input.setAttribute("name", "fast-goal_" + (cant.length + 1));
        input.setAttribute("readonly", "true");
        input.setAttribute("value", "— " + inputGoal.value);
        goalsList.appendChild(input);
        inputGoal.value = "";
    }
}

// create project tags (modal add project)
function addTag(i) {
    let inputTag = document.getElementById("inputTag");
    let tagList = document.querySelector(".create-tags-list");
    if (inputTag.value.trim().length > 0) {
        const input = document.createElement('input');
        let cant = document.getElementsByClassName("fast-tag");
        input.setAttribute("type", "text");
        input.setAttribute("class", "fast-tag");
        input.setAttribute("name", "fast-tag_" + (cant.length + 1));
        input.setAttribute("readonly", "true");
        input.setAttribute("value", "— " + inputTag.value);
        tagList.appendChild(input);
        inputTag.value = "";
    }
}

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
