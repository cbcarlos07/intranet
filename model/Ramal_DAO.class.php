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
			  }
            
        		return $i;
	}
}
