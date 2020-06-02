function cerrarLightbox(target){
	if(target == ''){
		$('.lightbox').fadeOut();
	}else{
		$(target).fadeOut();
	}

	$('body').css({
		overflow: 'auto'
	});
}

function abrirLightbox(target){
	if(target == ''){
		$('.lightbox').fadeIn();
	}else{
		$(target).fadeIn();
	}

	if(target == '#cotizacion'){
		$('#cotizador_form')[0].reset();
		$('#formulario1 .animada.fid').addClass('animated fadeInDown');
		setTimeout(function(){
			separador('#formulario1 .animada.fid');
		}, 800);
	}

	$('body').css({
		overflow: 'hidden'
	});
}

$(document).ready(function(){

	// Formulario de contacto por defecto
	$('#contacto').submit(function(event){
		event.preventDefault();
		var formData = $(this).serialize();
		jQuery.ajax({
			type: 'GET',
			url: ajax,
			data: {'action': 'contacto','form': formData},
			beforeSend: function(){
			},
			success: function(data){
				var result = $.parseJSON(data);
				if(result.alerta == "Success"){
					$('#contacto')[0].reset();
					$('#contactoResp .alert').fadeIn();
				}
			},
			error: function() {
			}
		});
	});

	// Loader
	setTimeout(function(){
		$('#loading').fadeOut();
		$('body').css('overflow', 'auto');
	}, 500);

	// ToTop
	$('#toTop').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 1000);
		return false;
	});

	// Nav toggle responsive
	$('.navToggle').click(function(){
		$("header nav").slideToggle();
		return false;
	});

	// Tabs
	$('.tab-select > a').click(function(event){
		event.preventDefault();
		var target = $(this).attr('href');
		if(target != '#'){
			$('.tab-select').removeClass('active');
			$(this).parent().addClass('active');
			$('#tabs > *').hide();
			$('#tabs > *').removeClass('active');
			$('#tabs '+target).fadeIn();
		}
	});

	// Animaciones
	$('.animada.fade').viewportChecker({
		classToAdd: 'animated fade',
		offset: 200,
		callbackFunction: function(elem){
			setTimeout(function(){
				separador(elem);
			}, 800);
		}
	});

	$('.animada.ffl').viewportChecker({
		classToAdd: 'animated fadeFromLeft',
		offset: 200,
		callbackFunction: function(elem){
			setTimeout(function(){
				separador(elem);
			}, 800);
		}
	});

	$('.animada.ffr').viewportChecker({
		classToAdd: 'animated fadeFromRight',
		offset: 200,
		callbackFunction: function(elem){
			setTimeout(function(){
				separador(elem);
			}, 800);
		}
	});

	$('.animada.fid').viewportChecker({
		classToAdd: 'animated fadeInDown',
		offset: 200,
		callbackFunction: function(elem){
			setTimeout(function(){
				separador(elem);
			}, 800);
		}
	});

	$('.childrenFaded').viewportChecker({
		classToAdd: 'active',
		callbackFunction: function(elem){
			$('> *', elem).each(function(i){
				$(this).fadeTo(0,0).delay(500*i).fadeTo(500,1);
			});
		}
	});
});

// Link to
$(function() {
	$('.linkTo[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: target.offset().top
				}, 1000);
				$(this).parent().addClass('selected').siblings().removeClass('selected');
				return false;
			}
		}
	});
});

$(window).scroll(function(){
	if ($(this).scrollTop() > scrollHeight) {
		$('#toTop').fadeIn();
	}else{
		$('#toTop').fadeOut();
	}
});