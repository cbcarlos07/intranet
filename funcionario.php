<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './controller/Funcionario_Controller.class.php';
$valor = $_GET['codigo'];
$c = new Funcionario_Controler();
$name = $c->getFuncionario($valor);
//echo "<script>alert($name)</script>";
//echo "console.log($name)";
$nome = "Carlos Bruno";
echo json_encode(array('response' => $name));
