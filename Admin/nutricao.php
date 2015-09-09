<?php
session_start();

$_SESSION['logado'] = true;

if ($_SESSION['logado'] == true)
{
?>

<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8"/>
	<title>Painel Administrativo</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
    <!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
    <script src="js/script.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>


</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.html">Admin</a></h1>
			<h2 class="section_title">Painel Administrativo</h2><div class="btn_view_site"><a href="http://www.medialoot.com">Ver site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Leanderson Silva (<a href="#">3 Mensagens</a></p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.html">Painel Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
    <?php
    
	
	?>
    
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Conteúdo</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="#">Novo Artigo</a></li>
			<li class="icn_edit_article"><a href="#">Editar Artigos</a></li>
			<li class="icn_categories"><a href="#">Categorias</a></li>
			<li class="icn_tags"><a href="#">Tags</a></li>
		</ul>
		<h3>Usuários</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="#">Novo usuário</a></li>
			<li class="icn_view_users"><a href="#">Usuários</a></li>
			<li class="icn_profile"><a href="#">Seu Profile</a></li>
		</ul>
		<h3>Arquivos</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">File Manager</a></li>
			<li class="icn_photo"><a href="#">Gallery</a></li>
			<li class="icn_audio"><a href="#">Audio</a></li>
			<li class="icn_video"><a href="#">Video</a></li>
		</ul>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="#">Opções</a></li>
			<li class="icn_security"><a href="#">Segurança</a></li>
			<li class="icn_jump_back"><a href="#">Sair</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Sistema de Gestão hospitalar</strong></p>
			<p>Desenvolvido por ACLP TECH</p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		<div class="mensagem">
		<h4 class="alert_info">Bem vindo convidado.</h4>
		</div>
		<article class="module width_full">
			<header>
			  <h3>Cadastro de cardapio</h3></header>
			<div class="module_content">

                <form class="form-horizontal cardapio" action="php/action.php" method="post" name="card">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Prato Principal</label>
    <div class="controls">
      <textarea rows="3" cols="80" name="principal"></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Acompanhamento</label>
    <div class="controls">
      <textarea rows="3" cols="80" name="acompanhamento"></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Salada</label>
    <div class="controls">
      <textarea rows="3" cols="80" name="salada"></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Caldos</label>
    <div class="controls">
      <textarea rows="3" cols="80" name="caldos"></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Sobremesa</label>
    <div class="controls">
      <textarea rows="3" cols="80" name="sobremesa"></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Sucos</label>
    <div class="controls">
      <textarea rows="3" cols="80" name="sucos"></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Outros</label>
    <div class="controls">
      <textarea rows="3" cols="80" name="outros"></textarea>
    </div>
  </div>
  <div align="center">
  <input type="submit" value="enviar">
 <!-- <button class="btn btn-success btn_tamanho">Cadastrar</button>
  <button class="btn btn-success btn_tamanho">Limpar</button>
  </div>-->
</form>
                <div class="clear"></div>
			</div>
		</article><!-- end of stats article -->
		
		<article class="module width_3_quarter">
		<header><h3 class="tabs_involved">Cadastros recentes</h3>
		<ul class="tabs">
   			<li><a href="#tab1">Piasts</a></li>
    		<li><a href="#tab2">Comentario</a></li>
		</ul>
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
    				<th>Nome</th> 
    				<th>Categoria</th> 
    				<th>Criado em</th> 
    				<th>Ações</th> 
				</tr> 
			</thead> 
			<tbody> 
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>asdfsdfsdf dsfsd s dfds</td> 
    				<td>Artigos</td> 
    				<td>Setembro 2015</td> 
    				<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
				</tr> 
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>asdfsdfsdf dsfsd s dfdst</td> 
    				<td>Artigos</td> 
    				<td>Setembro 2015</td> 
   				 	<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
				</tr>
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>asdfsdfsdf dsfsd s dfds</td> 
    				<td>Artigos</td> 
    				<td>Setembro 2015</td> 
    				<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
				</tr> 
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>asdfsdfsdf dsfsd s dfds</td> 
    				<td>Artigos</td> 
    				<td>Setembro 2015</td> 
   				 	<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
				</tr>
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>asdfsdfsdf dsfsd s dfdst</td> 
    				<td>Articles</td> 
    				<td>Setembro 2015</td> 
   				 	<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
				</tr>  
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
			<div id="tab2" class="tab_content">
			

			</div><!-- end of #tab2 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->
		
		<article class="module width_quarter">
			<header><h3>Painel 3</h3></header>
			<div class="message_list">
				<div class="module_content">
					<div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
					<p><strong>John Doe</strong></p></div>
					<div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
					<p><strong>John Doe</strong></p></div>
					<div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
					<p><strong>John Doe</strong></p></div>
					<div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
					<p><strong>John Doe</strong></p></div>
					<div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
					<p><strong>John Doe</strong></p></div>
				</div>
			</div>
			<footer>
				<form class="post_message">
					<input type="text" value="Message" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
					<input type="submit" class="btn_post_message" value=""/>
				</form>
			</footer>
		</article><!-- end of messages article -->
		<!-- apagar <div class="active"><a href=""></a>-->
		<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3>Novo Artigo</h3></header>
				<div class="module_content">
						<fieldset>
							<label>Post Title</label>
							<input type="text">
						</fieldset>
						<fieldset>
							<label>Content</label>
							<textarea rows="12"></textarea>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Categoria</label>
							<select style="width:92%;">
								<option>Artigos</option>
								<option>Tutoriais</option>
								<option>fsdfsdf</option>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Tags</label>
							<input type="text" style="width:92%;">
						</fieldset><div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<select>
						<option>Draft</option>
						<option>Published</option>
					</select>
					<input type="submit" value="Publish" class="alt_btn">
					<input type="submit" value="Reset">
				</div>
			</footer>
		</article><!-- end of post new article -->
		
		<h4 class="alert_warning">A Warning Alert</h4>
		
		<h4 class="alert_error">An Error Message</h4>
		
		<h4 class="alert_success">A Success Message</h4>
		
		<article class="module width_full">
			<header><h3>Basic Styles</h3></header>
				<div class="module_content">
					<h1>Header 1</h1>
					<h2>Header 2</h2>
					<h3>Header 3</h3>
					<h4>Header 4</h4>
					<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum. Maecenas faucibus mollis interdum. Maecenas faucibus mollis interdum. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>

<p>Donec id elit non mi porta <a href="#">link text</a> gravida at eget metus. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>

					<ul>
						<li>Donec ullamcorper nulla non metus auctor fringilla. </li>
						<li>Cras mattis consectetur purus sit amet fermentum.</li>
						<li>Donec ullamcorper nulla non metus auctor fringilla. </li>
						<li>Cras mattis consectetur purus sit amet fermentum.</li>
					</ul>
				</div>
		</article><!-- end of styles article -->
		<div class="spacer"></div>
	</section>


</body>

</html>

<?php

}
?>