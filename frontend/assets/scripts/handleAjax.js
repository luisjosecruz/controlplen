const handleAjax = (data) => {
	console.log(data);
	return false;
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


