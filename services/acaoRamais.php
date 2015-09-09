<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../bean/Ramal.class.php';
include '../controller/Ramal_Controller.class.php';
$opcao = $_POST['opcao'];
switch($opcao){
    case 'I':
        inserir(); 
        break;
}

function inserir()
{
    $nrRamal = $_POST['ramal'];
    if(isset($_POST['descricao'])){
        $descricao = $_POST['descricao'];
    }else{
        $descricao = "";
    }
    
    $cdsetor = $_POST['setor'];
    
    if(isset($_POST['visualiza'])){
        $visualiza = 'S';
    }else{
        $visualiza = 'N';
    }
    
    if(isset($_POST['apelido'])){
        $apelido = $_POST['apelido'];
    }else{
        $apelido = '';
    }
    
    echo "Cadastrar();"."<br>";
    echo $nrRamal."<br>";
    echo $descricao."<br>";
    echo $cdsetor."<br>";
    echo $visualiza."<br>";
    echo $apelido."<br>";
    
    
    $ramal = new Ramal();
    $setor = new Setor();
    $ramal->setNrRamal($nrRamal);
    $ramal->setDescricao($descricao);
    $setor->setCodigo($cdsetor);
    $ramal->setSetor($setor);
    $ramal->setSnVisutaliza($visualiza);
    $ramal->setDsApelido($apelido);
    
    $rcon = new Ramal_Controller();
    
    $teste = $rcon->inserir($ramal);
    if($teste){
        echo "Foi cadastrado";
    }
    else{
        
     echo "Nao Foi cadastrado";
    }
}