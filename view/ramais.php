<!DOCTYPE html>


<html lang="en">
<?php include '../include/header.php'; ?>
<body>
	
	<!-- ====================================================
	header seçao -->
                                            <?php
                                              include ('../include/top-header.php');
                                            ?>

					    <!-- Colete as ligações nav, formulários e outros conteúdos para alternar -->
					      <?php 
                                                include ('../include/menu.php');
                                                menu('3');
                                                
                                             ?>
                                                
                                            <!-- /navbar-collapse -->
					 <?php
                                              include '../include/button-header.php';
                                          ?> <!-- fim do header area -->

			<!--  seçao sistemas -->
			<section class="about text-center" id="about">
				<div class="container">
                                    
                                    <?php 
                                    include '../controller/Ramal_Controller.class.php';
                                    $rc = new Ramal_Controller();
                                    $i = $rc->recTotal();
                                    
                                   // echo $_SERVER['DOCUMENT_ROOT'];
                                    
                                    if($i>0){
                                     ?> 
                                    
                                    <table id="tabela1" class="table" border="1"> 
                                        <tr>
                                            <td>
                                                Setor
                                            </td>
                                            <td>
                                                Ramal
                                            </td>
                                            <td>
                                                Responsável
                                            </td>
                                        </tr>
                                   
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
                                            $num_por_pagina = 16; 

                                            // bloco 3 - descubra o número da página que será exibida
                                            // se o numero da página não for informado, definir como 1
                                            session_start();
                                            ?>
                                        <div id="pesq">
                                                    <form action="pesquisa_ramal.php" method="post" id="maiuscula">
                                                                <input name="pesquisa" placeholder="Pesquise aqui">
                                                                <input type="submit" value="Pesquisar">
                                                    </form>
                                             </div>
                                        <?php
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
                                            include '../bean/Ramal.class.php'; 
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
                                                $rs = $controller->lista_ramais("", $primeiro_registro, $num_por_pagina);
                                              //  $refresh = "refresh:20; url={$_SERVER['PHP_SELF']}?pagina=2" ;
                                              //  header($refresh);
                                                
                                                }else{
                                                        //$rs = $controller->lista($num_por_pagina+1, $total);
                                                        
                                                        $rs = $controller->lista_ramais("", $num_por_pagina+($pagina-1), $num_por_pagina*$pagina);
                                                       
                                                        //lista_ramais("", $primeiro_registro, $num_por_pagina);
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
                                            echo "<h4>$prev_link | $painel | $next_link </h4>";

                                            }else{
                                             //   echo 'não é maior que o total';
                                                $rs = $controller->lista_ramais("", $primeiro_registro, $num_por_pagina);
                                              //  echo '<meta http-equiv="refresh" content="10" />';
                                            }
                                            
                                            // se página maior que 1 (um), então temos link para a página anterior

                                            $i = 0;
                                            $ramalList = new RamalListIterator($rs);
                                            $ramal = new Ramal();                                        
                                     
                                           while($ramalList->hasNextRamal()){
                                                $i++;
                                               $ramal = $ramalList->getNextRamal();
                                              if($i % 2 == 0){
                                                  $par = "#d5e6ef";
                                              }else{
                                                  $par = "#ffffff";
                                              }  



                                                echo "<tr bgcolor=$par >";
                                                if($ramal->getSnVisutaliza() == 'S'){
                                                    echo "<td>".$ramal->getSetor()."</td>";
                                                    echo "<td id=celula-ramal>".$ramal->getNrRamal()."</td>";                                                  
                                                    echo "<td>".$ramal->getResponsavel()."</td>";      
                                                    echo "</tr>";
                                                }
                                            }
                                        
                                            
                       
                    ?>
                                         </table>
                                    
                                     <?php   
                                    }
                                    else{
                                     ?>
                                        
                                        <h2> NÃO EXISTEM RAMAIS CADASTRADOS </H2>
                                  <!--      <input name="" type="button" onClick="window.open('Aqui você coloca a url para redirecionamento')" value="Cadastre o primeiro ramal"> -->
                                        <?php 
                                        $url = "";
                                        $ip = gethostbyname($url);
                                         //$ip = $_SERVER['REMOTE_ADDR'];
                                       $index = 'http://'.$ip.'/intranet/';
                                        ?>
                                        <a class="but but-success but-rc" href="<?php echo $index.'services/session.php?link='.$index.'view/cadastrar_ramais.php'?>" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cadastre o primeiro ramal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> 
                                   <?php     
                                    }
                                      ?>  
                                   
                                    
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