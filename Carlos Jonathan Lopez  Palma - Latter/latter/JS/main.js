
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

	function remove(t){
        var td = t.parentNode;
        var tr = td.parentNode;
        var table = tr.parentNode;
        table.removeChild(tr);
    }

