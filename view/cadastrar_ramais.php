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
 include '../controller/Ramal_Controller.class.php';
include '../services/SetorListIterator.class.php';
include '../bean/Ramal.class.php';
$ramalController = new Ramal_Controller();
$setores = $ramalController->getSetor();
$setorList = new SetorListIterator($setores);
$setor = new Setor();
$opcao = $_GET['opcao'];
//echo "Opcao escolhida: ".$opcao."<br>";
  if($opcao == 'I'){
      $strAcao = "CADASTRAR RAMAL";
       $selected = "";
  }else{
      $strAcao = "ALTERAR RAMAL";      
      $id = $_GET['id'];
      
    //  echo "Codigo do ramal: ".$id."<br>";
      $ramal = new Ramal();
      $ramal = $ramalController->recuperar_ramal($id);
      
  }
?>
    
    <section class="about text-center" id="about">
				<div class="container">
                                    
                                   
                                      
                                     <h2> <?php echo $strAcao;   ?></H2>  
                                     <A HREF="listar_ramais.php"><h4> LISTAR RAMAIS   </H4>  </A>
                                     <div id="tabela">
                                         <form action="../services/acaoRamais.php" method="post">
                                             <input type="hidden" name="opcao" value="<?php echo $opcao; ?>"> 
                                            <?php 
                                            if($opcao == 'A'){
                                                ?>
                                             <input type="hidden" name="cdramal" value="<?php echo $id; ?>"> 
                                           <?php  
                                            }
                                            ?>
                                             
                                             <?php 
                                               if($opcao == 'A'){
                                                   $nrRamal = " value='".$ramal->getNrRamal()."' ";
                                                   $nmResp = " value=".$ramal->getResponsavel()." ";
                                                   if($ramal->getSnVisutaliza() == 'S'){
                                                       $visualiza = " checked=true ";
                                                   }else{
                                                       $visualiza = "";
                                                   }
                                                   if($ramal->getDsApelido() != ""){
                                                       $apelido = $ramal->getDsApelido();
                                                   }else{
                                                       $apelido = " ";
                                                   }
                                                   
                                                   $cdSetor = $ramal->getCdSetor();
                                                  // echo "Apelido: ".$apelido."<br>";
                                                  // echo "Codigo setor:   ".$cdSetor."<br>";
                                               }else{
                                                   $nrRamal = "";
                                                   $nmResp = "";
                                                   $visualiza = " checked=true ";
                                                   $apelido = "";
                                                   
                                               }
                                             ?>
                                      <table>
                                          <tr>
                                              <td >* Número do Ramal:</td><td><input name="ramal" size="34" <?php echo $nrRamal; ?></td>
                                          </tr>
                                          <tr>
                                              <td>Responsável</td><td><input class="maiuscula"  name="descr" placeholder="opcional" size="34" height="10" <?php echo $nmResp; ?>></td>
                                          </tr>
                                          <tr>
                                              <td>Setor</td>
                                              <td>
                                                  
                                                  <select name="setor" onchange="habilitaBtn()" id="opcao" >
                                                        <?php
                                                            
                                                               $selected = "";
                                                               
                                                               while($setorList->hasNextSetor())
                                                                {
                                                                   
                                                                   
                                                                   $setor = $setorList->getNextSetor();
                                                                   $strSetor = $setor->getNome();
                                                                   if($opcao == "A")
                                                                       {
                                                                       
                                                                           if($cdSetor == $setor->getCodigo()){
                                                                               $selected = "selected";
                                                                       
                                                                           }else{
                                                                               $selected = "";
                                                                           }
                                                                           
                                                                       }
                                                                   echo "<option value=".$setor->getCodigo()." ".$selected." >".$strSetor."</option>";
                                                                 }
                                                                 if($opcao == "A"){
                                                                     if($cdSetor == 0){
                                                                         $selected = "selected";
                                                                     }
                                                                 }
                                                         ?>
                                                        
                                                          <option value="0" <?php echo $selected; ?>  >N&Atilde;O EST&Aacute; NA LISTA</option>
                                                      
                                                      
                                                  </select>
                                                  
                                              </td>
                                          </tr>
                                          <tr>
                                              
                                              <?php
                                              $nmSetor = "";
                                              if($opcao == "A"){
                                                  
                                                  if($cdSetor == 0){
                                                      $nmSetor = "value='".$ramal->getSetor()."' ";
                                                      ?>
                                          <input type="hidden" name="cdsetor" value="0"/>
                                              <?php
                                                  }
                                              }
                                              
                                              ?>
                                              <td> </td><td><input  id="setor" size="34" name="nm_setor" disabled="true" class="maiuscula" <?php echo $nmSetor; ?> ></td>
                                              
                                          </tr>
                                           <tr>
                                               <td>Visualiza? </td><td><input type="checkbox" <?php echo $visualiza; ?> name="visualiza"></td>
                                          </tr>
                                           <tr>
                                               <td>Apelido </td><td><textarea rows="5" cols="36" name="apelido" class="maiuscula" ><?php  echo $apelido; ?></textarea></td>
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