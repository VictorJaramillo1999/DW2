
	/*----------------submenu--------------------*/
	$('.menu li:has(ul)').click(function(e){
		e.preventDefault();
		if ($(this).hasClass('activado')){
			$(this).removeClass('activado');
			$(this).children('ul').slideUp();
		} else {
			$('.menu li ul').slideUp();
			$('.menu li').removeClass('activado');
			$(this).addClass('activado');
			$(this).children('ul').slideDown();
		}
		
	});	
	$('.menu li ul li a').click(function(){
		window.location.href = $(this).attr("href");
	});
	/*----------------menu--------------------*/
	$('.cabecera i').on('click',function () {
		$('.cuerpo').toggleClass('abrirs');
		if ($('.cabecera i').hasClass('fa-bars')){
			$('.cabecera i').removeClass('fa-bars');
			$(this).addClass('fa-arrow-left');
		}else{
			$('.cabecera i').removeClass('fa-arrow-left');
			$(this).addClass('fa-bars');
		}
	});

	$('.content').click(function() {
		if ($('.cuerpo').hasClass('abrirs')){
			$('.cuerpo').toggleClass('abrirs');
			$('.cabecera i').removeClass('fa-arrow-left');
			$('.cabecera i').addClass('fa-bars');
		}
	});

	$('.tabla tbody').on('click','.btn',function(){
		
		var row = $(this).closest('tr');
		var id = row.find('td:eq(0)').text();
		var desc = row.find('td:eq(2)').text();
		var fe = row.find('td:eq(3)').text();
		var dataen = 'id='+id+'&desc='+desc+'&fecha='+fe;
		$.ajax({
			type:'post',
			url:'EliminaReporte.php',
			data:dataen,
			success:function(resp){
				alert(resp);
				if(resp==="true"){
					document.getElementById("alerta").innerHTML='<div class="alert alert-success"><a href="" class="close" data-dismiss="alert">&times;</a>Entrada registrada</div>';  
				}
			}
		});
		return false;
	})

	function remove(t){
		var td = t.parentNode;
        var tr = td.parentNode;
		var table = tr.parentNode;
        table.removeChild(tr);
	}

	
	

