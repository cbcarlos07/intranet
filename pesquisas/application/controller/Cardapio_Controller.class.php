<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cardapio_Controller{
    
    public function pesquisa($setor){
       include '../dao/Cardapio_DAO.class.php';    
       $rd = new Cardapio_DAO();
       $lista = $rd->pesquisa($setor);
       return $lista;
    }
}