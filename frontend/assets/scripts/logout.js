window.onload = function() {
    
	let logout = document.getElementById("logout");

	logout.addEventListener('click', () => {
		console.log('Cerrando sesión');
		let formData = new FormData();
		formData.append('ajax', 'logout');
		sendAjax('/src/ajax.php', formData);
	});
	
}

