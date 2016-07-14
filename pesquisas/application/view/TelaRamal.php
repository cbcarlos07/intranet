<html>
    <head>
        <title>Pesquisa de Ramais</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../public/css/pagina.css" media="screen" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="esquerdo">
            
        
        </div>
        <div id="menu">
                    <ul>
                        <li><A href="http://10.51.28.7/intranet/?page_id=795">CADASTRO DE RAMAIS&nbsp;&nbsp;&nbsp;&nbsp;</A></li>

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
                                                                    <td><input name="pesq" placeholder="DIGITE O NOME DO SETOR" size="50"></td><TD><INPUT type="SUBMIT" VALUE="PESQUISAR" ></TD>
                                                                </tr>
                                                            </table>
                                                    </form>
                                                </div>
                                                <div id="resultado">
                                                    <table>
                                                        <thead>
                                                            <tr id="titulo" >
                                                                <td>RAMAL</TD><TD>SETOR</TD><TD>DESCRI&Ccedil;&Atilde;O</TD>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                if(isset($_POST['pesq'])){
                                                                    $setor = $_POST['pesq'];

                                                                    include '../controller/Ramal_Controller.class.php';
                                                                    include '../services/RamalListIterator.class.php';
                                                                    include '../beans/Ramais.class.php';
                                                                    $rc =  new Ramal_Controller();
                                                                    $lista = $rc->pesquisa(strtoupper($setor));
                                                                    $ramalIterator = new RamalListIterator($lista);
                                                                    $ramais = new Ramais();
                                                                    $i = 0;
                                                                    while ($ramalIterator->hasNextRamal()){
                                                                        $i++;
                                                                                       $ramais = $ramalIterator->getNextRamal();
                                                                                      if($i % 2 == 0){
                                                                                          $par = "#d5e6ef";
                                                                                      }else{
                                                                                          $par = "#ffffff";
                                                                                      }
                                                                               $snvis = $ramais->getSnvisualiza();
                                                                               if($snvis == 'S'){
                                                                                    echo "<tr bgcolor=$par >";
                                                                                    echo "<td align=center>".$ramais->getNrRamal()."</td>";
                                                                                    echo "<td align=center>".$ramais->getDsDescricao()."</td>";
                                                                                    echo "<td align=center>".$ramais->getSetor()->getNmSetor()."</td>";
                                                                                    echo "</tr>";               
                                                                               }     
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
