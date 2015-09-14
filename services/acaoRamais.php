
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../bean/Ramal.class.php';
include '../controller/Ramal_Controller.class.php';
?>
<meta charset="UTF-8">
<?php
$opcao = $_POST['opcao'];
switch($opcao){
    case 'I':
        inserir(); 
        break;
}

function inserir()
{
    $rcon = new Ramal_Controller();
    $nrRamal = $_POST['ramal'];
    if(isset($_POST['descr'])){
        $descricao = strtoupper($_POST['descr']);
    }else{
        $descricao = "";
    }
    
    $cdsetor = $_POST['setor'];
    if($cdsetor == 0){
        echo "Entrou aqui. Codigo 0 <br>";
        $setor = $_POST['nm_setor'];
    }else{
        echo "Entrou aqui. Codigo nao eh igual a 0 <br>";
        $cdsetor = $_POST['setor'];
        echo "Cd setor: ".$cdsetor."<br>";
        $setor = $rcon->recSetor($cdsetor);
        echo "Setor recuperado: ".$setor."";
        
    }
    
    if(isset($_POST['visualiza'])){
        $visualiza = 'S';
    }else{
        $visualiza = 'N';
    }
    
    if(isset($_POST['apelido'])){
        $apelido = strtoupper($_POST['apelido']);
    }else{
        $apelido = '';
    }
    
    echo "Cadastrar();"."<br>";
    echo 'Ramal: '.$nrRamal."<br>";
    echo 'Responsavel: '.$descricao."<br>";
    echo 'Setor: '.$setor."<br>";
    echo 'Visualiza: '.$visualiza."<br>";
    echo 'Apelido: '.$apelido."<br>";
    
    
    $ramal = new Ramal();
    
    $ramal->setNrRamal($nrRamal);
    $ramal->setResponsavel($descricao);  
    $ramal->setSetor($setor);
    $ramal->setSnVisutaliza($visualiza);
    $ramal->setDsApelido($apelido);
    
    
    
    $teste = $rcon->inserir($ramal);
    if($teste){
        echo "Foi cadastrado";
    }
    else{
        
     echo "Nao Foi cadastrado";
    }
   
}