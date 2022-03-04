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
