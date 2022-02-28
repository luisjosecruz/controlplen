// save a new projects
function saveProject() {

	let formCreateProject = document.getElementById("formCreateProject");
    let formData = new FormData(formCreateProject);
	formData.append('ajax', 'save-project');
	
    let projectName = document.getElementById("project-name").value;
    let projectDescription = document.getElementById("project-description").value;
    let projectEndDate = document.getElementById("project-end-date").value;

	if (validateData(formData)) {
		let modalMessage = document.getElementById("modalMessage");
		modalMessage.textContent = "Guardando información ...";
		let cantags = document.getElementsByClassName("fast-tag");
		let cantgoals = document.getElementsByClassName("fast-goal");
		formData.append('cantags', cantags.length);
		formData.append('cantgoals', cantgoals.length);
		sendAjax('/src/ajax.php', formData);
	}
}
