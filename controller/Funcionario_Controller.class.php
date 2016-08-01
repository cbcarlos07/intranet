<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Funcionario_Controler{
    
        public function getFuncionario($usuario){
            include 'model/Funcionario_DAO.class.php';
            $dao = new Funcionario_DAO();
            $nome = $dao->getFuncionario($usuario);
            return $nome;
        }
        
        public function agendar($cdc, $cdf, $nmf){
            include 'model/Funcionario_DAO.class.php';
            $dao = new Funcionario_DAO();
            $nome = $dao->agendar($cdc, $cdf, $nmf);
            return $nome;
        }
        
        public function  verificarCadastro($cardapio, $func){
            include 'model/Funcionario_DAO.class.php';
            $dao = new Funcionario_DAO();
            $nome = $dao->verificarCadastro($cardapio, $func);
            return $nome;
        }
        
        public function delete($card, $func){
            include 'model/Funcionario_DAO.class.php';
            $dao = new Funcionario_DAO();
            $nome = $dao->delete($cdc, $cdf, $nmf);
            return $nome;
        }

}