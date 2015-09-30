<article class="module width_full">
			<header>
			  <h3>Cadastro de Usuários</h3></header>
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

                <form class="form-horizontal cardapio" action="php/action_usuarios.php" method="post" name="usuarios">
  <div class="control-group">
    <label class="control-label" for="usuarioNome">Nome completo:</label>
    <div class="controls">
      <input type="text" style="width:61.5%" name="usuarioNome" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="usuarioUser">Nome de Usuário</label>
    <div class="controls">
      <input type="text" style="width:61.5%" name="usuarioUser" />
    </div>
  </div>
 
  
  <div class="control-group">
    <label class="control-label" for="usuarioRestricao">Nível de Restrição</label>
    <div class="controls">
							<select style="width:62%;" name="usuarioRestricao">
                            <option>Selecione</option>
								<option>Administrador</option>
								<option>Nutricao</option>
								<option>Telefonia</option>
							</select>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="usuarioSenha">Senha</label>
    <div class="controls">
      <input type="password" style="width:61.5%" name="usuarioSenha" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="usuarioConfsenha">Confirmar Senha</label>
    <div class="controls">
      <input type="password" style="width:61.5%" name="usuarioConfsenha" />
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