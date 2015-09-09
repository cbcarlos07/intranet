// JavaScript Document

$(function(){
	$('.error').css("display","none");
	var nome = $('input[name="nome"]').val();
	var email = $('input[name="email"]').val();
	var end = $('input[name=end]').val();
	
	$('.btn').click(function(){
	if (nome == ''){
	$('.error').fadeIn("fast").text("preencha o campo nome"+[name=nome]);
	$('input[name=nome]').css("border-color","red").focus();
	return false;	
}
	
	else if (email == '')
	$('.error').fadeIn("fast").text("preencha o campo email");
	
	});
	
});