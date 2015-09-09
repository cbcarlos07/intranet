// JavaScript Document
$(function(){
$('#sideba').hide("fast");
	
	
	
$('form[name="card"]').submit(function(){
	var principal = $('textarea[name="principal"]').val();
	var acomp = $('textarea[name="acompanhamento"]').val();
	var salada = $('textarea[name="salada"]').val();
	var caldos = $('textarea[name="caldos"]').val();
	var sobremesa = $('textarea[name="sobremesa"]').val();
	var sucos = $('textarea[name="sucos"]').val();
	var outros = $('textarea[name="outros"]').val();
	
	if (principal == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo de prato principal</h4>');
	$('textarea[name="principal"]').css("border-color","red").focus();
	return false;
	}else if (acomp == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo de Acompanhamento</h4>');
	$('textarea[name="acompanhamento"]').css("border-color","red").focus();	
	return false;
	}else if (salada == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo de Salada</h4>');
	$('textarea[name="salada"]').css("border-color","red").focus();	
	return false;
	}else if (caldos == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo de Caldos</h4>');
	$('textarea[name="caldos"]').css("border-color","red").focus();	
	return false;
	}else if (sobremesa == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo de sobremesa</h4>');
	$('textarea[name="sobremesa"]').css("border-color","red").focus();	
	return false;
	}else if (sucos == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo de Sucos</h4>');
	$('textarea[name="sucos"]').css("border-color","red").focus();	
	return false;
	}else if (outros == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo de Outros</h4>');
	$('textarea[name="outros"]').css("border-color","red").focus();	
	return false;
	}
	
	
	});
	
});