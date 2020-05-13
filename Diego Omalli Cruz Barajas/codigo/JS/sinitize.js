


function agregardatos(){
 var data= $("#formapacientes").serialize();
 console.log(data);
  var request = $.ajax({
     type:"POST",
     data:data,
     url:"entidades/paciente.php",
     
  });
  request.done(function(response) {
    if(response == ''){
      
      swal('Error al registrar');
    }else{
      console.log(response);
      swal('Registro Exitoso');
      window.locationf="codigo/tabla_pacientes.php";
    }
});

request.fail(function(jqXHR, textStatus) {
    alert("Hubo un error: " + textStatus);
});
}
// Sanitiza los input ->Solo permite caracteres
$(function(){

    $('.validcontrol').keypress(function(e) {
      if(isNaN(this.value + String.fromCharCode(e.charCode))) 
       return false;
    })
    .on("cut copy paste",function(e){
      e.preventDefault();
    });
  
  });
 