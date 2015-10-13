<?php 

include 'conexao.php';

$comando = "select * from usuarios limit 10";

$query1 = mysqli_query($conexao,$comando);


?>