<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../controller/Pass_Controller.class.php';
$login = strtoupper($_POST['login']); 
$senha = strtoupper($_POST['senha']);
session_start(); 
 $con = new Rec_Senha_Controller();
 $senhadb = $con->rec_pass(strtoupper($login));
                       //$teste;
   if($senha == $senhadb ) 
 { 

        $_SESSION['login'] = $login; 
        $_SESSION['senha'] = $senha; 
        $_SESSION['nome'] = $nome = $con->rec_nome($login);
        // $teste = 0;
        $url = "";
        $ip = gethostbyname($url);
       //$ip = $_SERVER['REMOTE_ADDR'];
       $index = 'http://'.$ip.'/intranet/';
        header('location:'.$index.'/view/cadastrar_ramais.php?opcao=I'); 
     //   $teste = true;

     } else
         { 
            unset ($_SESSION['login']); 
            unset ($_SESSION['senha']); 
            unset ($_SESSION['nome']);
           // header("location:{$_SERVER['PHP_SELF']}?erro=1"); 
           // echo 'alert(Senha incorreta)";
         //   header( "refresh:5;{$_SERVER['PHP_SELF']}?erro=1"); 
          // header("Location:{$_SERVER['PHP_SELF']}?log=1");
         } 
     //    echo "Login: ".$login."<br>";
   //      echo "senha login: ".$senha." senha db: ".$senhadb;

                   