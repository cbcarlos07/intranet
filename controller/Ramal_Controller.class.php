    <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
    
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
    
    
    
    
}
