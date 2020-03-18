function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
	
}

function soloNumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = "8-37-39-46-13";

    tecla_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function validar(){
    var correo = document.getElementById("email").value;
    var form = document.form1;
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    if (form.nombre.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa el nombre.</div>';
        form.nombre.focus();
        return false;
    }
    if (form.direc.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa el domicilio.</div>';
        form.domi.focus();
        return false;
    }
    if (form.sexo.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Selecciona sexo.</div>';
        form.appa.focus();
        return false;
    }
    if (form.edad.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa una edad.</div>';
        form.apma.focus();
        return false;
    }
    if (form.tel.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa telefono.</div>';
        form.tel.focus();
        return false;
    }
    if (!expr.test(correo)){    
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa un correo valido.</div>';
        form.email.focus();
        return false;
    }
    if (form.tra.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Seleccione un tratamiento.</div>';
        form.tra.focus();
        return false;
    }
    if (form.fec.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa una fecha.</div>';
        form.fec.focus();
        return false;
    }
    if (form.hora.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa una hora.</div>';
        form.hora.focus();
        return false;
    }
    alert("Cita Agendada");
    //document.getElementById("alerta").innerHTML='<div class="alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a>Cita agendada</div>';
        
    }

function entrada() {
    var form = document.form1;
    if ( form.user.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Usuario incorrecto.</div>';
        form.fec.focus();
        return false;
    }
    ocument.getElementById("alerta").innerHTML='<div class="alert alert-success">Entrada registrada.</div>';
}
    //<div class="alert alert-warning alert-dismissable">Ingresa un correo valido.</div>