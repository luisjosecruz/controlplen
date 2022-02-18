const handleAjax = (data) => {
	// console.log(data);
	// return false;
	switch (data) {
		case 'login 200': 
			window.location.href = "/";
			break;
			
		case 'login 404':
			alert('Usuario o contraseña incorrectos');
			break;

		case 'login 500':
			console.error('SESSION ERROR');
			break;

		case 'ajax 404':
			console.error('AJAX POST ERROR');
			break;

		case 'not method post':
			console.error('METHOD POST ERROR');
			break;
		
		case 'logout 200':
			alert('Cerrando la sesión...');
			window.location.href = "/";
			break;

		default: 
			console.log('Handle Ajax Switch Default');
	}
}

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

const validateData = (data) => {
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
	
		default:
			break;
	}
}

