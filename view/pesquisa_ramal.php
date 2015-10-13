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
                                  <div id="pesq">
                                                    <form action="pesquisa_ramal.php" method="post" id="maiuscula">
                                                                <input name="pesquisa" placeholder="Pesquise aqui">
                                                                <input type="submit" value="Pesquisar">
                                                    </form>
                                             </div>
                         
                          
                              
                                            <?php
                                            $pesquisa = strtoupper($_POST['pesquisa']);
                                          /*  extract($_POST);
                                            $pesquisa = $texto;
                                            */
                                            include_once '../controller/Ramal_Controller.class.php';
                                            include '../bean/Ramal.class.php'; 
                                            include_once '../services/RamalList.class.php';
                                            include_once '../services/RamalListIterator.class.php';
                                            $controller = new Ramal_Controller();
                                            $total = $controller->total_pesquisa($pesquisa);
                                            if($total == 0){  
                                                ?>
                                  <h3>Não foi encontrado nenhum dado referente à pesquisa</h3>
                                  <?php
                                  
                                            }else{ // casp o total encontrado seja maior do que zero
                                             ?>
                                    <table border=1  id="tabelap">
                                                        <tr >
                                                            <td>Setor</TD><TD>Ramal</TD><td>Responsavel</td>

                                                       </tr>
                                                         <tbody>
                                                             
                           <?php                                  
                                            }
                                            $rs = $controller->lista_ramais($pesquisa, 0, $total);

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
                                        <td><?php echo $ramal->getResponsavel(); ?></td>
                                        
                                     <?php           
                                            }
                                        
                                            
                       
                    ?>
                                            <tbody>              
                      </table>    
                  </div>
                            <script>
                                        $(function(){
                                            $('input[type=submit]').click(function(){
                                                

                                            $.ajax({
                                                    type      : 'post',

                                                    url       : 'cadastrar_ramais.php',

                                                    data      : 'id='+ $('#cod').val() +'&opcao='+ $('#opcao').val,

                                                    dataType  : 'html',

                                                    success : function(txt){
                                                            $('body p').html(txt);
                                                        }
                                                });

                                                });
                                            });
                                        </script>
                                        <script language=javascript>
                                           function verifica(Msg)
                                                {
                                                 return confirm(Msg) ;
                                                }
                                            </script>
                                  
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

