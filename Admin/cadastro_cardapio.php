
<article class="module width_full painel1">
			<header>
			  <h3>Cadastro de cardapio</h3></header>
              <div class="module_content">
						<fieldset>
							<label>titulo</label>
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

                <form class="form-horizontal cardapio" action="php/action.php" method="post" name="card">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Prato Principal</label>
    <div class="controls">
      <textarea rows="3" cols="80" name="principal"></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Acompanhamento</label>
    <div class="controls">
      <textarea rows="3" cols="80" name="acompanhamento"></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Salada</label>
    <div class="controls">
      <textarea rows="3" cols="80" name="salada"></textarea>
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
  <div class="control-group">
    <label class="control-label" for="inputPassword">Sucos</label>
    <div class="controls">
      <textarea rows="3" cols="80" name="sucos"></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Outros</label>
    <div class="controls">
      <textarea rows="3" cols="80" name="outros"></textarea>
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
