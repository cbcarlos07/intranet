<?php 

include 'conexao.php';

$comando = "select * from cardapio limit 1";

$query1 = mysqli_query($conexao,$comando);


?>