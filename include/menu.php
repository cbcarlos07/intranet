<?php 
       $index = "index.php";
       $cardapio = "cardapio.php";
       $ramais = "ramais.php";
       $outros = "outros.php";
   function menu($opcao){
       
       switch ($opcao){
           case 1:
               sistemas();            
               break;
           case 2:
               cardapio();
              
               break;
           case 3:
               ramais();
               break;
           case 4:
               outros();
               break;
       }  
  }
 
 
 
 function sistemas(){
     global $index;
     global $cardapio;
     global $ramais;
     global $outros;
     ?>
 
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">                      
                   <li><a class="menu active" href="<?php echo $index; ?> ">Sistemas</a></li>
                     <li><a class="menu " href="<?php echo $cardapio; ?> ">Cardápio</a></li>
                          <li><a class="menu " href="<?php echo $ramais; ?> ">Ramais</a></li>
                      <li><a class="menu " href="<?php echo $outros; ?> ">Outros</a></li>
                    </ul>
                  </div><!-- /navbar-collapse -->
     <?php             
 }
 ?>
 
<?php
function cardapio(){
    global $index;
     global $cardapio;
     global $ramais;
     global $outros;
    ?>
 
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 <ul class="nav navbar-nav navbar-right">                      
                   <li><a class="menu " href="<?php echo $index; ?> ">Sistemas</a></li>
                     <li><a class="menu active" href="<?php echo $cardapio; ?> ">Cardápio</a></li>
                          <li><a class="menu " href="<?php echo $ramais; ?> ">Ramais</a></li>
                      <li><a class="menu " href="<?php echo $outros; ?> ">Outros</a></li>
                    </ul>
                  </div><!-- /navbar-collapse -->
     <?php             
 }
 ?>
 
                  
                  
<?php
function ramais(){
    global $index;
     global $cardapio;
     global $ramais;
     global $outros;
     ?>
 
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 <ul class="nav navbar-nav navbar-right">                      
                   <li><a class="menu " href="<?php echo $index; ?> ">Sistemas</a></li>
                     <li><a class="menu " href="<?php echo $cardapio; ?> ">Cardápio</a></li>
                          <li><a class="menu active" href="<?php echo $ramais; ?> ">Ramais</a></li>
                      <li><a class="menu " href="<?php echo $outros; ?> ">Outros</a></li>
                    </ul>
                  </div><!-- /navbar-collapse -->
     <?php             
 }
 ?>

                  <?php
function outros(){
    global $index;
     global $cardapio;
     global $ramais;
     global $outros;
     ?>
 
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 <ul class="nav navbar-nav navbar-right">                      
                   <li><a class="menu " href="<?php echo $index; ?> ">Sistemas</a></li>
                     <li><a class="menu " href="<?php echo $cardapio; ?> ">Cardápio</a></li>
                          <li><a class="menu " href="<?php echo $ramais; ?> ">Ramais</a></li>
                      <li><a class="menu active" href="<?php echo $outros; ?> ">Outros</a></li>
                    </ul>
                  </div><!-- /navbar-collapse -->
     <?php             
 }
 ?>
    
   