
<html lang="en">
<?php include '../include/header.php'; ?>

	<meta charset="UTF-8" />
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
	<title>jsTiles | A jQuery - Bootstrap plugin</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,greek-ext' rel='stylesheet' type='text/css'>
	<link href="../Admin/jstiles-master/resources/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet" />
	<link href="../Admin/jstiles-master/resources/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" />
	<link href="../Admin/jstiles-master/css/style2.css" rel="stylesheet" />
	<link href="../Admin/jstiles-master/scripts/jstiles/css/tl-style.css" rel="stylesheet" />
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Tab Styles Inspiration</title>
		<meta name="description" content="Tab Styles Inspiration: A small collection of styles for tabs" />
		<meta name="keywords" content="tabs, inspiration, web design, css, modern, effects, svg" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="../css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="../css/demo.css" />
		<link href="../css/tabs.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="../css/tabstyles.css" />
  		<script src="../js/modernizr.custom.js"></script>-->
      

<body data-spy="scroll" data-target="#side-nav-affix">
	
	<!-- ====================================================
	header seçao -->
                                            <?php
                                              include ('../include/top-header.php');
                                            ?>
					    <!-- Colete as ligações nav, formulários e outros conteúdos para alternar -->
					      <?php 
                                                include ('../include/menu.php');
                                                menu('2');
                                                
                                             ?>
                                                
                                            <!-- /navbar-collapse -->
					  <?php
                                              include '../include/button-header.php';
                                             ?><!-- fim do header area -->

			<!--  seçao sistemas -->
                        
                                    
                        
			<section class="about text-center" id="about">
				<div class="container">
                                    <H2>Cardápio</H2>
                            
                                 
                         <!--           <svg class="hidden">
			<defs>
				<path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z"/>
			</defs>
		</svg>
		<div class="container">
			<!-- Top Navigation -->
			
			<!--<header class="codrops-header">
				<h1>Cárdapio <span>Tabela de refeições do dia</span></h1>
				<p class="support">Your browser does not support <strong>flexbox</strong>! <br />Please view this demo with a <strong>modern browser</strong>.</p>
			</header>
			
			
			
			
			
			<section>
				<div class="tabs tabs-style-shape">
					<nav>
						<ul>
							<li>
								<a href="#section-shape-1">
									<svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use>
									</svg>
									<span>Café da Manhã</span>
								</a>
							</li>
							<li>
								<a href="#section-shape-2">
									<svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
									<svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xlink:href="#tabshape"></use></svg>
									<span>Almoço e Janta</span>
								</a>
							</li>
							
							
							
						</ul>
					</nav>
					<div class="content-wrap">
						<section id="section-shape-1">	<p>				
                        
                    
                        
                        
                        </p>
                        </section>
						<section id="section-shape-2">						<table class="table table2" border="10px" style="border-color:#FFF" cellpadding="10px" cellspacing="20px">
                     <?php /*?>   <?php include 'consulta_cardapio.php';?>
                        <?php while ($dados = mysqli_fetch_array($query1))
                    {?><?php */?>
                        
                        
                         <tr>
                        <th class="azul" height="150px"><h3 align="center">principal</h3><?php /*?><?php echo $dados['principal']?></th>
                        <th class="amarelo" style="margin:0px auto"><h3 align="center">Acompanhamento</h3><?php echo $dados['acompanhamento']?></th>
                         <th class="success"><h3 align="center">Salada</h3><?php echo $dados['salada']?></th>
                        </tr><?php */?>
                        
                      
                        
                       
                        
                        
                        
                        
                        <tr>
                        <th class="cinza" height="150px"><h3 align="center">Caldos</h3><?php /*?><?php echo $dados['caldos']?></th>
                        <th class="warning"><h3 align="center">Sobremesa</h3><?php echo $dados['sobremesa']?></th>
                         <th style="background-color:#CCC"><h3 align="center">Sucos</h3><?php echo $dados['sucos']?></th>
                        </tr>
                         <?php } ?><?php */?>
                        </table></p></section>
						
					</div><!-- /content -->
				<!--</div><!-- /tabs -->
			<!--</section>-->
			
						
			
		<!--</div><!-- /container -->
		<!--<script src="../js/cbpFWTabs.js"></script>
		<script>
			(function() {

				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
		</script>-->
        
        <div id="main-container" class="col-xs-12">
	
		<div id="tiles-container" class="sampleClass">
				
			<div class="tl-page" data-tl-template="tempA">
				
				<div id="tileA">
					<h2>Bebidas</h2>
					<span>
						<p>klsdfjksdfjksdfjksdfjksdfjksdfjksdfjksdfjksdfjkfjksdfj</p> 
						
					</span>
				</div>
				<div id="tileB">
					<span id=""><img src="../Admin/jstiles-master/img/saude2.png" width="180px" /></span>
				</div>
				<div id="tileC">
					<h2>Dicas de Saúde</h2>
					<span class="content-hidden">
						<p>
							<a class="githubAnchor innerAnchor floatLeft" href="#initialization" target="_blank" title=""><span class="linkText">Start Here!</span></a>
							<a class="githubAnchor floatLeft" href="https://github.com/kapantzak/jstiles" target="_blank" title="Check the README file on GitHub"><span class="linkText">README</span></a>
						</p>
					</span>
				</div>
				<div id="tileD">
					<h2>Frutas</h2>
					<span>
						<p>texto do banco de dados</p>
						
							
						
					</span>
				</div>
				<div id="tileE">
					<h2>Pão</h2>
				
					<span>
						<p>texto do banco de dados</p>
						<p>
							<a class="githubAnchor innerAnchor floatLeft" href="#events"><span class="linkText">Events</span></a>
						</p>
					</span>
				</div>
				<div id="tileF"></div>
				<div id="tileG">
					<h2>outros</h2>
					<span class="tileG_arrow tileG_arrow_left glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="tileG_arrow tileG_arrow_right glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="tileG_content-hidden">
						<p>Organize your tiles in pages and navigate through them!</p>
						<p><a class="githubAnchor innerAnchor floatLeft" href="#paging" target="_blank"><span class="linkText">Paging</span></a></p>
					</span>
				</div>
				<div id="tileH">
					<h2>Outros</h2>
				</div>
				<div id="tileI">
					<h2>Outros</h2>
					<span>
						<p>texto do banco de dados.</p>
						<p>
							<a class="githubAnchor innerAnchor floatLeft" href="#options" target="_blank"><span class="linkText">Options</span></a>
						</p>
					</span>
				</div>
				<div id="tileJ"></div>
				
			</div> 
			
			<div class="tl-page" data-tl-template="tempB">
				
				<div id="tileK">
                <h3 style="color:#000"><b>Sucos</b></h3>
                   <p style="color:#FFF"><b>Track trush </b></p>
                </div>
				<div id="tileL">
                <img src="../Admin/jstiles-master/img/almoco.jpg" width="260px">
                </div>
				<div id="tileM">
					<h3 style="color:#000"><b>Principal</b></h3>
                   <p style="color:#FFF"><b>Escondidinho de lentinha e picadinho de soja com legumes</b></p>
                   <h3 style="color:#000"><b>Acompanhamento</b></h3>
                   <p style="color:#FFF"><b>Arroz branco, arroz integral e feijão</b></p>
				</div>
				<div id="tileN">
                	<img src="../Admin/jstiles-master/img/saude.png" width="140px" />
                </div>
				<div id="tileO">
                <h3 style="color:#000"><b>Salada</b></h3>
                <p style="color:#FFF"><b>Beterraba Cozida, macarronese, rúcula com abacaxi e torrada</b></p>
                </div>
				<div id="tileP">
                <h3 style="color:#000"><b>Caldos</b></h3>
                <p style="color:#FFF"><b>Caldo de abóbora</b></p>
                </div>
				<div id="tileQ"><img src="../Admin/jstiles-master/img/dicas-saude.jpg" width="300px" /></div>
				<div id="tileR">
                <img src="../Admin/jstiles-master/img/LOGO HAM 2008 6.jpg" width="120px" />
                </div>
				<div id="tileS">
                <h3 style="color:#000"><b>Sobremesa</b></h3>
                <p style="color:#FFF"><b>Beterraba Cozida, macarronese</b></p>

                </div>
				
			</div>
	
		</div>
				
	</div>
		
	
	
	<script src="../Admin/jstiles-master/scripts/jquery-1.11.2.min.js"></script>
	<script src="../Admin/jstiles-master/resources/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
	<script src="../Admin/jstiles-master/scripts/jstiles/jstiles.js"></script>
	<script src="../Admin/jstiles-master/scripts/jquery.easing.1.3.js"></script>
	<script src="../Admin/jstiles-master/scripts/scripts.js"></script>
	<script>
		$(document).on('tl.tilecontent.appended', function(e, data) {
			console.log('Tiles appended on: ' + data);
		});
		$(document).on('tl.template.built', function(e, data) {
			console.log('Templates built on: ' + data);
		});
	</script>
                   
                   
                   
              </div>  
			</section><!-- end of about section -->


	

	<!-- script tags
	============================================================= -->
	<script src="js/jquery-2.1.1.js"></script>
	<script src="js/smoothscroll.js"></script>
<!--	<script src="js/bootstrap.min.js"></script>-->
	<script src="js/custom.js"></script>

	
</body>
</html>