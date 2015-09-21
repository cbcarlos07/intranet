
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
if(isset($_POST['opcao'])){
    $opcao = $_POST['opcao'];
}else{
    $opcao = $_GET['opcao'];
}
    
switch($opcao){
    case 'I':
        inserir(); 
        break;
    case 'A':
        alterar();
        break;
    case 'E':
        excluir();
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
        $setor = strtoupper($_POST['nm_setor']);
    }else{
        echo "Entrou aqui. Codigo nao eh igual a 0 <br>";
       // $cdsetor = $_POST['setor'];
      //  echo "Cd setor: ".$cdsetor."<br>";
        $setor_ = new Setor();
        $setor_ = $rcon->recSetor($cdsetor);
        $setor = strtoupper($setor_->getNome());
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
    $ramal->setCdSetor($cdsetor);
    
    
    $teste = $rcon->inserir($ramal);
    if($teste){
        //echo "Foi cadastrado";
        header("location: ../view/listar_ramais.php");
    }
    else{
        
     echo "Nao Foi cadastrado";
    }
   
}


function alterar()
{
    echo "Alterar<br>";
    $rcon = new Ramal_Controller();
    $cdramal = $_POST['cdramal'];
//    echo "Código do ramal: ".$cdramal."<br>";
    $nrRamal = $_POST['ramal'];
    if(isset($_POST['descr'])){
        $descricao = strtoupper($_POST['descr']);
    }else{
        $descricao = "";
    }
    
    $cdsetor = $_POST['setor'];
    if($cdsetor == 0){
        echo "Entrou aqui. Codigo 0 <br>";
        $setor = strtoupper($_POST['nm_setor']);        
    }else{
        echo "Entrou aqui. Codigo nao eh igual a 0 <br>";        
        echo "Cd setor: ".$cdsetor."<br>";
        $setor_ = new Setor();
        $setor_ = $rcon->recSetor($cdsetor);
        $setor = strtoupper($setor_->getNome());
   //     echo "Setor recuperado: ".$setor."<br>";
        
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
    
 //   echo "Cadastrar();"."<br>";
    echo 'Ramal: '.$nrRamal."<br>";
    echo 'Responsavel: '.$descricao."<br>";
    echo 'Setor: '.$setor."<br>";
    echo 'Visualiza: '.$visualiza."<br>";
    echo 'Apelido: '.$apelido."<br>";
    
    
    $ramal = new Ramal();
    $ramal->setCodigo($cdramal);
    $ramal->setNrRamal($nrRamal);
    $ramal->setResponsavel($descricao);  
    $ramal->setSetor($setor);
    $ramal->setSnVisutaliza($visualiza);
    $ramal->setDsApelido($apelido);
    $ramal->setCdSetor($cdsetor);
    
    
    
    $teste = $rcon->alterar($ramal);
    if($teste){
      //  echo "Foi alterado";
        header("location: ../view/listar_ramais.php");
    }
    else{
        
     echo "Nao Foi cadastrado";
    }
   
}

function excluir(){
    $id = $_GET['id'];
    $rc = new Ramal_Controller();
    $teste = $rc->excluir($id);
    if($teste){
      header("location: ../view/listar_ramais.php");
    }
    else{
        
     echo "Nao foi excluido";
    }
   
}