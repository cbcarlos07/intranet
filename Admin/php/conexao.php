<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'nutricao';

$conexao = mysqli_connect($servidor,$usuario,$senha,$banco) ;
if (mysqli_connect_errno())
  {
  echo "Falha na conexao com o banco de dados: " . mysqli_connect_error();
  }
 else
  {
  echo "conectado";
  }
?>