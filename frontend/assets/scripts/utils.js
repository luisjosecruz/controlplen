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

// validate user data
function validateData(data) {
	switch (data.get('ajax')) {
		case 'login':
			if (data.get('username').trim().length == 0 && data.get('password').trim().length == 0) {
				alert('Ingresa usuario y contraseña');
				return false;
			}
			if (data.get('username').trim().length == 0) {
				alert('Ingresa el usuario');
				return false;
			}
			if (data.get('password').trim().length == 0) {
				alert('Ingresa la contraseña');
				return false;
			}
			return true;
			
			break;
		case 'save-project':
			if (data.get('project-name').trim().length <= 0 || data.get('project-description').trim().length <= 0 || data.get('project-end-date').trim().length <= 0) {
				let modalMessage = document.getElementById("modalMessage");
				modalMessage.textContent = "Existen datos requeridos sin completar.";
			} else {
				return true;
			}
			
			break;
	}
}