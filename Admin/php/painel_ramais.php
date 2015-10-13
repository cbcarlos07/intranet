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
    				<th>Nome</th> 
    				<th>Usuário</th> 
    				<th width="100px" align="center">Nível</th>
                    <th>Senha</th> 
    				<th align="center">Editar</th> 
                    <th align="center">Excluir</th>
                    
				</tr> 
			</thead> 
			<tbody> 
            <?php include 'php/consulta_user.php';?>
            <?php while ($dados = mysqli_fetch_array($query1)) {?>
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td><?php echo $dados['nome']; ?></td> 
    				<td><?php echo $dados['usuario']; ?></td> 
    				<td width="100px" align="center"><?php echo $dados['nivel']; ?></td> 
                    <td><?php echo $dados['senha']; ?></td>
                    <td align="center"><a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade"><input type="image" src="images/icn_edit.png" title="Editar" name="editar" id="<?php echo $dados['idUser']?>"></a></td>
    				<td align="center"><input type="image" src="images/icn_trash.png" title="excluir" name="excluir" id="<?php echo $dados['idUser']?>"></td>
                     
				</tr> 
             <?php } ?>
             
            
             
             
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