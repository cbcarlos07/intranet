<?php 
        $url = "";
        $ip = gethostbyname($url);
       //$ip = $_SERVER['REMOTE_ADDR'];
        
       $index = 'http://'.$ip.'/intranet/view/';
       
       //echo "Index: ".$index;
      // echo "<br>IP: ".$ip;
       $inicio = $index."inicio.php";
       $cardapio = $index."cardapio.php";
       $ramais = $index."ramais.php";
       $outros = $index."../Admin/painel.php";
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
     global $inicio;
     global $cardapio;
     global $ramais;
     global $outros;
     ?>
 
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">                      
                   <li><a class="menu active" href="<?php echo $inicio; ?> ">Sistemas</a></li>
                   <li><a class="menu " href="<?php echo $ramais; ?> ">Ramais</a></li>  
                   <li><a class="menu " href="<?php echo $cardapio; ?> ">Cardápio</a></li>
                   <li><a class="menu " href="<?php echo $outros; ?> ">Painel</a></li>
                    </ul>
                  </div><!-- /navbar-collapse -->
     <?php             
 }
 ?>
 
<?php
function cardapio(){
    global $inicio;
     global $cardapio;
     global $ramais;
     global $outros;
    ?>
 
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 <ul class="nav navbar-nav navbar-right">                      
                   <li><a class="menu " href="<?php echo $inicio; ?> ">Sistemas</a></li>
                   <li><a class="menu " href="<?php echo $ramais; ?> ">Ramais</a></li>
                     <li><a class="menu active" href="<?php echo $cardapio; ?> ">Cardápio</a></li>
                          
                      <li><a class="menu " href="<?php echo $outros; ?> ">Painel</a></li>
                    </ul>
                  </div><!-- /navbar-collapse -->
     <?php             
 }
 ?>
 
                  
                  
<?php
function ramais(){
    global $inicio;
     global $cardapio;
     global $ramais;
     global $outros;
     ?>
 
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 <ul class="nav navbar-nav navbar-right">                      
                   <li><a class="menu " href="<?php echo $inicio; ?> ">Sistemas</a></li>
                   <li><a class="menu active" href="<?php echo $ramais; ?> ">Ramais</a></li>
                     <li><a class="menu " href="<?php echo $cardapio; ?> ">Cardápio</a></li>
                          
                      <li><a class="menu " href="<?php echo $outros; ?> ">Painel</a></li>
                    </ul>
                  </div><!-- /navbar-collapse -->
     <?php             
 }
 ?>

                  <?php
function outros(){
    global $inicio;
     global $cardapio;
     global $ramais;
     global $outros;
     ?>
 
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 <ul class="nav navbar-nav navbar-right">                      
                   <li><a class="menu " href="<?php echo $inicio; ?> ">Sistemas</a></li>
                   <li><a class="menu " href="<?php echo $ramais; ?> ">Ramais</a></li>
                     <li><a class="menu " href="<?php echo $cardapio; ?> ">Cardápio</a></li>
                          
                      <li><a class="menu active" href="<?php echo $outros; ?> ">Painel</a></li>
                    </ul>
                  </div><!-- /navbar-collapse -->
     <?php             
 }
 ?>
    
   