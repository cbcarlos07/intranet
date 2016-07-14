<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cardapio_DAO{
    
    public function pesquisa($titulo){
            include_once 'ConnectionFactory.class.php';
            include_once '../beans/Cardapio.class.php';
            include_once '../services/CardapioList.class.php';
            
            $conn = new ConnectionFactory();
            $con = $conn->getConnection();
            //$paciente = new Paciente();
            //$sp = new SituacaoPaciente();
			try{
				// executo a query
                            //$con = ociparse($connection_resource, $sql_text)
                                $query = "select 
                                         I.CD_CARDAPIO
                                            ,I.DS_TITULO
                                            ,I.DS_DESCRICAO
                                            ,TO_CHAR(I.DT_CARDAPIO,'dd/mm/yyyy') DATA_CARDAPIO 
                                         from dbaadv.intra_cardapio i where i.ds_titulo like :ds ";
				$stmt = ociparse($con, $query);
                                $variavel = "%".$titulo."%";
                                oci_bind_by_name($stmt, ":ds", $variavel);
                                        
                                oci_execute($stmt);
			    
                              
                                $cardapioList = new CardapioList();
                           
                         while ($row = oci_fetch_array($stmt, OCI_ASSOC)){
                             
                             if(isset($row["DS_DESCRICAO"])){
                               $descricao = $row["DS_DESCRICAO"];  
                             }else{
                               $descricao = "";  
                             }
                             $cardapio = new Cardapio();
                             $cardapio->setCdCardapio($row["CD_CARDAPIO"]);
                             $cardapio->setTitulo($row["DS_TITULO"]);
                             $cardapio->setDescricao($descricao);                             
                             $cardapio->setDtCardapio($row["DATA_CARDAPIO"]);                             
                             
                             
                             $cardapioList->addCardapio($cardapio);
                             
                         }  
                          
                               
			$conn->closeConnection($con);
			// retorna o resultado da query
			
		}catch ( PDOException $ex ){  echo "Erro: ".$ex->getMessage(); }
                return $cardapioList;
	}
        
        public function todos(){
            include_once 'ConnectionFactory.class.php';
            include_once '../beans/Cardapio.class.php';
            include_once '../services/CardapioList.class.php';
            
            $conn = new ConnectionFactory();
            $con = $conn->getConnection();
            //$paciente = new Paciente();
            //$sp = new SituacaoPaciente();
			try{
				// executo a query
                            //$con = ociparse($connection_resource, $sql_text)
                                $query = "select 
                                         I.CD_CARDAPIO
                                            ,I.DS_TITULO
                                            ,I.DS_DESCRICAO
                                            ,TO_CHAR(I.DT_CARDAPIO,'dd/mm/yyyy') DATA_CARDAPIO 
                                         from dbaadv.intra_cardapio i ";
				$stmt = ociparse($con, $query);
                                
                                
                                        
                                oci_execute($stmt);
			    
                              
                                $cardapioList = new CardapioList();
                           
                         while ($row = oci_fetch_array($stmt, OCI_ASSOC)){
                             
                             if(isset($row["DS_DESCRICAO"])){
                               $descricao = $row["DS_DESCRICAO"];  
                             }else{
                               $descricao = "";  
                             }
                             $cardapio = new Cardapio();
                             $cardapio->setCdCardapio($row["CD_CARDAPIO"]);
                             $cardapio->setTitulo($row["DS_TITULO"]);
                             $cardapio->setDescricao($descricao);                             
                             $cardapio->setDtCardapio($row["DATA_CARDAPIO"]);                             
                             
                             
                             $cardapioList->addCardapio($cardapio);
                             
                         }  
                          
                               
			$conn->closeConnection($con);
			// retorna o resultado da query
			
		}catch ( PDOException $ex ){  echo "Erro: ".$ex->getMessage(); }
                return $cardapioList;
	}
        
}