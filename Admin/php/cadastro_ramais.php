<article class="module width_full painel2">
			<header>
			  <h3>Cadastro de Ramais</h3></header>
              <div class="module_content">
						<fieldset>
							<label>Titulo</label>
							<input type="text">
						</fieldset>
						
						<!--<fieldset style="width:48%; float:left; margin-right: 3%;"> 
							<label>Categoria</label>
							<select style="width:92%;">
								<option>Artigos</option>
								<option>Tutoriais</option>
								<option>fsdfsdf</option>
							</select>
						</fieldset>-->
						<!--<fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<!--<label>Tags</label>
							<input type="text" style="width:92%;">
						</fieldset><div class="clear"></div>-->
		  </div>
			<div class="module_content">

                <form class="form-horizontal cardapio" action="php/action_usuarios.php" method="post" name="card">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Número do Ramal</label>
    <div class="controls">
      <input type="text" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Descricao</label>
    <div class="controls">
      <input type="text" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Setor</label>
    <div class="controls">
      <input type="text" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Caldos</label>
    <div class="controls">
      <textarea rows="3" cols="80" name="caldos"></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Sobremesa</label>
    <div class="controls">
      <textarea rows="3" cols="80" name="sobremesa"></textarea>
    </div>
  </div>
  
  <div align="center">
  <input type="submit" value="enviar">
 <!-- <button class="btn btn-success btn_tamanho">Cadastrar</button>
  <button class="btn btn-success btn_tamanho">Limpar</button>
  </div>-->
</form>
                <div class="clear"></div>
			</div>
	  </article>