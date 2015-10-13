<?php
include '../model/Ramal_DAO.class.php';


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
    
     public function recTotal($dssetor){
         $rd = new Ramal_DAO();
         $teste = $rd->getTotal($dssetor);
         return $teste;
     }
    
     public function getSetor(){
         $rd = new Ramal_DAO();
         $teste = $rd->getSetor();
         return $teste;
     }
     public function recSetor($setor){
         $rd = new Ramal_DAO();
         $teste = $rd->recSetor($setor);
         return $teste;
     }
     
     public function lista_ramais1($set){
         $rd = new Ramal_DAO();
         $lista = $rd->lista_ramal1($set);
         return $lista;
     }
     
      public function lista_ramais($set, $letra){
         $rd = new Ramal_DAO();
         $lista = $rd->lista_ramal($set, $letra);
         return $lista;
     }
     public function recuperar_ramal($id){
         $rd = new Ramal_DAO();
         $ramal = $rd->recuperar_ramal($id);
         return $ramal;
     }
     
     public function total_pesquisa($id){
         $rd = new Ramal_DAO();
         $ramal = $rd->total_pesquisa($id);
         return $ramal;
     }
     
     public function  verificarDulicidade($nrramal){
         $rd = new Ramal_DAO();
         $ramal = $rd->verificarDulicidade($nrramal);
         return $ramal;
     }
    
}

