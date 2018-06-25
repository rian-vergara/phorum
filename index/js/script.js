
function verifica() {

var title = document.getElementById("titulo").value;

if (title.length < 5) {
	alert('O título deve conter pelo menos 4 caracteres!');
	title.focus();
	return false;
	}
}


