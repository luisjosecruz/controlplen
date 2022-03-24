// function to send ajax
const sendAjax = (url, data) => {
	let ajax = new XMLHttpRequest();
	ajax.open('POST', url);
	ajax.onload = () => {
		if(ajax.status == 200 && ajax.responseText != 'error'){
			handleAjax(ajax.responseText);
		}
		else{
			console.error('error de conexion-> estatus: ' + ajax.status + ', ready estatus: ' + ajax.readyState);
			console.log('error');
		}   
	}

	ajax.send(data);
}

// handle responses ajax
const handleAjax = (data) => {
	console.log(data); // return false;

	switch (data) {
		case 'login 200': 
			loast.show("Accediento a la plataforma ...", "success");
			setTimeout(() => window.location.href = "/", 1000);
			
			break;
		case 'login 404': loast.show("Usuario o contraseña incorrectos", "error");
			
			break;
		case 'login 500': loast.show("SESSION ERROR", "error"); 
			
			break;
		case 'ajax 404': loast.show("USER NOT FOUND", "error");
			
			break;
		case 'not method post': loast.show("METHOD POST ERROR", "error"); 
			
			break;
		case 'logout 200':
			loast.show("Cerrando sesión", "success");
			setTimeout(() => window.location.href = "/", 1000);
			
			break;
		case 'error login log' : loast.show("Login error register log", "error");

			break;
		case 'error logout log' : loast.show("Logout Error register log", "error");

			break;
		case 'signUp 200': 
			loast.show("Usuario registrado correctamente", "success");
			setTimeout(() => window.location.href = "/", 3000);
			
			break;
		case 'signUp 500': loast.show("Error sign up", "error");	

			break;
		case 'error format name': loast.show("Nombre incorrecto", "error");

			break;
		case 'error format lastname': loast.show("Apellido incorrecto", "error");

			break;
		case 'error format email': loast.show("Correo incorrecto", "error");

			break;
		case 'user exist': loast.show("El usuario ya tiene cuenta", "error");

			break;
		case 'value added': 
			loast.show('Valor agregado correctamente.', 'success');
			setTimeout(() => location.reload() , 500);

			break;
		case 'value error': loast.show('Error al agregar el valor.', 'error');

			break;
		case 'created-goal':
			setTimeout(() => {
				document.querySelector("#modal").classList.add("closed");
				document.querySelector("#modal-overlay").classList.add("closed");
				location.reload();
			}, 1000);
			
			break;
		case 'created-project':
			setTimeout(() => {
				document.querySelector("#modal").classList.add("closed");
				document.querySelector("#modal-overlay").classList.add("closed");
				location.reload();
			}, 1000);
			
			break;
		default: 
			loast.show(data, "error");
			console.log('Handle Ajax Switch Default');
	}
}

// validate global data
function validateData(data) {
	switch (data.get('ajax')) {
		case 'login':
			if (data.get('username').trim().length == 0 && data.get('password').trim().length == 0) {
				loast.show("Ingresar usuario y contraseña", "warning");
				return false;
			}
			if (data.get('username').trim().length == 0) {
				loast.show("Ingresa el usuario", "warning");
				return false;
			}
			if (data.get('password').trim().length == 0) {
				loast.show("Ingresa la contraseña", "warning");
				return false;
			}
			return true;
			
			break;
		case 'save-project':
			if (data.get('project-name').trim().length <= 0 || data.get('project-description').trim().length <= 0 || data.get('project-end-date').trim().length <= 0) {
				let modalMessage = document.getElementById("modalMessage");
				// modalMessage.textContent = "Existen datos requeridos sin completar.";
				loast.show("Existen datos requeridos sin completar", "warning");
			} else {
				return true;
			}
			
			break;
	}
}

// save a new projects
function saveProject(id) {

	let formCreateProject = document.getElementById(id);
    let formData = new FormData(formCreateProject);
	formData.append('ajax', 'save-project');

	if (validateData(formData)) {
		let modalMessage = document.getElementById("modalMessage");
		// modalMessage.textContent = "Guardando información ...";
		console.log("Guardando información ...");
		let cantags = document.getElementsByClassName("fast-tag");
		let cantgoals = document.getElementsByClassName("fast-goal");
		formData.append('cantags', cantags.length);
		formData.append('cantgoals', cantgoals.length);
		
		sendAjax('/src/ajax.php', formData);

		let btn = document.querySelector('.form-btn')
		btn.disabled = true;
	}
}

// show time in every page
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

// select item menu 
function selectMenu () {

	let route = window.location.pathname;
	let menuItem = document.getElementsByClassName('item-menu');

    for (let i = 0; i < menuItem.length; i++) {
        menuItem[i].classList.remove('active');
    }

    route = route.split('/');
    
    switch (route[1].trim()) {
        case '': menuItem[0].classList.add('active');
        
            break;
        case 'projects': menuItem[1].classList.add('active');
        
            break;
        case 'habits': menuItem[2].classList.add('active');

            break;
        default: console.log("Not Found Item Menu");
            break;
    }

}

// create a new modal
function openModal (data) {
	$('#elements').append(`
        <div class="modal-overlay closed" id="modal-overlay"></div>
        <div class="modal closed" id="modal">
            <button class="close-button" onclick="closeModal()">X</button>
            <div class="modal-guts" id="modal-data"></div>
        </div>
    `);

    let modal = document.getElementById("modal");
    let modalOverlay = document.getElementById("modal-overlay");
    let modalData = document.getElementById('modal-data');
    
	modalData.innerHTML = data;
	
    modal.classList.toggle("closed");
    modalOverlay.classList.toggle("closed");
}

// close any modal
function closeModal () {
	let modal = document.getElementById("modal");
    let modalOverlay = document.getElementById("modal-overlay");
	let modalData = document.getElementById('modal-data');

	modalData.innerHTML = "";

	modal.classList.toggle("closed");
    modalOverlay.classList.toggle("closed");
}

// edit goals 
function editGoal (goal) {
	
}

function addOneGoal (formData) {
	formData.append('ajax', 'save-goal');
	sendAjax('/src/ajax.php', formData);
}

// Function to print console logs with colors
const colorLog = 'color: white;';
const paddingLog = 'padding: 5px;';
function printLogs(type, styles){
    return function msg(str){
        console.log(`%c ${type}: ${str} `, colorLog + paddingLog + styles);
    }
}
// Closures
const error   = printLogs('Error', 'background: #FF2442;');
const warning = printLogs('Warning', 'background: #DF711B;');
const success = printLogs('Success', 'background: #00A400;');
const info    = printLogs('Info', 'background: #4B6587;');
const js      = printLogs('JS', 'background: #f7e018; color: black');

// config global
function config (arg){
    let dataConf = {
        'developer': 'Luis José Cruz Martínez',
        'url': window.location.origin
    }
    return dataConf[arg];
}