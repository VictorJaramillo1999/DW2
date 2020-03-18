semana=["Lunes","Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
mes=["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];
function startTime(){
	today=new Date();
	h=today.getHours();
	m=today.getMinutes();
	s=today.getSeconds();
	did=today.getDay();
	din=today.getDate();
	me=today.getMonth();
	a=today.getFullYear();
	m=checkTime(m);
	s=checkTime(s);
	momento="Hora: "+h+":"+m+":"+s;
	fecha=semana[did-1]+", "+din+" de "+ mes[me]+" de "+a;
	document.getElementById("reloj").innerHTML= fecha+"<br/>"+momento;
	t=setTimeout('startTime()',500);
}
function checkTime(i){
    if (i<10) {
		i='0' + i;
	}return i;
}

window.onload=function(){startTime();}