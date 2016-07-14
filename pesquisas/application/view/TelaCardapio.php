<html>
    <head>
        <title>Pesquisa de Cardapio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../public/css/pagina.css" media="screen" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="esquerdo">
            
        
        </div>
        <div id="menu">
                    <ul>
                        <li><A href="http://10.51.28.7/intranet/?page_id=882">CADASTRO DE CARD&Aacute;PIO&nbsp;&nbsp;&nbsp;&nbsp;</A></li>

                    </ul>
              </div> 
        <div id="direito">
            
        </div>
        
            
        
                                <div id="centro">
                                     <div id="conteudo">
                                                <div>
                                                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
                                                            <table>
                                                                <tr>
                                                                    <td><input name="pesq" placeholder="DIGITE O T&Iacute;TULO EX. SEXTA" size="50"></td><TD><INPUT type="SUBMIT" VALUE="PESQUISAR" ></TD>
                                                                </tr>
                                                            </table>
                                                    </form>
                                                </div>
                                                <div id="resultado">
                                                    <table>
                                                        <thead>
                                                            <tr id="titulo" >
                                                                <td>TITULO</TD><TD>DESCRI&Ccedil;&Atilde;O</TD><TD>DATA</TD>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                if(isset($_POST['pesq'])){
                                                                    $setor = $_POST['pesq'];

                                                                    include '../controller/Cardapio_Controller.class.php';
                                                                    include '../services/CardapioListIterator.class.php';
                                                                    include '../beans/Cardapio.class.php';
                                                                    $rc =  new Cardapio_Controller();
                                                                    $lista = $rc->pesquisa(strtoupper($setor));
                                                                    $cardapioIterator = new CardapioListIterator($lista);
                                                                    $cardapio = new Cardapio();
                                                                    $i = 0;
                                                                    while ($cardapioIterator->hasNextCardapio()){
                                                                        $i++;
                                                                                       $cardapio = $cardapioIterator->getNextCardapio();
                                                                                      if($i % 2 == 0){
                                                                                          $par = "#d5e6ef";
                                                                                      }else{
                                                                                          $par = "#ffffff";
                                                                                      }
                                                                               
                                                                               
                                                                                    echo "<tr bgcolor=$par >";
                                                                                    echo "<td align=center>".$cardapio->getTitulo()."</td>";
                                                                                    echo "<td align=center>".$cardapio->getDescricao()."</td>";
                                                                                    echo "<td align=center>".$cardapio->getDtCardapio()."</td>";
                                                                                    echo "</tr>";               
                                                                                    
                                                                    }
                                                                }else{
                                                                    $setor = $_POST['pesq'];

                                                                    include '../controller/Cardapio_Controller.class.php';
                                                                    include '../services/CardapioListIterator.class.php';
                                                                    include '../beans/Cardapio.class.php';
                                                                    $rc =  new Cardapio_Controller();
                                                                    $lista = $rc->pesquisa(strtoupper($setor));
                                                                    $cardapioIterator = new CardapioListIterator($lista);
                                                                    $cardapio = new Cardapio();
                                                                    $i = 0;
                                                                    while ($cardapioIterator->hasNextCardapio()){
                                                                        $i++;
                                                                                       $cardapio = $cardapioIterator->getNextCardapio();
                                                                                      if($i % 2 == 0){
                                                                                          $par = "#d5e6ef";
                                                                                      }else{
                                                                                          $par = "#ffffff";
                                                                                      }
                                                                               
                                                                               
                                                                                    echo "<tr bgcolor=$par >";
                                                                                    echo "<td align=center>".$cardapio->getTitulo()."</td>";
                                                                                    echo "<td align=center>".$cardapio->getDescricao()."</td>";
                                                                                    echo "<td align=center>".$cardapio->getDtCardapio()."</td>";
                                                                                    echo "</tr>";               
                                                                                    
                                                                    }
                                                                }


                                                            ?>
                                                        </tbody>
                                                    </table>

                                                </div>
                                     </div>
                                </div> 
          
         
            
    </body>
</html>
