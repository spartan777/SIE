function despSalir() {//despliega un elemento oculto aumentando su altura en 60 pixeles.
	document.getElementById("op-salir").style.height = "60px";
}
window.addEventListener('mouseup',function(event){
	var salir = document.getElementById('op-salir');

	if (event.target != salir && event.target.parentNode != salir ) {salir.style.height = "0";}
});
function oculSalir() {
    document.getElementById("op-salir").style.height = "0px";
}


