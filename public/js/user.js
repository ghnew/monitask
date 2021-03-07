

var projectInput = document.getElementById("projectInput");

projectInput.addEventListener('change', function() {
	const urlParams = new URLSearchParams(window.location.search);
	urlParams.set('pid', projectInput.value);
	window.location.search = urlParams;
});