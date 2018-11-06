function despIns() {
	document.getElementById("alt-ins").style.height = "230px";
}
window.addEventListener('mouseup',function(event){
	var ins = document.getElementById('alt-ins');

	if (event.target != ins && event.target.parentNode != ins ) {ins.style.height = "0";}
});

