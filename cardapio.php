<!doctype html>
<html>

<link rel="shortcut icon" href="img/ham.png">
<script type="text/javascript" src="js/tooltip.js"></script>
<script>
function pegarDataAtual(){
   data = new Date();
   document.getElementById('data').value = data.getDay()+'/'+data.getMonth()+'/'+data.getFullYear();
}
</script>
<link rel="stylesheet" href="css/cardapio.css">

<?php require ('include/head.php')?>

<body onload="pegarDataAtual()">
<!---menu--->
<?php include 'include/menu.php';
    session_start();
         
       $data;  
       $tipo_refeicao = 0;
       $_SESSION['disable'] = 'disabled=""';
         if(isset($_POST['tipo'])){
             $tipo_refeicao = $_POST['tipo'];
             $_SESSION['tipo_refeicao'] = $tipo_refeicao;
               
         }
         
        if(!isset($_POST['datepicker'])){
                    $data = date('d/m/Y');
                    $_SESSION['data'] = $data;
                }else{
                    $data = $_POST['datepicker'];
                    $_SESSION['data'] = $data;
                }
                
         

                    
?>


        <link href="./css/jquery.datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/cardapio.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />

        
       
        
        <style>
  /* Style to reverse the caret icon from pointing downwards to upwards */
  .caret.caret-up {
    border-top-width: 0;
    border-bottom: 4px solid #fff;
  }
  </style>
         
  <div class="container">
     
      <div class="col-xs-12 col-sm-6 col-md-6  "> <br>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="tipo_refeicao" name="tipo_refeicao"  >
          <div class="col-xs-12 col-sm-12 col-md-5 ">
              <div class="form-group">
                <label for="data">Consultar outra data</label>
                <input type="text" name="datepicker" id="datepicker" value="<?php echo $data;  ?>" size="10" class="form-control data-agenda"  />
            </div>
          </div>
          
          <div class="col-xs-12 col-sm-6 col-md-6  ">
                
                    
                    <div class="btn-group-vertical" data-toggle="buttons">
                                  <?php 
                                              require_once './controller/Tipo_Refeicao_Controller.class.php';
                                              require_once './services/TipoListIterator.class.php';
                                              $tc = new Tipo_Refeicao_Controller();
                                              $rs = $tc->lista_tipo("");
                                              $i = 0;
                                              $tipoList = new TipoListIterator($rs);
                                              $tipo = new Tipo_Refeicao();
                                              while($tipoList->hasNextTipo()){
                                                  $tipo = $tipoList->getNextTipo();

                                  ?>
                                              <label class="btn btn-default ">
                                                  <input type="radio"  class="radio" name="tipo"  value="<?php echo $tipo->getCodigo(); ?>"><?php echo $tipo->getDescricao(); ?>
                                              </label>
                                  <?php } // fim do enquanto
                                  ?>            
                    </div>
                
            </div>
          </form> 
          <br>
          <br>
          <br>
          <br>
          <hr />
          <!-- ESPACO PARA NOVA AREA -->
            <!-- formulario  -->
       <br>
          <div class="row linhaPersonalizada dropdown">
              <?php 
              if($tipo_refeicao > 0){
                     include './controller/CPP_Controller.class.php';
                     
                     $cpc = new CPP_Controller();
                     $cd_cardapio = $cpc->recuperar_cardapio($tipo_refeicao, $data);
                     //$cd_cardapio = $cpc->recuperar_cardapio($tipo_refeicao, date('d/m/Y', strtotime($data)));
                     
                     
                      if($cd_cardapio > 0){
                           $_SESSION['disable'] = '';
                      }else {
                           $_SESSION['disable'] = 'disabled=""';
                      } 
              }      
              ?>
              <button class="btn btn-primary btn-calendario"  <?php echo  $_SESSION['disable']; ?>  onclick="mostrar()">Agendar</button>
              <br>
              <br>
              <div id="oculto" style="display:none;" class="row">
                  <form method="post" action="" id="agenda_form">
                      <input type="hidden" name="cardapio" id="cd_card" value="<?php echo $cd_cardapio; ?>">
                      <div class="form-group col-md-5">
                          <label for="codigo">C&oacute;digo do Crach&aacute;</label>
                          <input type="text" name="codigo" id="cracha" class="form-control" onfocusout="buscar()"> 
                      </div>
                      <div class="col-md-7"></div>
                      <div class="form-group col-md-10">
                          <label for="nome">Nome</label>
                          <input type="text" name="nome" id="nm_func" class="form-control" style="text-transform: uppercase;" > 
                      </div>
                      <div class="col-md-2"></div>
                      <div class="col-md-10 btn-group">
                          <button type="submit" id="btn-agendar" class="btn btn-success" disabled="" onclick="salvar();">Confirmar Agendamento</button>
                          <button type="submit" id="btn-desagendar" class="btn btn-danger" disabled="" onclick="cancelar();">Cancelar Agendamento</button>
                      </div>
                      
                  </form>
             </div>
          </div>
       <!-- FORMULARIO  -->
          <!-- ESPACO PARA NOVA AREA -->
          
          
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 ">
          
       
       
       <!-- CARDAPIO  -->
          
          <?php 
      
     // echo $_SESSION['data'];
     // echo "<br>$tipo_refeicao";
      if($tipo_refeicao > 0){
                     include_once './controller/CPP_Controller.class.php';
                     include './bean/Tipo_Prato.class.php';
                     include './services/TPListIterator.class.php';
                     include './services/CPPListIterator.class.php';
                     include_once './controller/Tipo_Refeicao_Controller.class.php';
                     $cpc = new CPP_Controller();
                     $cd_cardapio = $cpc->recuperar_cardapio($tipo_refeicao, $data);
                     //$cd_cardapio = $cpc->recuperar_cardapio($tipo_refeicao, date('d/m/Y', strtotime($data)));
                     $trc = new Tipo_Refeicao_Controller();
                      
                     $tipoRefeicao = $trc->recuperar_tipo($tipo_refeicao);
                     //echo "Cardapio: $cd_cardapio";
                      $_SESSION['cardapio'] = $cd_cardapio;
                      //echo "<br>Cardapio: $cd_cardapio";
                      $tipo = new Tipo_Prato();
                      $rs1    = $cpc->lista_tipo_pratos($cd_cardapio);
                      $tpList = new TPListIterator($rs1);
                      if($tpList->hasNextTipo()){
                           $_SESSION['disable'] = '';
                      $cpp   = new Cardapio_Por_Prato();
            ?>
      
            
        
          <center><h3><b><?php echo $tipoRefeicao->getDescricao(); ?></b> <br></h3><h4><?php echo $data; ?></h4></center>
            <?php 
            
                                    while($tpList->hasNextTipo()){
                                   
                                        $tipo = $tpList->getNextTipo();
                                        $tipo_cd = $tipo->getCodigo();
                                        
                                            //    echo "Dentro do se";
                                                   
           ?>
            
            
            <div class="list-group">
                  <?php  $prato_desc = $tipo->getDescricao(); ?>          
                <a class="list-group-item active" data-toggle="collapse" href="#<?php echo $prato_desc; ?>" aria-expanded="false" aria-controls="collapsePrincipal">
                    <?php echo $prato_desc; ?>
                </a>
                
                <?php
                                        $tp = $tipo->getDescricao();
                                        $rs    = $cpc->lista_pratos($cd_cardapio, $tipo_cd);
                                        $cList = new CPPListIterator($rs);
                                       
                                                ?>
                                        <div  class="collapse in" id="<?php echo $prato_desc; ?>">
                                            <div class="card card-block ">
                                                <ul>
                                                    <?php
                                                     while($cList->hasNextCardapio()){
                                                        $cpp = $cList->getNextCardapio();
                                                        $v =  $cpp->getTipo_prato()->getDescricao();
                                                        if($v == $tp){
                                                    ?>
                                                    <?php $ingredientes = $cpp->getPrato()->getDs_ingrediente(); ?>
                                                    <a href="#" class="list-group-item lista-item" onmouseover="toolTip('<b>Ingredientes</b><br><?php echo $ingredientes; ?>', 300, 350)" onmouseout="toolTip()"><?php echo $cpp->getPrato()->getNome();  ?></a>                            
                                                       <?php
                                                            } // fim do se
                                                        }// fim enquanto de dentro
                                                     ?>
                                                </ul>
                                            </div>
                                        </div>
                
                
                                       

           </div>
            
            <?php 
                      
                    } // fim do enquanto de fora
            ?>
            
      
      <?php
                      } // fim do se
                      else{
                          
                          ?><br><br><br><br><br>
      <center><p><h3>N&atilde;o existe card&aacute;pio para esta data ou ainda n&atilde;o foi publicado</h3></p></center>
      <?php
                      }
      } // fim do se
      ?>
      
          
         
          
            <!-- CARDAPIO  -->
       
      </div>
      
      
  </div> 
         
      
      <script type="text/javascript">
      function mostraOcultaCalendario(el) {
            var display = document.getElementById(el).style.display;
            if(display == "block")
                document.getElementById(el).style.display = 'none';
            else
                document.getElementById(el).style.display = 'block';
        }
      </script>
      <script>
            $(document).ready(function(){
              $(".dropdown").on("hide.bs.dropdown", function(){
                $(".btn-calendario").html('Consultar outra data <span class="caret"></span>');
              });
              $(".dropdown").on("show.bs.dropdown", function(){
                $(".btn-calendario").html('Consultar outra data <span class="caret caret-up"></span>');
              });
            });
     </script>
      <script type="text/javascript">
           $('input[name=tipo]').change(function(){
                $('#tipo_refeicao').submit();

           });
         </script>
         
         <script type="text/javascript">
            function mostrar(){
                var display = document.getElementById('oculto').style.display;
                if(display == 'none'){
                  document.getElementById('oculto').style.display = 'block';
              }
               else{
                   document.getElementById('oculto').style.display = 'none';
               }
           }
          </script>
       
      
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.js"></script>
        
        <script language="javascript">
        function buscar( )
        {
                var val;
                var card;
                val = document.getElementById("cracha").value;
                card = document.getElementById("cd_card").value;
                jQuery.get( 'funcionario.php', {'codigo': val, 'card' : card}, function(data) {
                       // alert( 'response: ' + data.response +" codigo: "+val);
                        var x = document.getElementById("nm_func");
                        //alert(data.response);
                        console.log(data.response);
                        console.log(data.nome);
                        if(data.response == "1"){
                            alert("Crachá já agendado");
                            x.value= data.nome;
                            document.getElementById("btn-desagendar").disabled = false;
                            document.getElementById("btn-agendar").disabled = true;
                        }
                        else{
                            x.value= data.nome;
                            document.getElementById("btn-desagendar").disabled = true;
                            document.getElementById("btn-agendar").disabled = false;
                        }
                        
                },'json');
        }
        </script>
        <script src="js/jquery.min.js"></script>
     <script type="text/javascript" src="js/jquery.datetimepicker.full.js"></script>
     <script>
            
            $("#datepicker").datetimepicker({
                timepicker: false,
                format: 'd/m/Y',
                
            });
            $.datetimepicker.setLocale('pt-BR');
            
            
        </script>
        
	<script>
                function salvar() {
                    //jQuery(document).ready(function(){
                    jQuery('#agenda_form').submit(function(){
                                    //var dados = jQuery( this ).serialize();
                                    var cardapio = document.getElementById("cd_card").value;
                                    var cracha = document.getElementById("cracha").value;
                                    //var cracha = $('#cracha').value;
                                    var nome = document.getElementById("nm_func").value;
                                    //console.log("Cardapio: "+cardapio+" Cracha: "+cracha+" Nome: "+nome);    
                                    jQuery.ajax({
                                            type: "POST",
                                            url: "agendar.php",
                                            data: {
                                                'cardapio' : cardapio,
                                                'cracha'   : cracha,
                                                'nome'     : nome
                                            },
                                            success: function( data )
                                            {
                                                //var retorno = data.retorno;
                                                //alert(retorno);
                                                console.log("Data: "+data);
                                                if(data == 1){
                                                      alert("Agendamento realizado com sucesso");
                                                      document.getElementById("nm_func").value = "";
                                                      document.getElementById("cracha").value =  "";
                                                      document.getElementById("btn-desagendar").disabled = true;
                                                      document.getElementById("btn-agendar").disabled = true;
                                                      location.reload();
                                                  }
                                                  else{
                                                      alert ("Erro ao salvar");
                                                  }
                                            }
                                    });

                                    return false;
                            });
                    //});
                    
                    //document.getElementById("nm_func").value = "";
                    //document.getElementById("cracha").value =  "";
                    
                }
                
                
                
          </script>
          
          <script>
          function cancelar() {
                   // alert('Funcao cancelar chamada');
                   // jQuery(document).ready(function(){
                    jQuery('#agenda_form').submit(function(){
                                    //var dados = jQuery( this ).serialize();
                                    var cardapio = document.getElementById("cd_card").value;
                                    var cracha = document.getElementById("cracha").value;
                                    //var cracha = $('#cracha').value;
                                    
                                    //console.log("Cardapio: "+cardapio+" Cracha: "+cracha+" Nome: "+nome);    
                                    jQuery.ajax({
                                            type: "POST",
                                            url: "cancelar.php",
                                            data: {
                                                'cardapio' : cardapio,
                                                'cracha'   : cracha
                                                
                                            },
                                            success: function( data )
                                            {
                                                //var retorno = data.retorno;
                                                //alert(retorno);
                                                console.log("Data: "+data);
                                                if(data == 1){
                                                      alert("Agendamento excluido com sucesso");
                                                      document.getElementById("nm_func").value = "";
                                                      document.getElementById("cracha").value =  "";
                                                      document.getElementById("btn-desagendar").disabled = true;
                                                      document.getElementById("btn-agendar").disabled = true;
                                                      location.reload();
                                                  }
                                                  else{
                                                      alert ("Erro ao salvar");
                                                  }
                                            }
                                    });

                                    return false;
                            });
                   // });
                    
                    //document.getElementById("nm_func").value = "";
                    //document.getElementById("cracha").value =  "";
                    
                }
          </script>
          
         
</div>

</body>
</html>