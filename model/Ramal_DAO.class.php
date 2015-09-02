<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    include './ConnectionFactory.class.php';
class Ramal_DAO {

   


function insertRamais(Ramal $ramal ){
                 $conn = new ConnectionFactory();   
                 $conexao = $conn->getConnection();
		 $sql_text = "INSERT INTO DBAADV.INTRA_RAMAL
					(CD_RAMAL, NR_RAMAL, DS_DESCRICAO, CD_SETOR, SN_VISUALIZA, DS_APELIDO)
					VALUES 
					(:cdramal, :dsramal, :dsdesc, :cdsetor, :snvisualiza, :apelido)";
				//	echo "<script>  alert('Metodo inserir')</script>";
					try {
							//echo "<script>  alert('Metod inserir denttro do TRY ".getSequencia()."')</script>";
														
							$statement = oci_parse($ora_conexao, $sql_text);
							oci_bind_by_name($statement, ":cdramal", getCodigo());
							oci_bind_by_name($statement, ":dsramal", $ramal->getNrRamal());
							oci_bind_by_name($statement, ":dsdesc", $ramal->getDescricao());
							oci_bind_by_name($statement, ":cdsetor", $ramal->getSetor());
							oci_bind_by_name($statement, ":snvisualiza", $ramal->getSnVisutaliza());
                                                        oci_bind_by_name($statement, ":apelido", $ramal->getDsApelido());
							oci_execute($statement,  OCI_COMMIT_ON_SUCCESS);
							
							
							$teste = true;
							oci_close($ora_conexao);
				} catch (PDOException $ex) {
				//    echo "<script>  alert('Erro: ".$ex->getMessage()."')</script>";
			  }
            
        		return $teste;
	}
        
        function updateRamais(Ramal $ramal ){
                 $conn = new ConnectionFactory();   
                 $conexao = $conn->getConnection();
		 $sql_text = "UPDATE DBAADV.INTRA_RAMAL SET
					 NR_RAMAL = :dsramal, DS_DESCRICAO = :dsdesc, 
                                        CD_SETOR = :cdsetor, SN_VISUALIZA = :snvisualiza, DS_APELIDO = :apelido)
					WHERE 
                                        CD_RAMAL = :cdramal";
				//	echo "<script>  alert('Metodo inserir')</script>";
					try {
							//echo "<script>  alert('Metod inserir denttro do TRY ".getSequencia()."')</script>";
														
							$statement = oci_parse($ora_conexao, $sql_text);
							oci_bind_by_name($statement, ":cdramal", getCodigo());
							oci_bind_by_name($statement, ":dsramal", $ramal->getNrRamal());
							oci_bind_by_name($statement, ":dsdesc", $ramal->getDescricao());
							oci_bind_by_name($statement, ":cdsetor", $ramal->getSetor());
							oci_bind_by_name($statement, ":snvisualiza", $ramal->getSnVisutaliza());
                                                        oci_bind_by_name($statement, ":apelido", $ramal->getDsApelido());
							oci_execute($statement,  OCI_COMMIT_ON_SUCCESS);
							
							
							$teste = true;
							oci_close($ora_conexao);
				} catch (PDOException $ex) {
				//    echo "<script>  alert('Erro: ".$ex->getMessage()."')</script>";
                                    echo " Erro: ".$ex->getMessage();
			  }
            
        		return $teste;
	}
        
        public function deleteSetor($code){
        
        $conn = new ConnectionFactory();
        $connection = $conn->getConnection();
        $sql_text = "DELETE FROM DBAADV.INTRA_RAMAL
                     WHERE ROWID = :cdp";
        $select = "SELECT ROWID FROM DBAADV.INTRA_RAMAL R WHERE CD_RAMAL = :cdp";
        try {
            $statement = oci_parse($connection, $select);
            oci_bind_by_name($statement, ":cdp", $code);
            $rowid = oci_new_descriptor($connection, OCI_D_ROWID);
            oci_define_by_name($statement, "ROWID", $rowid);
            
            
            oci_execute($statement);
            while(oci_fetch($statement)){
                $nrows = oci_num_rows($statement);
                $delete = oci_parse($connection, $sql_text);
                oci_bind_by_name($delete, ":cdp", $rowid, -1, OCI_B_ROWID);
                oci_execute($delete, OCI_COMMIT_ON_SUCCESS);
               // echo "$nrows\n";
               /* if(($nrows % $commitsize) == 0){
                    oci_commit($connection);
                }
                 */       
            }
            
            $teste = true;
           // System.out.println("Cadastrou");
            $conn->closeConnection($connection);
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
            $teste = false;
        }
        return $teste;
    }
        
        function getCodigo(){
                 $conn = new ConnectionFactory();   
                 $conexao = $conn->getConnection();
                 $i = 0;
		 $sql_text = "select dbaadv.seq_intra_ramal.nextval CODIGO from dual";
				
					try {
						
                                            $stmt = oci_parse($conexao, $sql_text);
                                            oci_execute($stmt);
                                              if ($row = oci_fetch_array($stmt, OCI_ASSOC)){
                                                 $i = $row["CODIGO"]; 
                                              }
                             
				} catch (PDOException $ex) {
				//    echo "<script>  alert('Erro: ".$ex->getMessage()."')</script>";
                                    echo " Erro: ".$ex->getMessage();
			  }
            
        		return $i;
	}
        
        function getSetor(){
                 $conn = new ConnectionFactory();   
                 $conexao = $conn->getConnection();                 
                 $setor = null;
                 $setorList = new SetorList();
		 $sql_text = "select s.cd_setor, s.nm_setor from dbamv.setor s";
				
					try {
						
                                            $stmt = oci_parse($conexao, $sql_text);
                                            oci_execute($stmt);
                                              while ($row = oci_fetch_array($stmt, OCI_ASSOC)){
                                                 $setor = new Setor();
                                                 $setor->setCodigo($row["s.cd_setor"]); 
                                                 $setor->setNome($row["s.nm_setor"]);
                                                 $setorList->addSetor($setor);
                                                 
                                              }
                             
				} catch (PDOException $ex) {
				//    echo "<script>  alert('Erro: ".$ex->getMessage()."')</script>";
                                    echo " Erro: ".$ex->getMessage();
			  }
            
        		return $i;
	}
        
        
}
