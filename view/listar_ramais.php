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
                                  <A HREF="cadastrar_ramais.php?opcao=I"><h3> CADASTRAR RAMAIS   </H3>  </A>
                         
                          
                               <table border=1  id="tabela">
                                       <tr >
                                          <td>Setor</TD><TD>Ramal</TD><td>Responsavel</td><TD>Visivel</TD><TD>Alterar</TD><TD>Excluir</TD>                                                 
                                      </tr>
                                        <tbody>
                                            <?php
                                             session_start();
                                             //inicia uma sessão
                                          
                                            if(!isset($_SESSION['login']))
                                            {
                                               // $_SESSION['login'] = $this->usuario;
                                                header("Location:../login/");
                                                //echo 'não havia sessão ativa';
                                            }else{
                                                
                                        
                                            include_once '../controller/Ramal_Controller.class.php';
                                            include '../bean/Ramal.class.php'; 
                                            include_once '../services/RamalList.class.php';
                                            include_once '../services/RamalListIterator.class.php';
                                            $controller = new Ramal_Controller();

                                               
                                            





                                         
                                             //   echo 'não é maior que o total';
                                                $rs = $controller->lista_ramais1("");
                                           
                                            
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
                                        <td><?php echo $ramal->getResponsavel(); ?></td>
                                        <td>
                                           <center>  <input type="checkbox" name="visualiza" <?php echo $checked; ?>  ></center>
                                             </td>
                                             <input type="hidden" id="cod" value="<?php echo $ramal->getCodigo(); ?>">
                                             <input type="hidden" id="opcao" value="A">
                                             
                                            <?php
                                                //echo "Codigo: na lista: ".$$ramal->getCodigo();
                                                echo "<td><a href='cadastrar_ramais.php?id=".$ramal->getCodigo()."&opcao=A' > <img src='../img/alterar.png'></td>";
                                                echo "<td><a href='../services/acaoRamais.php?opcao=E&id=".$ramal->getCodigo()."'  onclick=\" return verifica('Tem certeza de que deseja excluir o item selecionado?');\" > <img src='../img/excluir.png'></td>";        
                                                

                                                echo "</tr>";
                                                
                                            }
                                        
                                            
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

