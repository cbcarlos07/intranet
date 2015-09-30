<?php
include 'conexao.php';

$principal = $_POST['principal'];
$acomp = $_POST['acompanhamento'];
$salada = $_POST['salada'];
$caldos = $_POST['caldos'];
$sobremesa = $_POST['sobremesa'];
$sucos = $_POST['sucos'];
$outros = $_POST['outros'];



$comando = "insert into cardapio (principal,acomp,salada,caldos,sobremesa,sucos,outros) values  ('$principal','$acomp','$salada','$caldos','$sobremesa','$sucos','$outros')";

$query = mysqli_query($conexao,$comando);




