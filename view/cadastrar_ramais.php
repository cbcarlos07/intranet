<!DOCTYPE html>


<html lang="en">
<?php include '../include/header.php'; ?>
    <body onload="habilitaBtn()">
	
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
<?php
  if(isset($_GET['opcao'])){
      $opcao = $_GET['opcao'];
      
  }else{
      $opcao = isset($_POST['opcao']);
  }

  if($opcao == 'I'){
      $strAcao = "CADASTRAR RAMAL";
  }else{
      $strAcao = "ALTERAR RAMAL";
  }
?>
    
    <section class="about text-center" id="about">
				<div class="container">
                                    
                                   
                                      
                                     <h2> <?php echo $strAcao;   ?></H2>  
                                     <A HREF="listar_ramais.php"><h3> LISTAR RAMAIS   </H3>  </A>
                                     <div id="tabela">
                                         <form action="../services/acaoRamais.php" method="post">
                                             <input type="hidden" name="opcao" value="I"> 
                                      <table>
                                          <tr>
                                              <td >* Número do Ramal:</td><td><input name="ramal" size="34"></td>
                                          </tr>
                                          <tr>
                                              <td>Responsável</td><td><input name="descr" placeholder="opcional" size="34" height="10"></td>
                                          </tr>
                                          <tr>
                                              <td>Setor</td>
                                              <td>
                                                  <select name="setor" onchange="habilitaBtn()" id="opcao" >
                                                        <?php
                                                               include '../controller/Ramal_Controller.class.php';
                                                               include '../services/SetorListIterator.class.php';
                                                               $ramal = new Ramal_Controller();
                                                               $setores = $ramal->getSetor();
                                                               $setorList = new SetorListIterator($setores);
                                                               $setor = new Setor();
                                                               while($setorList->hasNextSetor())
                                                                {
                                                                   $setor = $setorList->getNextSetor();
                                                                   echo "<option value=".$setor->getCodigo().">".$setor->getNome()."</option>";
                                                                 }
                                                         ?>
                                                      <option value="0">N&Atilde;O EST&Aacute; NA LISTA</option>
                                                  </select>
                                                  
                                              </td>
                                          </tr>
                                          <tr>
                                              <td> </td><td><input  id="setor" size="34" name="nm_setor" disabled="true" class="maiuscula" ></td>
                                          </tr>
                                           <tr>
                                               <td>Visualiza? </td><td><input type="checkbox" checked="true" name="visualiza"></td>
                                          </tr>
                                           <tr>
                                               <td>Apelido </td><td><textarea rows="5" cols="36" name="apelido" class="maiuscula"></textarea></td>
                                          </tr>
                                          <tr>
                                          
                                              <td colspan="2"><center><input type="submit" value="Salvar">&nbsp;&nbsp;<input type="reset" value="Limpar campos"></center></td>
                                              
                                          </tr>
                                      </table>
                                  </form>
                                         </div>
                                   
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