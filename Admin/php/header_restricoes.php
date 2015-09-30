<?php

if (isset($_SESSION['usuario']) && isset($_SESSION['senha'])){
	$logado = 1;
	$nome = $_SESSION['nome'];
	$nivel = $_SESSION['nivel'];
}
?>