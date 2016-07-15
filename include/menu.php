
<?php
        $url = "";
        $ip = gethostbyname($url);
       //$ip = $_SERVER['REMOTE_ADDR'];
        
       $index = 'http://'.$ip.'/intranet/';
       
       //echo "Index: ".$index;
      // echo "<br>IP: ".$ip;
       $inicio = $index."index.php";
       $cardapio = $index."cardapio.php";
       $ramais = $index."ramais.php";
       $outros = $index."/Admin/painel.php";
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
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css" />
   <div class="row">
<div class="topo ">
        <div class="logo">
            <img src="img/banner5.png"/>
        </div>
   </div>
</div>    

<div class="container">
    
<div class="lista1 row  "  >
    <div class="col-md-5 " id="elemento">
        <h1>Carregando</h1>
    </div>
    <div class="col-md-7  ">
        <div class="ramais">
            <a  href="http://soulmvlinks/ramais"><img src="img/ramais.png" class="img-responsive img-thumbnail sty"></a>
        </div>
    </div>
    
   
</div> 
</div>    


    <!--
    <ul class="listamenu">
        <div class="listas">
            <a href="<?php echo $outros; ?>"><li class="limenu"><font face="Zrnic">PAINEL</font></li></a>
            <a href="<?php echo $cardapio; ?>"><li class="limenu"><font face="Zrnic">CARDÁPIO</font></li></a>
            <a href="<?php echo $ramais; ?>"><li class="limenu"><font face="Zrnic">RAMAIS</font></li></a>
            <a href="<?php echo $inicio; ?> "><li class="ativo limenu"><font face="Zrnic">SISTEMAS</font></li></a>
        </div>
    
    </ul>
       </div>
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
<div class="topo">
	
    <div class="logo">
		<img src="img/banner5.png" />
    </div>
    <ul class="listamenu">
    <div class="listas">
            <a href="<?php echo $outros; ?>"><li class="limenu"><font face="Zrnic">PAINEL</font></li></a>
            <a href="<?php echo $cardapio; ?>"><li class="ativo limenu"><font face="Zrnic">CARDÁPIO</font></li></a>
            <a href="<?php echo $ramais; ?>"><li class="limenu"><font face="Zrnic">RAMAIS</font></li></a>
            <a href="<?php echo $inicio; ?> "><li class="limenu"><font face="Zrnic">SISTEMAS</font></li></a>
      </div>
         </ul>
    </div>
 
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
<div class="topo">
	
    <div class="logo">
		<img src="img/banner5.png" />
    </div>
       <ul class="listamenu">
         <div class="listas">
            <a href="<?php echo $outros; ?>"><li class="limenu"><font face="Zrnic">PAINEL</font></li></a>
            <a href="<?php echo $cardapio; ?>"><li class="limenu"><font face="Zrnic">CARDÁPIO</font></li></a>
            <a href="<?php echo $ramais; ?>"><li class="ativo limenu"><font face="Zrnic">RAMAIS</font></li></a>
            <a href="<?php echo $inicio; ?> "><li class="limenu"><font face="Zrnic">SISTEMAS</font></li></a>
        </div>
            </ul>
 </div>
 
      <?php
     }
      ?>

  <?php
function painel(){
     global $inicio;
     global $cardapio;
     global $ramais;
     global $outros;
    ?>

    <div class="topo">
	
    <div class="logo">
		<img src="img/banner5.png" />
    </div>
        <ul class="listamenu">
         <div class="listas">
            <a href="<?php echo $outros; ?>"><li class="ativo limenu"><font face="Zrnic">PAINEL</font></li></a>
            <a href="<?php echo $cardapio; ?>"><li class="limenu"><font face="Zrnic">CARDÁPIO</font></li></a>
            <a href="<?php echo $ramais; ?>"><li class="limenu"><font face="Zrnic">RAMAIS</font></li></a>
            <a href="<?php echo $inicio; ?> "><li class="limenu"><font face="Zrnic">SISTEMAS</font></li></a>
        </div>
      </ul>
    </div>
 -->
      <?php
     }
      ?>  
      





   