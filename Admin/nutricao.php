<?php
session_start();
if ($_SESSION['logado'] == true){

?>
<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8"/>
	<title>Painel Administrativo</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/reveal.css" type="text/css" media="screen" />
    <!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
    <script src="js/jquery.reveal.js" type="text/javascript"></script>
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

<input type="hidden" class="acesso" value="<?php echo $_SESSION['nivel'] ?>">
</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.html">Admin</a></h1>
			<h2 class="section_title">Painel Administrativo</h2><div class="btn_view_site"><a href="http://10.51.28.7/intranet2">Ver site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p><?php echo $_SESSION['nome']; ?> </p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.html">Painel Admin</a> <div class="breadcrumb_divider"></div> 
			<a class="current">Painel</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
    <?php
    
	
	?>
    
    <!--inicio secao paneil esquerdo -->
    <?php include 'php/painel_conteudo.php'; ?>
	<!-- fim de painel de conteudo -->
    
	<!--inicio secao de campos principal --> 
	<section id="main" class="column">
		<div class="mensagem">
		<h4 class="alert_info">Preencha todos os campos</h4>
		</div>
        
        
        
        <!-----------paineis de cadastro----------->
        
        
        <!--inicio cadastro de usuarios-->
        <?php include 'php/cadastro_usuarios.php'; ?>
        <!--fim cadastro usuarios-->
               
        <!--inicio cadastro de cardapio-->
        <?php include 'php/cadastro_cardapio.php'; ?>
		<!-- fim de cadas de usuario-->
        
        <!--inicio do cadastro de ramais-->
        <?php include 'php/cadastro_ramais.php'; ?>
        <!--fim do cadastro de ramais-->
        
        
         <!-----------fim de cadastro-------------->
         
         
         <!--------paineis de visualização--------->
         
         
         <!--inicio painel usuarios -->
         <?php include 'php/Painel_usuarios.php'; ?>
         <!--fim painel usuarios -->
         
         
         <!-------fim paines de visualização------->
		
	  <!-- end of content manager article --><!-- end of messages article -->
		<!-- apagar <div class="active"><a href=""></a>-->
	  <div class="clear"></div>
		
		<article class="module width_full data">
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
        
        
        <!-- inicio editar dados -->
        
        <div id="myModal" class="reveal-modal">
			<h1 align="center">Editar dados</h1>
			<article class="module width_full">
			<header>
			  <h3>Cadastro de Usuários</h3></header>
              <div class="module_content">
						
					
		  </div>
			<div class="module_content">

                <form class="form-horizontal cardapio" action="" method="post" name="editar_form">
  <div class="control-group">
    <label class="control-label" for="usuarioNome">Nome completo:</label>
    <div class="controls">
      <input type="text" style="width:61.5%" name="nome" />  <!--value="php echo $_SESSION['nome']; ?>*/"-->
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="usuarioUser">Nome de Usuário</label>
    <div class="controls">
      <input type="text" style="width:61.5%" name="usuario" />
    </div>
  </div>
 
  
  <div class="control-group">
    <label class="control-label" for="usuarioRestricao">Nível de Restrição</label>
    <div class="controls">
							<select style="width:62%;" name="nivel">
                            <option>Selecione</option>
								<option value="1">Administrador</option>
								<option value="2">Nutricao</option>
								<option value="3">Telefonia</option>
							</select>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="usuarioSenha">Senha</label>
    <div class="controls">
      <input type="password" style="width:61.5%" name="senha" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="usuarioConfsenha">Confirmar Senha</label>
    <div class="controls">
      <input type="password" style="width:61.5%" name="senha" />
    </div>
  </div>
  
  <div align="center">
  <input type="submit" value="atualizar">
 <!-- <button class="btn btn-success btn_tamanho">Cadastrar</button>
  <button class="btn btn-success btn_tamanho">Limpar</button>
  </div>-->
</form>
                <div class="clear"></div>
			</div>
	  </article>
			<a class="close-reveal-modal">&#215;</a>
		</div>
        
        
        <!--fim editar-->
		
		<h4 class="alert_warning">Mensagem de alerta</h4>
		
		<h4 class="alert_error">Mensagem de Erro</h4>
		
		<h4 class="alert_success">Mensagem de Sucesso</h4>
		<!--
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
}else{
	header("location:http://localhost/intranet/Admin/login.php");
}
?>