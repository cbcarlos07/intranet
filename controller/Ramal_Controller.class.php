<?php
include_once 'model/Ramal_DAO.class.php';

class Ramal_Controller {
    
    public function inserir(Ramal $ramal){
        
        $ramal_DAO = new Ramal_DAO();
        $teste = $ramal_DAO->insertRamais($ramal);
        return $teste;
    }
    
    public function alterar(Ramal $ramal){
        $ramal_DAO = new Ramal_DAO();
        $teste = $ramal_DAO->updateRamais($ramal);
        return $teste;
    }
    
    public function excluir($codigo){
        $ramal_DAO = new Ramal_DAO();
        $teste = $ramal_DAO->deleteRamal($codigo);
        return $teste;
    }
    
    public function pesquisaRamal ($parametro){
        $ramal_DAO = new Ramal_DAO();
        $teste = $ramal_DAO->pesquisa_ramal($parametro);
        return $teste;
    }
    
     public function recTotal(){         
         $rd = new Ramal_DAO();
         $teste = $rd->getTotal();
         return $teste;
     }
    
     public function recSetor(){
         $rd = new Ramal_DAO();
         $teste = $rd->getSetor();
         return $teste;
     }
    
    
}

