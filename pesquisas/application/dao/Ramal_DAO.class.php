<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ramal_DAO{
    
    public function pesquisa($setor){
            include_once 'ConnectionFactory.class.php';
            include_once '../beans/Ramais.class.php';
            include_once '../services/RamalList.class.php';
            include_once '../beans/Setor.class.php';;
            $conn = new ConnectionFactory();
            $con = $conn->getConnection();
            //$paciente = new Paciente();
            //$sp = new SituacaoPaciente();
			try{
				// executo a query
                            //$con = ociparse($connection_resource, $sql_text)
                                $query = "SELECT R.*, S.NM_SETOR FROM DBAADV.INTRA_RAMAL R 
						,DBAMV.SETOR S  
						WHERE R.DS_DESCRICAO LIKE :setor
						 AND S.CD_SETOR = R.CD_SETOR  ";
				$stmt = ociparse($con, $query);
                                $variavel = "%".$setor."%";
                                oci_bind_by_name($stmt, ":setor", $variavel);
                                        
                                oci_execute($stmt);
			    
                              
                                $ramalList = new RamalList();
                           
                         while ($row = oci_fetch_array($stmt, OCI_ASSOC)){
                             
                             if(isset($row["DS_DESCRICAO"])){
                               $descricao = $row["DS_DESCRICAO"];  
                             }else{
                               $descricao = "";  
                             }
                             $ramal = new Ramais();
                             $ramal->setCdRamal($row["CD_RAMAL"]);
                             $ramal->setNrRamal($row["NR_RAMAL"]);
                             $ramal->setDsDescricao($descricao);
                             $ramal->setSetor(new Setor());
                             $ramal->getSetor()->setCdSetor($row["CD_SETOR"]);
                             $ramal->getSetor()->setNmSetor($row["NM_SETOR"]);
                             $ramal->setSnvisualiza($row["SN_VISUALIZA"]);
                             
                             
                             $ramalList->addRamal($ramal);
                             
                         }  
                          
                               
			$conn->closeConnection($con);
			// retorna o resultado da query
			
		}catch ( PDOException $ex ){  echo "Erro: ".$ex->getMessage(); }
                return $ramalList;
	}
        
}