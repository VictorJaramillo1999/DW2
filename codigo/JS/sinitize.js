
function mostar(enlace,tabla){
    var request = $.ajax({
      
      url:enlace,
      
  });
  request.done(function(response) {
    console.log(response);
    $(tabla).html(response);
});
request.fail(function(jqXHR, textStatus) {
  alert("Hubo un error: " + textStatus);
});
}

function agregardatos(datos){
 var data= $(datos[1]).serialize();
 console.log(data);
  var request = $.ajax({
     type:"POST",
     data:data,
     url:datos[0],
     
  });
  request.done(function(response) {
    if(response == ''){
      
      swal('Error al registrar');
    }else{
      $(datos[1])[0].reset();
      console.log(response);
      mostar(datos[2],datos[3]);
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
 