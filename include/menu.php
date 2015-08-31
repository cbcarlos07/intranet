<?php 
       $sistemas = "active";
       $cardapio = "active";
       $ramais = "active";
       $outros = "active";
   function menu($opcao){
       global $sistemas, $cardapio, $ramais, $outros;
       switch ($opcao){
           case 1:
              $sistemas = "";
               break;
           case 2:
               $cardapio = "";
               break;
           case 3:
               $ramais = "";
               
               break;
           case 4:
               $outros = "";
               break;
       }  
  }
  
?>
 <!-- Colete as ligações nav, formulários e outros conteúdos para alternar -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a class="menu active" href="#home" >Início</a></li> -->
        <?php echo "Ramais: ".$ramais; ?>
        <li><a class="menu <?php  echo $sistemas; ?>" href="index.html">Sistemas</a></li>
        <li><a class="menu <?php  $cardapio; ?>" href="cardap.html">Cardápio </a></li>
        <li><a class="menu <?php echo $ramais; ?>" href="ramais.php">Ramais</a></li>
        <li><a class="menu <?php  $outros; ?>" href="#contact">Outros</a></li>
      </ul>
    </div><!-- /navbar-collapse -->
    
    