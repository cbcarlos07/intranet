<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ramal_Controller{
    
    public function pesquisa($setor){
       include '../dao/Ramal_DAO.class.php';    
       $rd = new Ramal_DAO();
       $lista = $rd->pesquisa($setor);
       return $lista;
    }
}