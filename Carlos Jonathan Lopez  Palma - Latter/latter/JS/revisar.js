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
    if (form.nombres.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa el Nombre.</div>';
        form.nombres.focus();
        return false;
    }else
    if (form.app.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa primer apellido.</div>';
        form.app.focus();
        return false;
    }
    if (form.apm.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa segundo apellido.</div>';
        form.apm.focus();
        return false;
    }
    if (form.fechana.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa fecha de nacimineto.</div>';
        form.fechana.focus();
        return false;
    }
    if (form.sexo.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Selecciona sexo.</div>';
        form.sexo.focus();
        return false;
    }
    if (form.curp.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa un CURP.</div>';
        form.curp.focus();
        return false;
    }
    if (form.rfc.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa RFC.</div>';
        form.rfc.focus();
        return false;
    }
    if (!expr.test(correo)){    
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa un correo valido.</div>';
        form.email.focus();
        return false;
    }
    if (form.email.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa un correo.</div>';
        form.email.focus();
        return false;
    }
    if (form.direc.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa una dirección.</div>';
        form.direc.focus();
        return false;
    }
    if (form.tel.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa un telefono.</div>';
        form.tel.focus();
        return false;
    }
    if (form.nseg.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa un numero de Seguro.</div>';
        form.nseg.focus();
        return false;
    }
    if (form.puesto.value === "") {
        document.getElementById("alerta2").innerHTML='<div class="alert alert-warning">Selecciona un puesto.</div>';
        form.puesto.focus();
        return false;
    }
    if (form.horae.value === "") {
        document.getElementById("alerta2").innerHTML='<div class="alert alert-warning">Ingresa una hora de entrada.</div>';
        form.horae.focus();
        return false;
    }
    if (form.horas.value === "") {
        document.getElementById("alerta2").innerHTML='<div class="alert alert-warning">Ingresa una hora de salida.</div>';
        form.horas.focus();
        return false;
    }
    if (form.diadesc.value === "") {
        document.getElementById("alerta2").innerHTML='<div class="alert alert-warning">Selecciona un dia de descanso.</div>';
        form.diadesc.focus();
        return false;
    }
    var nombres = document.getElementById('nombres').value;
    var app = document.getElementById('app').value;
    var apm = document.getElementById('apm').value;
    var fechana = document.getElementById('fechana').value;
    var sexo = document.getElementById('sexo').value;
    var curp = document.getElementById('curp').value;
    var rfc = document.getElementById('rfc').value;
    var direc = document.getElementById('direc').value;
    var tel = document.getElementById('tel').value;
    var email = document.getElementById('email').value;
    var nseg = document.getElementById('nseg').value;

    var puesto = document.getElementById('puesto').value;
    var horae = document.getElementById('horae').value;
    var horas = document.getElementById('horas').value;
    var diadesc = document.getElementById('diadesc').value;

    var dataen = 'nombres='+nombres+'&app='+app+'&apm='+apm+'&fechana='+fechana+'&sexo='+sexo+'&curp='+curp+'&rfc='+rfc+'&direc='+direc+'&tel='+tel+'&email='+email+'&nseg='+nseg+'&puesto='+puesto+'&horae='+horae+'&horas='+horas+'& diadesc='+diadesc;
    $.ajax({
        type:'post',
        url:'RegistraPersona.php',
        data:dataen,
        success:function(resp){
            alert(resp);
            if(resp==="false"){
                document.getElementById("alerta").innerHTML='<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Persona ya registrada</div>';  
            }else if(resp==="crepetido"){
                document.getElementById("alerta").innerHTML='<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Correo repetido</div>';  
            }else{
                document.getElementById("alerta").innerHTML='<div class="alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a>Registro correcto</div>';  
            }
        }
    });
    
    return false;
}

function entrada() {
    var user = document.getElementById('user').value;
    var dataen = 'user='+user;
    $.ajax({
        type:'post',
        url:'PHP/RegistraEentrada.php',
        data:dataen,
        success:function(resp){
            var la = resp.length;
            var st = resp.slice(0, la-1);
            if(st==="entrada"){
                document.getElementById("alerta").innerHTML='<div class="alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a>Entrada registrada</div>';  
            }else if(st==="salida"){
                document.getElementById("alerta").innerHTML='<div class="alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a>Salida registrada</div>';  
            }else if(st==="terminada"){
                document.getElementById("alerta").innerHTML='<div class="alert alert-warning"><a href="" class="close" data-dismiss="alert">&times;</a>Jornada terminada</div>';  
            }else if(st==="false"){
                document.getElementById("alerta").innerHTML='<div class="alert alert-warning"><a href="" class="close" data-dismiss="alert">&times;</a>ID incorrecto</div>';  
            }
        }
    });
    return false;
}

function validarli(){
    var correo = document.getElementById("email").value;
    var form = document.form1;
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (form.nombres.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa el Nombre.</div>';
        form.nombres.focus();
        return false;
    }
    
    if (!expr.test(correo)){    
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa un correo valido.</div>';
        form.email.focus();
        return false;
    }
    if (form.email.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa un correo.</div>';
        form.email.focus();
        return false;
    }
    if (form.tel.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa un telefono.</div>';
        form.tel.focus();
        return false;
    }
    if (form.hora1.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa una hora de entrada.</div>';
        form.horae.focus();
        return false;
    }
    if (form.hora2.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Ingresa una hora de salida.</div>';
        form.horas.focus();
        return false;
    }
    if (form.puesto.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Selecciona un puesto.</div>';
        form.puesto.focus();
        return false;
    }
    if (form.dia.value === "") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Selecciona un dia de descanso.</div>';
        form.diadesc.focus();
        return false;
    }
    var id = document.getElementById('id').value;
    var tel = document.getElementById('tel').value;
    var email = document.getElementById('email').value;
    var puesto = document.getElementById('puesto').value;
    var horae = document.getElementById('hora1').value;
    var horas = document.getElementById('hora2').value;
    var diadesc = document.getElementById('dia').value;

    var dataen = 'id='+id+'&tel='+tel+'&email='+email+'&puesto='+puesto+'&horae='+horae+'&horas='+horas+'&diadesc='+diadesc;
    
    $.ajax({
        type:'post',
        url:'ActualizaInfo.php',
        data:dataen,
        success:function(resp){
            if(resp==="actualizacion"){
                document.getElementById("alerta").innerHTML='<div class="alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a>Actualización correcta.</div>';
            }
        }
        
    });
    
    return false;
}

function iguales(){
    var form = document.form1;
    var cont = document.getElementById('conta').value;
    var dataen = 'cont='+cont;
    var flag=true;
    $.ajax({
        type:'post',
        url:'BuscaContra.php',
        data:dataen,
        success:function(resp){
            if(resp!="correcta"){
                document.getElementById("alerta").innerHTML='<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Contraseña incorrecta.</div>';
                flag=false;
            }
        }
        
    });
    if(flag===true){
        if(form.nco.value===""){
            document.getElementById("alerta").innerHTML='<div class="alert alert-warning">La contraseña no puede estar vacia.</div>';
            form.nco.focus();
        }else
        if (form.nco.value!=form.rco.value){    
            document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Nueva contraseña no coinside.</div>';
            form.rco.focus();
        }else
        if (form.nco.value === form.conta.value) {
            document.getElementById("alerta").innerHTML='<div class="alert alert-warning">La contraseña no debe ser igual a las anteriores.</div>';
            form.nco.focus();
        }else{
            cont = document.getElementById('nco').value;
            dataen = 'cont='+cont;
            $.ajax({
                type:'post',
                url:'ActualizaContr.php',
                data:dataen,
                success:function(resp){
                    if(resp=="correcta"){
                        document.getElementById("alerta").innerHTML='<div class="alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a>Contraseña actualizada.</div>';
                    }
                }
            });
            
        }

    }

    return false;
}

function revcote(){
    var form = document.form1;
    if(form.email.value===""){
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning">Llene todos los campos.</div>';
        form.email.focus();
        return false;
    }else{
        getRequest(
            'ActCoTe.php'
        );

    }
    return false;
}

function encore(){
    var email = document.getElementById('email').value;
    var dataen = 'email='+email;
    $.ajax({
        type:'post',
        url:'RecuperaPassEnCo.php',
        data:dataen,
        success:function(resp){
            alert(resp);
            if(resp==="si"){
                alert("Correo Enviado");
            }
            
        }
    });
    return false;
}
function rerep() {
    var form = document.form1;
    if (form.emp.value === " ") {
        document.getElementById("alerta").innerHTML='<div class="alert alert-warning"><a href="" class="close" data-dismiss="alert">&times;</a>Selecciona un enpleado.</div>'; 
        form.emp.focus();
        return false;
    }
    emp = document.getElementById('emp').value;
    causa = document.getElementById('causa').value;
    dataen = 'emp='+emp+'&causa='+causa;
    $.ajax({
        type:'post',
        url:'RegistraRep.php',
        data:dataen,
        success:function(resp){
            if(resp=="si"){
                document.getElementById("alerta2").innerHTML='<div class="alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a>Reporte registrado.</div>'; 
            }else location.href="Reportesphp.php";
        }
        
    });
    
    return false;
}