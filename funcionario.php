<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './controller/Funcionario_Controller.class.php';
$valor = $_GET['codigo'];
$card = $_GET['card'];
$c = new Funcionario_Controler();
$name = $c->getFuncionario($valor);
$com = $c->verificarCadastro($card, $valor);

if($com > 0){
    
    echo json_encode(array('response' => $com, 'nome' => $name));
}else{

    echo json_encode(array('response' => $com, 'nome' => $name));
}

//echo "<script>alert($name)</script>";
//echo "console.log($name)";
//$nome = "Carlos Bruno";

