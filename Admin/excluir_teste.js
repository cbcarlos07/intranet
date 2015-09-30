// JavaScript Document
//$('.ver').attr("type","submit");

$(function(){
	
	urlpost = "excluir_teste_action.php";
	
$('form').submit(function(){
	
	alert ('submit da form geral');
	return false;
	});
	
	function carregando (){
		alert('ta indo');
		}
		
		function erro (){
		alert('deu pau');
		}
	
	$.ajaxSetup({
		type:   'POST',
		url:    urlpost,
		beforeSend: carregando,
		error: erro
		
		});
	
	$('.droga').submit(function(){
		alert ('submit do teste');
		$.ajax({
			data: $(this).serialize(),
			success: function(dados){
			alert (dados+"dados");
			}
			
			
			});
		
		});
		
});