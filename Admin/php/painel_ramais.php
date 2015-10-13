<article class="module width_3_quarter painel_ramais">
		<header>
		<h3 class="tabs_involved">Cadastros recentes de Ramais</h3>
		<ul class="tabs">
   			<li><a href="#tab1" id="tab3">Mostrar</a></li>
    		<li><a href="#tab2" id="tab2">Ocultar</a></li>
		</ul>
		</header>
        

		<div class="tab_container">
			<div id="tab1" class="">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   			
    				<th>Setor</th> 
    				<th>Ramal</th> 
    				<th width="100px" align="center">Responsável</th>
                                <th align="center">Visivel</th> 
    				<th align="center">Editar</th> 
                    <th align="center">Excluir</th>
                    
				</tr> 
			</thead> 
			<tbody> 
                            <?php 
                            
                                            include_once '../controller/Ramal_Controller.class.php';                                           
                                            include_once '../services/RamalList.class.php';
                                            include_once '../services/RamalListIterator.class.php';
                                            $controller = new Ramal_Controller();
                                         
                                             //   echo 'não é maior que o total';
                                            $rs = $controller->lista_ramais1("");
                                           
                                            
                                            // se página maior que 1 (um), então temos link para a página anterior

                                           
                                            $ramalList = new RamalListIterator($rs);
                                            $ramal = new Ramal();                                        
                                     
                                           while($ramalList->hasNextRamal()){
                                                
                                               $ramal = $ramalList->getNextRamal();
                                             
                                                if($ramal->getSnVisutaliza() == 'S'){
                                                     $checked = "checked";   
                                                }else{
                                                     $checked = "";   
                                                }
                                            ?>
                            
                                                <tr  >
                                                
                                                        <td><?php echo $ramal->getSetor(); ?></td>
                                                        <td><?php echo $ramal->getNrRamal(); ?></td>

                                                       
                                                        <td><?php echo $ramal->getResponsavel(); ?></td>
                                                        <td>
                                                           <center>  <input type="checkbox" name="visualiza" <?php echo $checked; ?>  ></center>
                                                        </td>
                                                         <input type="hidden" id="cod" value="<?php echo $ramal->getCodigo(); ?>">
                                                         <input type="hidden" id="opcao" value="A">

                                                         <td align="center"><a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade"><input type="image" src="images/icn_edit.png" title="Editar" name="editar" id=""></a></td>
                                                         <td align="center"><input type="image" src="images/icn_trash.png" title="excluir" name="excluir" id=""></td>

                                                </tr>
                                          <?php
                                           }
                                          ?>
                            
                            
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
			<div id="tab2" class="tab_content">
			

			</div><!-- end of #tab2 -->
			
		</div><!-- end of .tab_container -->
		
</article>