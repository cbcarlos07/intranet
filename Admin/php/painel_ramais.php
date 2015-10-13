<article class="module width_3_quarter painel_ramais">
		<header>
		<h3 class="tabs_involved">Cadastros Recentes de Ramais</h3>
		<ul class="tabs">
   			<li><a href="#tab1" id="tab4">Mostrar</a></li>
    		<li><a href="#tab2" id="tab5">Ocultar</a></li>
		</ul>
		</header>
        

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
    				<th>Setor</th> 
    				<th>Ramal</th> 
    				<th>Responsável</th>
                                <th>Visível</th> 
    				<th align="center">Editar</th> 
                                <th align="center">Excluir</th>
                    
				</tr> 
			</thead> 
			<tbody> 
                            <?php 
                            
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
                                            ?>
                            
                                                <tr bgcolor="<?php echo $par; ?>" >;
                                                
                                                        <td><?php echo $ramal->getSetor(); ?></td>
                                                        <td><?php echo $ramal->getNrRamal(); ?></td>;

                                                        ?>
                                                        <td><?php echo $ramal->getResponsavel(); ?></td>
                                                        <td>
                                                           <center>  <input type="checkbox" name="visualiza" <?php echo $checked; ?>  ></center>
                                                        </td>
                                                         <input type="hidden" id="cod" value="<?php echo $ramal->getCodigo(); ?>">
                                                         <input type="hidden" id="opcao" value="A">

                                                        <td align="center"><a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade"><input type="image" src="images/icn_edit.png" title="Editar" name="editar" id="<?php echo $ramal->getCodigo(); ?>"></a></td>
                                                        <td align="center"><input type="image" src="images/icn_trash.png" title="excluir" name="excluir" id="<?php echo $ramal->getCodigo(); ?>"></td> 

                                                </tr>
                                          <?php
                                           }
                                          ?>
   
             
             
             <!--<div id="myModal" class="reveal-modal">
			<h1 align="center">Excluir dados</h1>
			<article class="module width_full">
			<header>
			  <h3>Exclusão de Usuários</h3></header>
              <div class="module_content">
						
					
		  </div>
			<div class="module_content">

                <p>Você tem certeza que deseja excluir o usuário</p>
                <div class="clear"></div>
			</div>
	  </article>
			<a class="close-reveal-modal">&#215;</a>
		</div>-->
        
				<!--<tr> 
   					<td><input type="checkbox"></td> 
    				<td>asdfsdfsdf dsfsd s dfdst</td> 
    				<td>Artigos</td> 
    				<td>Setembro 2015</td> 
   				 	<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
                    <td><input type="image" src="images/icn_edit.png" title="Edit"></td>
                    <td><input type="image" src="images/icn_trash.png" title="Trash"></td>
				</tr>
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>asdfsdfsdf dsfsd s dfds</td> 
    				<td>Artigos</td> 
    				<td>Setembro 2015</td> 
    				<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
                    <td><input type="image" src="images/icn_edit.png" title="Edit"></td>
                    <td><input type="image" src="images/icn_trash.png" title="Trash"></td>
				</tr> 
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>asdfsdfsdf dsfsd s dfds</td> 
    				<td>Artigos</td> 
    				<td>Setembro 2015</td> 
   				 	<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
                    <td><input type="image" src="images/icn_edit.png" title="Edit"></td>
                    <td><input type="image" src="images/icn_trash.png" title="Trash"></td>
				</tr>
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>asdfsdfsdf dsfsd s dfdst</td> 
    				<td>Articles</td> 
    				<td>Setembro 2015</td> 
   				 	<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
                    <td><input type="image" src="images/icn_edit.png" title="Edit"></td>
                    <td><input type="image" src="images/icn_trash.png" title="Trash"></td>
				</tr>  
                <tr> 
   					<td><input type="checkbox"></td> 
    				<td>asdfsdfsdf dsfsd s dfdst</td> 
    				<td>Articles</td> 
    				<td>Setembro 2015</td> 
   				 	<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
                    <td><input type="image" src="images/icn_edit.png" title="Edit"></td>
                    <td><input type="image" src="images/icn_trash.png" title="Trash"></td>
				</tr> 
                <tr> 
   					<td><input type="checkbox"></td> 
    				<td>asdfsdfsdf dsfsd s dfdst</td> 
    				<td>Articles</td> 
    				<td>Setembro 2015</td> 

   				 	<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
                    <td><input type="image" src="images/icn_edit.png" title="Edit"></td>
                    <td><input type="image" src="images/icn_trash.png" title="Trash"></td>
				</tr> 
                <tr> 
   					<td><input type="checkbox"></td> 
    				<td>asdfsdfsdf dsfsd s dfdst</td> 
    				<td>Articles</td> 
    				<td>Setembro 2015</td> 
   				 	<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
                    <td><input type="image" src="images/icn_edit.png" title="Edit"></td>
                    <td><input type="image" src="images/icn_trash.png" title="Trash"></td>
				</tr> 
                <tr> 
   					<td><input type="checkbox"></td> 
    				<td>asdfsdfsdf dsfsd s dfdst</td> 
    				<td>Articles</td> 
    				<td>Setembro 2015</td> 
   				 	<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
                    <td><input type="image" src="images/icn_edit.png" title="Edit"></td>
                    <td><input type="image" src="images/icn_trash.png" title="Trash"></td>
				</tr> 
                <tr> 
   					<td><input type="checkbox"></td> 
    				<td>asdfsdfsdf dsfsd s dfdst</td> 
    				<td>Articles</td> 
    				<td>Setembro 2015</td> 
   				 	<td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td> 
                    <td><input type="image" src="images/icn_edit.png" title="Edit"></td>
                    <td><input type="image" src="images/icn_trash.png" title="Trash"></td>
				</tr> -->
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
			<div id="tab2" class="tab_content">
			

			</div><!-- end of #tab2 -->
			
		</div><!-- end of .tab_container -->
</article>