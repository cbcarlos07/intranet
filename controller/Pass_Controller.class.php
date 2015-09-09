<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../model/Pass_DAO.class.php';
class Rec_Senha_Controller {
    
    public function rec_pass($login){
        $rd = new Rec_Pass_DAO();
        $pass = $rd->rec_pass($login);
        return $pass;
    }
    
     public function rec_nome($login){
        $rd = new Rec_Pass_DAO();
        $pass = $rd->rec_nome($login);
        return $pass;
    }
    
}