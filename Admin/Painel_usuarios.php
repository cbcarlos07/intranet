<article class="module width_3_quarter">
		<header>
		<h3 class="tabs_involved">Cadastros recentes de usuários</h3>
		<ul class="tabs">
   			<li><a href="#tab1">Piasts</a></li>
    		<li><a href="#tab2">Comentario</a></li>
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
    				<th>Nível</th>
                    <th>Senha</th> 
    				<th>Editar</th> 
                    <th>Excluir</th>
                    <th>Link</th>
				</tr> 
			</thead> 
			<tbody> 
            <?php include 'php/consulta_user.php';?>
            <?php while ($dados = mysqli_fetch_array($query1)) {?>
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td><?php echo $dados['nome']; ?></td> 
    				<td><?php echo $dados['usuario']; ?></td> 
    				<td><?php echo $dados['nivel']; ?></td> 
                    <td><?php echo $dados['senha']; ?></td>
                    <td><a href="#" class="big-link" data-reveal-id="myModal" data-animation="fade"><input type="image" src="images/icn_edit.png" title="Edit"></a></td>
    				<td><input type="image" src="images/icn_trash.png" title="Trash"></td>
                    <td><input type="image" src="images/icn_trash.png" title="Trash"></td>  
				</tr> 
             <?php } ?>
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