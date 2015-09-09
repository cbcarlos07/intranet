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
                                
                                   
                                      
                                  <!--   <h2> CADASTRAR RAMAIS   </H2>  -->
                                  
                         <div id=tab >
                          <div id=tabela >
                               <table border=1 width=99% onload=chamaphp()>
                                       <tr id=titulo>
                                          <td >PACIENTE</TD><TD>LEITO</TD><TD>M&Eacute;DICO</TD><TD>DATA INTERNA&Ccedil;&Atilde;O</TD><TD>DATA &Uacute;LTIMA PRESCRI&Ccedil;&Atilde;O</TD> 
                                                <TD>PRESCRI&Ccedil;&Atilde;O</td> <TD>PARECER</TD><TD>LABORAT&Oacute;RIO</TD><TD>IMAGEM</TD>
                                      </tr>
                                        <tbody>
                                            <?php
                                            /* @var $pagina type */
                                            if(!isset($_GET['pagina']))
                                            {
                                                $pagina = 1;
                                            }  
                                            else{
                                                $pagina = $_GET['pagina'];
                                            }
                     
                     
                                            // bloco 2 - defina o número de registros exibidos por página
                                            $num_por_pagina = 33; 

                                            // bloco 3 - descubra o número da página que será exibida
                                            // se o numero da página não for informado, definir como 1
                                            session_start();
                                            
                                            
                                            
                                                
                                              
                                              
                                            
                                            
                                            // bloco 4 - construa uma cláusula SQL "SELECT" que nos retorne somente os registros desejados
                                            // definir o número do primeiro registro da página. Faça a continha na calculadora que você entenderá minha fórmula.
                                            $primeiro_registro = ($pagina*$num_por_pagina) - $num_por_pagina;

                                             // consulta apenas os registros da página em questão utilizando como auxílio a definição LIMIT. Ordene os registros pela quantidade de pontos, começando do maior para o menor DESC.


                                             /* 
                                             * To change this license header, choose License Headers in Project Properties.
                                             * To change this template file, choose Tools | Templates
                                             * and open the template in the editor.
                                             */

                                            include_once '../controller/Ramal_Controller.class.php';
                                            include_once '../beans/Ramal.class.php'; 
                                            include_once '../services/RamalList.class.php';
                                            include_once '../services/RamalListIterator.class.php';
                                            $controller = new Ramal_Controller();


                                            $total = $controller->recTotal();
                                            $refresh = "";
                                           // echo "total: $total  Numero por pagina: $num_por_pagina";
                                            if($total > $num_por_pagina){
                                                 if(!isset($_SESSION['pagina'])){
                                                 $pagina = 1;
                                                 $_SESSION['pagina'] = $pagina ;
                                             }  else{
                                                 if( $_SESSION['pagina'] == 1){
                                                     $pagina = 2;
                                                     $_SESSION['pagina'] = $pagina ;
                                                 }
                                                 else {
                                                     $pagina = 1;
                                                     $_SESSION['pagina'] = $pagina;
                                                     
                                                 }
                                             }
                                                
                                                
                                                if($pagina == 1){
                                                $rs = $controller->lista($primeiro_registro, $num_por_pagina);
                                              //  $refresh = "refresh:20; url={$_SERVER['PHP_SELF']}?pagina=2" ;
                                                header($refresh);
                                                
                                                }else{
                                                        $rs = $dao->lista($num_por_pagina+1, $total);
                                                        /*echo '<meta http-equiv="refresh" content="6" />';
                                                        $refresh = "refresh:6; url={$_SERVER['PHP_SELF']}?pagina=1" ;
                                                        header($refresh);*/
                                                        

                                                }
                                            
                                                    $total_paginas = $total / $num_por_pagina;
                                                    $prev = 1;
                                                    $next = 2;
                                                    
                                                                if ($pagina > 1) {
                                                                    $prev_link = "<a href='{$_SERVER['PHP_SELF']}?pagina=$prev' >Anterior</a>";

                                                                    } else { // senão não há link para a página anterior

                                                                    $prev_link = "Anterior";

                                                                    }


                                                    // se número total de páginas for maior que a página corrente, então temos link para a próxima página
                                                  if ($total_paginas > $pagina) {
                                                  $next_link = "<a href='{$_SERVER['PHP_SELF']}?pagina=$next' >Próxima</a>";
                                                  } else { // senão não há link para a próxima página
                                                  $next_link = "Próxima";

                                                  }

                                                  // vamos arredondar para o alto o número de páginas que serão necessárias para exibir todos os registros. Por exemplo, se temos 20 registros e mostramos 6 por página, nossa variável $total_paginas será igual a 20/6, que resultará em 3.33. Para exibir os 2 registros restantes dos 18 mostrados nas primeiras 3 páginas (0.33), será necessária a quarta página. Logo, sempre devemos arredondar uma fração de número real para um inteiro de cima e isto é feito com a função ceil().
                                                  //echo "onload=chamaphp()";
                                                  $total_paginas = ceil($total_paginas);
                                                  $painel = "";
                                                  for ($x=1; $x<=$total_paginas; $x++) {
                                                    if ($x==$pagina) { // se estivermos na página corrente, não exibir o link para visualização desta página
                                                      $painel .= " [$x] ";
                                                    } else {
                                                      $painel .= " <a href='{$_SERVER['PHP_SELF']}?pagina=$x'>[$x]</a>";
                                                    }
                                                  }






                                            // exibir painel na tela
                                            echo "$prev_link | $painel | $next_link";

                                            }else{
                                             //   echo 'não é maior que o total';
                                                $rs = $dao->lista($primeiro_registro, $num_por_pagina);
                                                echo '<meta http-equiv="refresh" content="10" />';
                                            }
                                            
                                            // se página maior que 1 (um), então temos link para a página anterior

                                            $i = 0;
                                            $spList = new SituacaoListIterator($rs);
                                            $sp = new SituacaoPaciente();
                                            $paciente = new Paciente();
                                            
                                            
                                            
                                     
                                           while($spList->hasNextSituacao()){
                                                $i++;
                                               $sp = $spList->getNextSituacao();
                                              if($i % 2 == 0){
                                                  $par = "#d5e6ef";
                                              }else{
                                                  $par = "#ffffff";
                                              }  



                                                echo "<tr bgcolor=$par >";
                                                echo "<td>".$sp->getPaciente()->getNome()."</td>";
                                                echo "<td>".$sp->getLeito()."</td>";
                                                echo "<td>".$sp->getPrestador()."</td>";
                                                echo "<td>".$sp->getDateInternacao()."</td>";        
                                                echo "<td>".$sp->getStrDataUltimaPrescricao()."</td>"; 
                                                echo "<td align=center>".$sp->getStrPrescricao()."</td>"; 
                                                echo "<td align=center>".$sp->getStrParecer()."</td>"; 
                                                echo "<td align=center>".$sp->getStrLaboratorio()."</td>"; 
                                                echo "<td align=center>".$sp->getStrImagem()."</td>"; 
                                                echo "</tr>";
                                                
                                            }
                                        
                                            
                       
                    ?>
                                            <tbody>              
                      </table>    
                  </div>
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