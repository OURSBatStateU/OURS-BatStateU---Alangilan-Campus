const reload=()=>window.location.reload();

function dispform() {
	document.getElementById("login-container").style.display = "block";
}

window.onclick = function(event) {	
	if (event.target == document.getElementById("login-container")) {
		document.getElementById("login-container").style.display = "none";
		
		window.location.reload();
	}
}