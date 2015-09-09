<!DOCTYPE html>


<html lang="en">
<?php include 'include/header.php'; ?>
<body>
	
	<!-- ====================================================
	header seçao -->
                                            <?php
                                              include ('include/top-header.php');
                                            ?>

					    <!-- Colete as ligações nav, formulários e outros conteúdos para alternar -->
					      <?php 
                                                include ('include/menu.php');
                                                menu('3');
                                                
                                             ?>
                                                
                                            <!-- /navbar-collapse -->
					 <?php
                                              include 'include/button-header.php';
                                          ?> <!-- fim do header area -->

			<!--  seçao sistemas -->
			<section class="about text-center" id="about">
				<div class="container">
                                
                                   
                                      
                                     <h2> CADASTRAR RAMAIS   </H2>  
                                     <div id="tabela">
                                  <form >
                                      <table>
                                          <tr>
                                              <td >* Número do Ramal:</td><td><input name="ramal" size="34"></td>
                                          </tr>
                                          <tr>
                                              <td>Descrição</td><td><input name="descr" placeholder="opcional" size="34" height="10"></td>
                                          </tr>
                                          <tr>
                                              <td>Setor</td>
                                              <td>
                                                  <select name="setor">
                                                        <?php
                                                               include '../controller/Ramal_Controller.class.php';
                                                               include '../services/SetorListIterator.class.php';
                                                               $ramal = new Ramal_Controller();
                                                               $setores = $ramal->recSetor();
                                                               $setorList = new SetorListIterator($setores);
                                                               $setor = new Setor();
                                                               while($setorList->hasNextSetor())
                                                                {
                                                                   $setor = $setorList->getNextSetor();
                                                                   echo "<option value=".$setor->getCodigo().">".$setor->getNome()."</option>";
                                                                 }
                                                         ?>
                                                  </select>
                                                  
                                              </td>
                                          </tr>
                                           <tr>
                                               <td>Visualiza? </td><td><input type="checkbox" checked="true" name="visualiza"></td>
                                          </tr>
                                           <tr>
                                               <td>Apelido </td><td><textarea rows="10" cols="36" name="apelido"></textarea></td>
                                          </tr>
                                      </table>
                                  </form>
                                         </div>
                                     <!--
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
							<a href="mixweb"><div class="single-about-detail clearfix" style="border:1px solid black;border-radius:10px">
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
                                    -->
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