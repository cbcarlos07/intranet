<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$cdc = $_POST['cardapio'];

$cdf = $_POST['cracha'];



include ('./controller/Funcionario_Controller.class.php');
$fc = new Funcionario_Controler();
$teste = $fc->delete($cdc, $cdf);
if($teste){
    //json_encode(array('response' => 'Cadastrado com sucesso'));
    //echo 'Cardapio: '.$cdc.' Cracha: '.$cdf.' Nome: '.$nmf ;
    echo 1;
    //echo json_encode(array('retorno' => "1"));
}else{
    echo 0;
    //echo json_encode(array('retorno' => "0"));
    //json_encode(array('response' => 'Nao foi cadastrado com sucesso'));
}


