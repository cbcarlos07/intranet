// JavaScript Document
$(function(){
    // acesso = define o nivel de usuário
	var acesso = $('.acesso').val();
        var urlpost = null; 
        var forms = $('form');
        var botao = $('.j_button');
        var mensagem = $('.mensagem');
          //alert("Acesso: "+acesso);  
          
        switch(acesso){
           
                case '1':   
                
		$('.painel2').hide(1);
		$('.painel3').hide(1);
		$('.painel_ramais').hide(1);
                urlpost = 'php/action_usuarios.php'; 
                
                cad_usuario();
                principal();
                break;
                
                case '2':
                
		$('.painel1').hide(1);
		$('.painel2').hide(1);
                break;
                
                case '3':
                    
		$('.painel1').hide(1);
		$('.painel3').hide(1);
		$('.painel_usuarios').hide(1);
                $('.editar_usuarios').hide(1);
                
              
                
                urlpost = "../services/acaoRamais.php"; 
                cad_ramais();
                 principal();
               // principal('../services/acaoRamais.php')
                break;
	}
	$('.data').hide("fast");
	
	//inicio ocultar e exibir cadastros recentos
	$('#tab2').click(function(){
		$('.data').show("fast");
		
		});
	
	$('#tab3').click(function(){
		$('.data').hide(1);
		
		});
	//fim ocultar e exibir cadastros recentos
		
		
	//-------------mensagens de alertas------------//
	$('.alert_warning').hide("fast");
	$('.alert_error').hide("fast");
	$('.alert_success').hide("fast");
	//----------fim mensagens de alertas------------//
	

//var urlpost = 'php/action_usuarios.php'; 

	//botao.attr("type","submit");
	
	function carregando(){
		mensagem.empty().html('<h4 class="alert_warning"><img src="images/load.gif" alt="Carregando..."> Aguarde, enviando requisição!</h4>').fadeIn("fast");
	}
	
	function errosend(){
		mensagem.empty().html('<h4 class="alert_error"><strong>Erro inesperado,</strong> Favor contate o DTI!</h4>').fadeIn("fast");
	}
	
	function sucesso(){
		
		mensagem.empty().html('<h4 class="alert_success">Cadastro Realizado com Sucesso</h4>').fadeIn("fast");
		setTimeout(function (){location.reload()},1500);
		//window.setTimeout()
		//delay(2000);
	}
	
	
	function trocar(resposta){
		alert(resposta);
		
	}
	
	function trocar(){
		
		
	}
	
	
	
	forms.submit(function(){
	return false;
		
	
	});
function principal(){	
   // alert('Url Send '+urlpost);
	$.ajaxSetup({
			url:	urlpost,
			type:	'POST',
			beforeSend: carregando,
			error: 		errosend
		});
}
	//alert("UrlPost: "+urlpost);
function cad_usuario(){	
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

}

function cad_ramais(){	
        //urlpost = "../services/acaoRamais.php"; 
        var cadastro_ramais = $('form[name="cadastro_ramais"]');
	cadastro_ramais.submit(function(){
	
		
	//-----------------validacao--------------//	
	var nrramal = $('input[name="nrramal"]').val();
	var nmresponsavel = $('input[name="nmresponsavel"]').val();	
	var nmsetor = $('input[name="nmsetor"]').val();
	var visualiza = $('input[name="visualiza"]').val();
	var apelido = $('input[name="apelido"]').val();
	
	
	if (nrramal == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo Numero do Ramal</h4>');
	$('input[name="nrramal"]').css("border-color","red").focus();
		
	return false;
	
	}else if (opcao == '0' && nmsetor == ''){
	$('.mensagem').empty().html('<h4 class="alert_error">Preencha o campo Setor</h4>');
	$('select[name="nmsetor"]').css("border-color","red").focus();	
	return false;
	}
	
	
	//---------------fim validacao---------------//
	
		var dados1 = $(this).serialize();
		var action = "&acao=I";
		var sender	= dados1+action;
		
		$.ajax({
			data:	sender,
			success: function(dados1){
				if (dados1 == 1){
					$('.mensagem').empty().html('<h4 class="alert_error">Ramal já existente</h4>');
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
				cadastro_ramais.find("input:text,textarea").val('');
				//location.href="http://localhost/intranet/Admin/nutricao.php";
			}
		});
});		

}

//-----------------delete-------------------------//

/*function confirmacao (){
	confirm ('Você tem certeza que desejas excluir o usuario');
	}*/


$('input[name=excluir]').click(function(){
	var confirma = confirm('Você tem certeza que desejas excluir este usuário?');
	if (confirma){//--
	var del = $(this).attr("id");
	deletar = "acao=deletar&delete="+del;

	$.ajax({
		type:    'POST',
		url:   urlpost,
		data:  deletar,
		beforeSend: '',
		success: function(resposta){
			if (resposta == 1)
			alert('usuario excluído com sucesso!');
			location.reload();
			}
		});
	}//--
	});
	
//----------------fim delete------------------------//


//------------------editar------------------------//

var formmodal	= $('form[name="editar_form"]');
var buttonconsult = $('input[name=editar]');
buttonconsult.click(function(){
	var edit = $(this).attr("id");
	var consult = "acao=consultar&editar="+edit;

	
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