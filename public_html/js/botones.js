document.addEventListener("DOMContentLoaded", function(){
	var estado=localStorage.getItem("oscuro");
		if (estado== "true"){
			document.getElementById('page').classList.add('dark-mode');
  document.getElementById('id-sun').classList.remove('activebtn');
  document.getElementById('id-moon').classList.add('activebtn');
		}
	});
	/*Si clicamos en el botón del sol, borrarémos la clase css dark-mode del div 
con id page y se aplicará el estilo active al sol*/
document.getElementById('id-sun').onclick = function(){
  document.getElementById('page').classList.remove('dark-mode');
  document.getElementById('id-moon').classList.remove('activebtn');
  this.classList.add('activebtn');
	var oscuro= false;
	localStorage.setItem("oscuro", oscuro);
}
/*Si clicamos en el botón de la luna, añadiremos la clase css dark-mode del div 
con id page y se aplicará el estilo active a la luna*/
document.getElementById('id-moon').onclick = function(){
	var oscuro= true;
  document.getElementById('page').classList.add('dark-mode');
  document.getElementById('id-sun').classList.remove('activebtn');
  this.classList.add('activebtn');
	localStorage.setItem("oscuro", oscuro);
}
	/*Si clicamos en el botón del sol, borrarémos la clase css dark-mode del div 
con id page y se aplicará el estilo active al sol*/
document.getElementById('id-sun-responsive').onclick = function(){
  document.getElementById('page').classList.remove('dark-mode');
  document.getElementById('id-moon-responsive').classList.remove('activebtn');
  this.classList.add('activebtn');
	var oscuro= false;
	localStorage.setItem("oscuro", oscuro);
}
/*Si clicamos en el botón de la luna, añadiremos la clase css dark-mode del div 
con id page y se aplicará el estilo active a la luna*/
document.getElementById('id-moon-responsive').onclick = function(){
	var oscuro= true;
  document.getElementById('page').classList.add('dark-mode');
  document.getElementById('id-sun-responsive').classList.remove('activebtn');
  this.classList.add('activebtn');
	localStorage.setItem("oscuro", oscuro);
}