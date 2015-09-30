// JavaScript Document
$(function(){
	var acesso = $('.acesso').val();
	if (acesso == '1'){
		$('.painel2').hide(1);
		$('.painel3').hide(1);
	}else if (acesso == '2'){
		$('.painel1').hide(1);
		$('.painel2').hide(1);
	}else if (acesso == '3'){
		$('.painel1').hide(1);
		$('.painel3').hide(1);
	}
	$('.data').hide("fast");
	
	//-------------mensagens de alertas------------//
	$('.alert_warning').hide("fast");
	$('.alert_error').hide("fast");
	$('.alert_success').hide("fast");
	//----------fim mensagens de alertas------------//
	

var urlpost = 'php/action_usuarios.php'; 
var forms = $('form');
var botao = $('.j_button');
var mensagem = $('.mensagem');
	//botao.attr("type","submit");
	
	function carregando(){
		mensagem.empty().html('<h4 class="alert_warning"><img src="images/load.gif" alt="Carregando..."> Aguarde, enviando requisição!</h4>').fadeIn("fast");
	}
	
	function errosend(){
		mensagem.empty().html('<h4 class="alert_error"><strong>Erro inesperado,</strong> Favor contate o DTI!</h4>').fadeIn("fast");
	}
	
	function sucesso(){
		mensagem.empty().html('<h4 class="alert_success">Cadastro Realizado com Sucesso</h4>').fadeIn("fast");
	}
	
	
	function trocar(resposta){
		alert(resposta);
		
	}
	
	function trocar(){
		
		
	}
	
	
	
	forms.submit(function(){
	return false;
		
	
	});
	
	$.ajaxSetup({
			url:	urlpost,
			type:	'POST',
			beforeSend: carregando,
			error: 		errosend
		});
	
	var cadastro_usuarios = $('form[name="usuarios"]');
	
	cadastro_usuarios.submit(function(){
		
	//-----------------validacao--------------//	
	var nome = $('input[name="usuarioNome"]').val();
	var usuario = $('input[name="usuarioUser"]').val();
	var setor = $('select[name="usuarioSetor"]').val();
	var restricao = $('select[name="usuarioRestricao"]').val();
	var senha = $('input[name="usuarioSenha"]').val();
	var confSenha = $('input[name="usuarioConfsenha"]').val();
	var duplo = $('input[name="duplo"]').val();
	
	if (nome == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo Nome</h4>');
	$('input[name="usuarioNome"]').css("border-color","red").focus();
		
	return false;
	}else if (usuario == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo Usuário</h4>');
	$('input[name="usuarioUser"]').css("border-color","red").focus().focusout(function(){
		$(this).css("border-color","#CCC");
		});	
	return false;
	}else if (setor == 'Selecione'){
	$('.mensagem').empty().html('<h4 class="alert_error">Selecione o campo Setor</h4>');
	$('select[name="usuarioSetor"]').css("border-color","red").focus();	
	return false;
	}else if (restricao == 'Selecione'){
	$('.mensagem').empty().html('<h4 class="alert_error">Selecione o campo Nivel de Restrição</h4>');
	$('select[name="usuarioRestricao"]').css("border-color","red").focus();	
	return false;
	}else if (senha == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo senha</h4>');
	$('input[name="usuarioSenha"]').css("border-color","red").focus();	
	return false;
	}else if (confSenha == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo Confirmar Senha</h4>');
	$('input[name="usuarioConfsenha"]').css("border-color","red").focus();	
	return false;
	}else if (senha != confSenha){
	$('.mensagem').empty().html('<h4 class="alert_error">Dados da senha não conferem</h4>');	
	$('input[name="usuarioSenha"]').css("border-color","red");
	$('input[name="usuarioConfsenha"]').css("border-color","red");
	return false;
	}else if (duplo == '1'){
		$('.mensagem').empty().html('<h4 class="alert_error">Usuário já existente</h4>');
		return false;
	}
	
	//---------------fim validacao---------------//
	
		var dados = $(this).serialize();
		var acao = "&acao=cadastro";
		var sender	= dados+acao;

		
		$.ajax({
			data:	sender,
			success: function(dados){
				if (dados == 1){
					$('.mensagem').empty().html('<h4 class="alert_error">Usuário já existente</h4>');
				}else{
				sucesso();
				}//location.href="http://localhost/intranet/Admin/nutricao.php";
			/*if(resposta == 1){
					sucesso();
				}else if(resposta == '2'){
					errosend();
				}else{
					errdados('<strong>Erro ao cadastrar:</strong> Existem campos em branco!');
					
				}*/	
			},
			complete: function(){	
				//sucesso();
				cadastro_usuarios.find("input:text,input:password,option").val('');
				//location.href="http://localhost/intranet/Admin/nutricao.php";
			}
		});
});		
	
	

//-----------------delete-------------------------//

/*function confirmacao (){
	confirm ('Você tem certeza que desejas excluir o usuario');
	}*/

$('input[name=excluir]').click(function(){
	var del = $(this).attr("id");
	deletar = "acao=deletar&delete="+del;
	alert(deletar);
	$.ajax({
		type:    'POST',
		url:   urlpost,
		data:  deletar,
		beforeSend: '',
		success: function(resposta){
			alert(resposta);
			}
		});
	
	});
	
//----------------fim delete------------------------//


//------------------editar------------------------//
var formmodal	= $('form[name="editar_form"]');
var buttonconsult = $('input[name=editar]');
buttonconsult.click(function(){
	var edit = $(this).attr("id");
	var consult = "acao=consultar&editar="+edit;
	alert(edit);
	
	$.ajax({
	    	type:       'POST',
			url:        urlpost,
			data:		consult,
			dataType:	"json",
			beforeSend: '',
			error: 		'',	
			success: 	function( retorno ){
				//formmodal.find("input[name=nome]").val(retorno);
				$.each( retorno, function(key, value){
					formmodal.find("input[name='"+key+"'],select[name='"+key+"']").val(value);
				});
				
				}/*,
			complete: 	function(){
				formmodal.fadeIn("slow");
			}*/

		})
	
	});

//------------------fim consultar pra editar-----------------//


//-----------------inicio editar-------------------------//

formmodal.submit(function(){
	var buttonedit = $('input[name=editar]');
	var dados = $(this).serialize();
	var acao = "&acao=editar";
	var sender = dados+acao;
	
	$.ajax({
		url:     urlpost,
		data:    sender,
		type:    'POST',
		error: '',
		success: function(resposta){
			alert(resposta);
			}
		
		});
	
	});

//formulario de cadastro de usuarios--------------	
/*$('form[name="usuarios"]').submit(function(){
	var nome = $('input[name="usuarioNome"]').val();
	var usuario = $('input[name="usuarioUser"]').val();
	var setor = $('select[name="usuarioSetor"]').val();
	var restricao = $('select[name="usuarioRestricao"]').val();
	var senha = $('input[name="usuarioSenha"]').val();
	var confSenha = $('input[name="usuarioConfsenha"]').val();
	var duplo = $('input[name="duplo"]').val();
	
	


		if (nome == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo Nome</h4>');
	$('input[name="usuarioNome"]').css("border-color","red").focus();
		
	return false;
	}else if (usuario == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo Usuário</h4>');
	$('input[name="usuarioUser"]').css("border-color","red").focus().focusout(function(){
		$(this).css("border-color","#CCC");
		});	
	return false;
	}else if (setor == 'Selecione'){
	$('.mensagem').empty().html('<h4 class="alert_error">Selecione o campo Setor</h4>');
	$('select[name="usuarioSetor"]').css("border-color","red").focus();	
	return false;
	}else if (restricao == 'Selecione'){
	$('.mensagem').empty().html('<h4 class="alert_error">Selecione o campo Nivel de Restrição</h4>');
	$('select[name="usuarioRestricao"]').css("border-color","red").focus();	
	return false;
	}else if (senha == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo senha</h4>');
	$('input[name="usuarioSenha"]').css("border-color","red").focus();	
	return false;
	}else if (confSenha == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo Confirmar Senha</h4>');
	$('input[name="usuarioConfsenha"]').css("border-color","red").focus();	
	return false;
	}else if (senha != confSenha){
	$('.mensagem').empty().html('<h4 class="alert_error">Dados da senha não conferem</h4>');	
	$('input[name="usuarioSenha"]').css("border-color","red");
	$('input[name="usuarioConfsenha"]').css("border-color","red");
	return false;
	}else if (duplo == '1'){
		$('.mensagem').empty().html('<h4 class="alert_error">Usuário já existente</h4>');
		return false;
	}
	
	$('.painel1').attr("type","submit");
	
	if (painel == 1){
		$(this).addClass("nome");
	}
	
	
});
//fim cadastro de usuarios------------------------

//formulario de cadastro de cardapio--------------		
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
	$('.painel1').attr("type","submit");
	
	if (painel == 1){
		$(this).addClass("nome");
	}
	
	});*/
//fim cadastro de cardapio------------------------		
});