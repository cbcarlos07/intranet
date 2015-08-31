<!DOCTYPE html>
<html lang="en">
<?php include 'include/head.php'; ?>
<body>
	
	<!-- ====================================================
	header seçao -->
	<header class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-5 header-logo">
					<br>
					<a href="index.html"><img src="img/logo1.png" alt="" class="img-responsive logo"></a>
				</div>

				<div class="col-md-7">
					<nav class="navbar navbar-default">
					  <div class="container-fluid nav-bar">
					    <!-- Marca e alternância se agrupados para melhor visualização móvel -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					    </div>

					    <!-- Colete as ligações nav, formulários e outros conteúdos para alternar -->
					      <?php 
                                                include ('include/menu.php');
                                                menu('1');
                                               // echo "Ramais: ".$ramais;
                                             ?><!-- /navbar-collapse -->
					  </div><!-- / .container-fluid -->
					</nav>
				</div>
			</div>
		</div>
	</header> <!-- fim do header area -->

			<!--  seçao sistemas -->
                        
			<section class="about text-center" id="about">
				<div class="container">
                                   
					<div class="row">
						<h2>SISTEMAS DE GESTÃO HOSPITALAR</h2>
						<h4>Departamento de Tecnologia da Informação</h4>

						<div class="col-md-4 col-sm-6">
							<a href="links/mv"><div class="single-about-detail clearfix" style="border:1px solid black;border-radius:10px">
								<div class="about-img" align="center">
									<img class="img-responsive" src="img/MVG.png" alt="">
								</div>

								<div class="about-details">
								  <h3>SOUL MV</h3>
									<p>Gestão Hospitalar</p>
								</div>
							</div>
                            </a>
						</div>

						<div class="col-md-4 col-sm-6">
							<a href="links/mvpep"><div class="single-about-detail clearfix" style="border:1px solid black;border-radius:10px">
								<div class="about-img" align="center">
									<img class="img-responsive" src="img/PEP.png" alt="" style="width:76.5%">
								</div>

								<div class="about-details">
								  <h3>PEP</h3>
									<h5> Prontuário Eletrônico do Paciente </h5>
								</div>
							</div>
                            </a>
						</div>


						<div class="col-md-4 col-sm-6">
							<a href="links/portal"><div class="single-about-detail" style="border:1px solid black;border-radius:10px">
								<div class="about-img" align="center">
									<img class="img-responsive" src="img/MVPORTAL.png" alt="" style="width:78.5%">
								</div>

								<div class="about-details">
								  <h3>MVPORTAL</h3>
									<p>Informações Gerenciais</p>
								</div>
							</div>
                            </a>
						</div>
                        
                      <div class="col-md-4 col-sm-6">
							<a href="links/dinamus"><div class="single-about-detail clearfix" style="border:1px solid black;border-radius:10px">
								<div class="about-img" align="center">
									<img class="img-responsive" src="img/DYNAMUS.png" alt="" style="width:76%">
								</div>

								<div class="about-details">
								  <h3>DYNAMUS</h3>
									<p>Help Desk</p>
								</div>
							</div>
                   		  </a>
						</div>
                        
                        <div class="col-md-4 col-sm-6">
							<a href="links/mixweb"><div class="single-about-detail clearfix" style="border:1px solid black;border-radius:10px">
								<div class="about-img" align="center">
									<img class="img-responsive" src="img/MIX WEB.png" alt="" style="width:75.5%">
								</div>

								<div class="about-details">
								  <h3>MIX WEB</h3>
									<p>Controle de Ponto</p>
								</div>
							</div>
						</div>
                        
                        

					</div>
                                    -
				</div>
			</section><!-- end of about section -->


	

	<!-- script tags
	============================================================= -->
	<script src="js/jquery-2.1.1.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>