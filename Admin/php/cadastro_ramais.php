                  <script type="text/javascript">
        function habilitaBtn () {
            var op = document.getElementById("opcao").value;

            if(op == "0")
            {
                    document.getElementById('setor').disabled=false;                    
                    document.getElementById('setor').focus();                    
            }

            else 
            {
                
                    document.getElementById('setor').disabled=true;              
                    document.getElementById('setor').value="";              
                    
                    
                    
                
            }
        }
    </script>
﻿<article class="module width_full painel2">
			<header>
			  <h3>Cadastro de Ramais</h3></header>
              <div class="module_content">
						<!--<fieldset>
							<label>Titulo</label>
							<input type="text">
						</fieldset>-->
						
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

                            <form class="form-horizontal cardapio" action="../services/acaoRamais.php" method="post" name="cadastro_ramais">
                                <input type="hidden" value="I" name="opcao">
  <div class="control-group">
    <label class="control-label" >Número do Ramal</label>
    <div class="controls">
      <input type="text"  name="nrramal" style="width:300px" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" >Responsável</label>
    <div class="controls">
      <input type="text" name="nmresponsavel" style="width:300px" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Setor</label>
    <div class="controls">
     <select name="setor" onchange="habilitaBtn()" id="opcao" >
          <?php
          include '../controller/Ramal_Controller.class.php';
            include '../services/SetorListIterator.class.php';
            include '../bean/Ramal.class.php';
            $ramalController = new Ramal_Controller();
            $setores = $ramalController->getSetor();
            $setorList = new SetorListIterator($setores);
            $setor = new Setor();
            while ($setorList->hasNextSetor()) {


              $setor = $setorList->getNextSetor();
              $strSetor = $setor->getNome();              
              echo "<option value=" . $setor->getCodigo() . "  >" . $strSetor . "</option>";
          }
          
          ?>
           <option value="0" >N&Atilde;O EST&Aacute; NA LISTA</option>
      </select>
    </div>
  </div>
<div class="control-group">
    <label class="control-label" for="inputEmail"></label>
    <div class="controls">
        <input type="text" name="nmsetor" id="setor" style="width:300px" />
    </div>
</div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Visualiza</label>
    <div class="controls">
      <input type="checkbox" name="visualiza" value="S"/>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Apelido</label>
    <div class="controls">
      <textarea rows="3" cols="40.5" name="apelido"></textarea>
    </div>
  </div>
  
 
  <input type="submit" value="salvar" style="float:left" />
  <input type="submit" value="limpar campos" />
  
 <!-- <button class="btn btn-success btn_tamanho">Cadastrar</button>
  <button class="btn btn-success btn_tamanho">Limpar</button>
  </div>-->
</form>
                <div class="clear"></div>
			</div>
	  </article>