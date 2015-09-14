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
                                      
                                  <!--   <h2> CADASTRAR RAMAIS   </H2>  -->
                                  
                         <div id=tab >
                          <div id=tabela >
                               <table border=1 width=99% onload=chamaphp()>
                                       <tr id=titulo>
                                          <td >Setor</TD><TD>Ramal</TD><TD>Visivel</TD><TD>Alterar</TD><TD>Excluir</TD>                                                 
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
                                                
                                                /*
                                                if($pagina == 1){
                                                $rs = $controller->lista($primeiro_registro, $num_por_pagina);
                                              //  $refresh = "refresh:20; url={$_SERVER['PHP_SELF']}?pagina=2" ;
                                                header($refresh);
                                                
                                                }else{
                                                        $rs = $controller->lista($num_por_pagina+1, $total);
                                                        /*echo '<meta http-equiv="refresh" content="6" />';
                                                        $refresh = "refresh:6; url={$_SERVER['PHP_SELF']}?pagina=1" ;
                                                        header($refresh);*/
                                                        

                                               // }
                                            
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
                                                $rs = $controller->lista_ramais("");
                                                echo '<meta http-equiv="refresh" content="10" />';
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

                                                if($ramal->getSnVisutaliza() == 'S'){
                                                     $checked = "checked";   
                                                }else{
                                                     $checked = "";   
                                                }

                                                echo "<tr bgcolor=$par >";

                                                echo "<td>".$ramal->getSetor()."</td>";
                                                echo "<td>".$ramal->getNrRamal()."</td>";
                                                ?>
                                        <td>
                                           <center>  <input type="checkbox" name="visualiza" <?php echo $checked; ?>  ></center>
                                             </td>
                                            <?php
                                                echo "<td><a href='#?id=".$ramal->getCodigo()."'> <img src='../img/alterar.png'></td>";
                                                echo "<td><a href='#?id=".$ramal->getCodigo()."'> <img src='../img/excluir.png'></td>";        
                                                

                                                echo "</tr>";
                                                
                                            }
                                        
                                            
                       
                    ?>
                                            <tbody>              
                      </table>    
                  </div>
                </div>
                                  
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