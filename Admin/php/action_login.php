<?php
session_start();

include 'conexao.php';
$user = $_POST['usuario_login'];
$pass = $_POST['senha_login'];

$selecionar = "select * from usuarios where usuario='$user' and senha='$pass'";

$query = mysqli_query($conexao,$selecionar);
$contar = mysqli_num_rows($query);

if ($contar == 1){
	$dados = mysqli_fetch_array($query);
	$_SESSION['nome'] = $dados['nome'];
	$_SESSION['usuario'] = $dados['usuario'];
	$_SESSION['senha'] = $dados['senha'];
	$_SESSION['nivel'] = $dados['nivel'];
	$_SESSION['logado'] = true;
	//$_SESSION['nivel'] = $dados['nivel'];
/*	if ($nivel == 1){
		$_SESSION['nivel'];
	$_SESSION['logado'] = true;
	setcookie("logado",1);
	$log =  1;
}
	if (isset($log)){
		//$flah = 'logado';
		echo 'logado';
	}*/
        $url = "";
        $ip = gethostbyname($url);
	header('location:http://'.$ip.'/intranet/Admin/painel.php');
	
}else{
	$_SESSION['erro'] = '1';
	header('location:http://localhost/intranet/Admin/php/login.php');
	
	
}
	
