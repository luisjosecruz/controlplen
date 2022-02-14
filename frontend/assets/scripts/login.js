window.onload = function() {

	let loginForm = document.getElementById("loginForm");

	loginForm.addEventListener('submit', (e) => {
		e.preventDefault();

		let formData = new FormData(e.target);
		formData.append("ajax", "login");
		// for (var value of formData.values()) { console.log(value); }

		if (validateData(formData)) {
			sendAjax('/src/ajax.php', formData);
		}
	});
}




