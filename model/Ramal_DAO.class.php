<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    
    
class Ramal_DAO {
    
public function  insertRamais(Ramal $ramal ){
				  $teste = false;
                  $conn = new ConnectionFactory();   
                 $conexao = $conn->getConnection();
				 $sql_text = "INSERT INTO DBAADV.INTRA_RAMAL
					(CD_RAMAL, DS_RAMAL, DS_RESPONSAVEL, SN_VISUALIZA, DS_APELIDO, DS_SETOR, CD_SETOR)
					VALUES 
					(:cdramal, :dsramal, :dsdesc, :snvisualiza, :apelido, :setor, :cdsetor)";
				//	echo "<script>  alert('Metodo inserir')</script>";
					try {
							//echo "<script>  alert('Metod inserir denttro do TRY ".getSequencia()."')</script>";
                                                        
                                                        $codigo = $this->getCodigo();
                                                        $nrramal = $ramal->getNrRamal();
                                                        $descricao = $ramal->getResponsavel();
                                                        $setor = $ramal->getSetor();
                                                        $visualiza = $ramal->getSnVisutaliza();
                                                        $apelido = $ramal->getDsApelido();
                                                        $cdsetor = $ramal->getCdSetor();
							$statement = oci_parse($conexao, $sql_text);
							oci_bind_by_name($statement, ":cdramal", $codigo);
							oci_bind_by_name($statement, ":dsramal", $nrramal);
							oci_bind_by_name($statement, ":dsdesc", $descricao);
							oci_bind_by_name($statement, ":setor", $setor);
							oci_bind_by_name($statement, ":snvisualiza", $visualiza);
                                                        oci_bind_by_name($statement, ":apelido", $apelido);
                                                        oci_bind_by_name($statement, ":cdsetor", $cdsetor);
							oci_execute($statement,  OCI_COMMIT_ON_SUCCESS);
							
							
							$teste = true;
							$conn->closeConnection($conexao);
				} catch (PDOException $ex) {
				//    echo "<script>  alert('Erro: ".$ex->getMessage()."')</script>";
			  }
            
        		return $teste;
	}
        
        public function  updateRamais(Ramal $ramal ){
                 $conn = new ConnectionFactory();   
                 $teste = false;
                 $conexao = $conn->getConnection();
		
				//	echo "<script>  alert('Metodo inserir')</script>";
					try {
                                                         $sql_text = "UPDATE DBAADV.INTRA_RAMAL SET
                                                        DS_RAMAL = :dsramal, DS_RESPONSAVEL = :dsdesc, 
                                                        DS_SETOR = :nmsetor, SN_VISUALIZA = :snvisualiza, 
                                                        DS_APELIDO = :apelido, CD_SETOR = :cdsetor
                                                        WHERE 
                                                        CD_RAMAL = :cdramal";
							echo "<script>  alert('Metod alterar denttro do TRY ');</script>";
														
							$codigo = $ramal->getCodigo();
                                                     //   echo "DAO cdramal: ".$codigo."<br>";
                                                        $nrramal = $ramal->getNrRamal();
                                                        $responsavel = $ramal->getResponsavel();
                                                        $setor = $ramal->getSetor();
                                                        $visualiza = $ramal->getSnVisutaliza();
                                                        $apelido = $ramal->getDsApelido();
                                                        $cdsetor = $ramal->getCdSetor();
							$statement = oci_parse($conexao, $sql_text);
							oci_bind_by_name($statement, ":cdramal", $codigo);
							oci_bind_by_name($statement, ":dsramal", $nrramal);
							oci_bind_by_name($statement, ":dsdesc", $responsavel);
							oci_bind_by_name($statement, ":nmsetor", $setor);
							oci_bind_by_name($statement, ":snvisualiza", $visualiza);
                                                        oci_bind_by_name($statement, ":apelido", $apelido);
                                                        oci_bind_by_name($statement, ":cdsetor", $cdsetor);
							oci_execute($statement,  OCI_COMMIT_ON_SUCCESS);
							
							echo "<script>alert('alterado');</script>";
							$teste = true;
							$conn->closeConnection($conexao);
				} catch (PDOException $ex) {
				//    echo "<script>  alert('Erro: ".$ex->getMessage()."')</script>";
                                    echo " Erro: ".$ex->getMessage();
			  }
            
        		return $teste;
	}
        
       public function  deleteRamal($code){
        
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
        
        public function  getCodigo(){
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
                                $conn->closeConnection($conexao);
				} catch (PDOException $ex) {
				//    echo "<script>  alert('Erro: ".$ex->getMessage()."')</script>";
                                    echo " Erro: ".$ex->getMessage();
			  }
            
        		return $i;
	}
        
        public function  verificarDulicidade($nrramal){
                 $conn = new ConnectionFactory();   
                 $conexao = $conn->getConnection();
                 $i = 0;
		 $sql_text = "SELECT * FROM DBAADV.INTRA_RAMAL R WHERE R.DS_RAMAL = :DSRAMAL";
				
					try {
						
                                            $stmt = oci_parse($conexao, $sql_text);                                            
                                            oci_bind_by_name($stmt, ":DSRAMAL", $nrramal);
                                            oci_execute($stmt);
                                              if ($row = oci_fetch_array($stmt, OCI_ASSOC)){
                                                 $i = 1; 
                                              }
                             $conn->closeConnection($conexao);
				} catch (PDOException $ex) {
				//    echo "<script>  alert('Erro: ".$ex->getMessage()."')</script>";
                                    echo " Erro: ".$ex->getMessage();
			  }
            
        		return $i;
	}
        
         public function  getTotal($dssetor){
                 $conn = new ConnectionFactory();   
                 $conexao = $conn->getConnection();
                 $i = 0;
		 $sql_text = "SELECT COUNT(*) TOTAL FROM DBAADV.INTRA_RAMAL R WHERE R.DS_SETOR LIKE :DSSETOR";
				
					try {
						
                                            $stmt = oci_parse($conexao, $sql_text);                                            
                                            oci_bind_by_name($stmt, ":DSSETOR", $dssetor);
                                            oci_execute($stmt);
                                              if ($row = oci_fetch_array($stmt, OCI_ASSOC)){
                                                 $i = $row["TOTAL"]; 
                                              }
                             $conn->closeConnection($conexao);
				} catch (PDOException $ex) {
				//    echo "<script>  alert('Erro: ".$ex->getMessage()."')</script>";
                                    echo " Erro: ".$ex->getMessage();
			  }
            
        		return $i;
	} 
        
        
        public function  getSetor(){
                 include_once ('ConnectionFactory.class.php');
                 include_once ('../services/SetorList.class.php');
                 include_once ('../bean/Setor.class.php');
                 $conn = new ConnectionFactory();   
                 $conexao = $conn->getConnection();                 
                 $setor = null;
                 $setorList = new SetorList();
		 
				
					try {
				            $sql_text = "select s.cd_setor, s.nm_setor from dbamv.setor s order by 2";
                                            $stmt = oci_parse($conexao, $sql_text);
                                            oci_execute($stmt);
                                              while ($row = oci_fetch_array($stmt, OCI_ASSOC)){
                                                 $setor = new Setor();
                                                 
                                                 $setor->setCodigo($row['CD_SETOR']); 
                                                 $setor->setNome($row['NM_SETOR']);
                                                 $setorList->addSetor($setor);
                                                 
                                              }
                                $conn->closeConnection($conexao);
				} catch (PDOException $ex) {
				//    echo "<script>  alert('Erro: ".$ex->getMessage()."')</script>";
                                    echo " Erro: ".$ex->getMessage();
			  }
            
        		return $setorList;
	}
        
        public function  recSetor($cdsetor){
                 $conn = new ConnectionFactory();   
                 $conexao = $conn->getConnection();                 
                 $setor = null;
                 
                 
		 
				
					try {
				            $sql_text = "select s.nm_setor from 
                                                        dbamv.setor s
                                                        where
                                                        s.cd_setor = :cdsetor";
                                            $stmt = oci_parse($conexao, $sql_text);
                                            oci_bind_by_name($stmt, ":cdsetor", $cdsetor);
                                            oci_execute($stmt);
                                            if($row = oci_fetch_array($stmt, OCI_ASSOC)){
                                                 $setor = new Setor();
                                                 
                                                 
                                                 $setor->setNome($row['NM_SETOR']);
                                                 
                                                 
                                              }
                                $conn->closeConnection($conexao);
				} catch (PDOException $ex) {
				//    echo "<script>  alert('Erro: ".$ex->getMessage()."')</script>";
                                    echo " Erro: ".$ex->getMessage();
			  }
            
        		return $setor;
	}
     
     
        public function  pesquisa_ramal($set){
                 $conn = new ConnectionFactory();   
                 $conexao = $conn->getConnection();                 
                 $ramal = null;
                 $ramalList = new RamalList();       
		    $sql_text = "SELECT R.*, S.CD_SETOR, S.NM_SETOR FROM DBAADV.INTRA_RAMAL R 
						,DBAMV.SETOR S  
						WHERE (R.DS_DESCRICAO LIKE :setor
                                                      OR R.NR_RAMAL LIKE :setor
                                                      OR R.DS_APELIDO LIKE :setor)
						 AND S.CD_SETOR = R.CD_SETOR";		   
              try {
             $statement = oci_parse($connection, $sql_text);
             $parametro = "%".$set."%";
             
             oci_bind_by_name($statement, ":setor", $parametro, -1);
             
             oci_execute($statement);
             
            while($row = oci_fetch_array($statement, OCI_ASSOC)){
                $ramal = new Ramal();
                $setor = new Setor();
                $ramal->setCodigo($row["CD_RAMAL"]);
                $ramal->setResponsavel($row["DS_DESCRICAO"]);
                $ramal->setNrRamal($row["DS_RAMAL"]);
                $setor->setCodigo($row["CD_SETOR"]);
                $setor->setNome($row["NM_SETOR"]);
                $ramal->setSetor($setor);
                $ramal->setSnVisutaliza($row["SN_VISUALIZA"]);
                $ramal->setDsApelido($row["DS_APELIDO"]);
                $ramalList->addRamal($ramal);
                
            }
            $conn->closeConnection($connection);
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
       return $ramalList;
	}   
        
 public function  lista_ramal1($set){
                 $conn = new ConnectionFactory();   
                 $conexao = $conn->getConnection();                 
                 $ramal = null;
                 $ramalList = new RamalList();       
		//echo "<h2>".$inicio ." de ".$fim ."</h2>";
                 
              try {
                  
                  if($set != ""){
                      
                   //   echo "Pesquisa ramal: ".$set."<br>Nao Vazio";
                      $sql_text = "SELECT * FROM DBAADV.INTRA_RAMAL R 						
				  WHERE 
                                  (
                                        R.DS_RESPONSAVEL LIKE :resp
                                        OR R.DS_RAMAL LIKE :ramal
                                        OR R.DS_APELIDO LIKE :apelido
                                        OR R.DS_SETOR LIKE :setor
                                    )                                  
                                      ORDER BY R.DS_SETOR
                                                      ";		   
                      $statement = oci_parse($conexao, $sql_text);
             $parametro = "%".$set."%";
             oci_bind_by_name($statement, ":resp", $parametro,-1);
             oci_bind_by_name($statement, ":ramal", $parametro,-1);
             oci_bind_by_name($statement, ":apelido", $parametro,-1);
             oci_bind_by_name($statement, ":setor", $parametro,-1);
             
             
                  }
                  else{
                //      echo "Pesquisa ramal: ".$set."<br>Vazio";
                        $sql_text = "SELECT * FROM (
                                                SELECT rownum as NUMERO 
                                                   ,R.*
                                                FROM 
                                                (
                                                    SELECT * FROM DBAADV.INTRA_RAMAL I
                                                     ORDER BY I.DS_SETOR
                                                )
                                                R
                                                )
                                                S                                               
                                                ORDER BY  S.DS_SETOR


                                 ";
			$statement = oci_parse($conexao, $sql_text);	
                       
                  }
             
             
             oci_execute($statement);
             
            while($row = oci_fetch_array($statement, OCI_ASSOC)){
                $ramal = new Ramal();                
                if(isset($row["DS_RESPONSAVEL"])){
                    $resp = $row["DS_RESPONSAVEL"];
                }else{
                    $resp = "";
                }
                if(isset($row["DS_APELIDO"])){
                    $apelido = $row["DS_APELIDO"];
                }else{
                    $apelido = "";
                }
                
                $ramal->setCodigo($row["CD_RAMAL"]);
                $ramal->setResponsavel($resp);
                $ramal->setNrRamal($row["DS_RAMAL"]);                                
                $ramal->setSetor($row["DS_SETOR"]);
                $ramal->setSnVisutaliza($row["SN_VISUALIZA"]);
                $ramal->setDsApelido($apelido);
                $ramal->setCdSetor($row["CD_SETOR"]);
                $ramalList->addRamal($ramal);
                
            }
            $conn->closeConnection($conexao);
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
       return $ramalList;
	}      
        
        
     public function  lista_ramal($set, $inicio){
                 $conn = new ConnectionFactory();   
                 $conexao = $conn->getConnection();                 
                 $ramal = null;
                 $ramalList = new RamalList();       
		//echo "<h2>".$inicio ." de ".$fim ."</h2>";
                 
              try {
                  
                  if($set != ""){
                      
                   //   echo "Pesquisa ramal: ".$set."<br>Nao Vazio";
                      $sql_text = "SELECT * FROM DBAADV.INTRA_RAMAL R 						
				  WHERE 
                                  (
                                        R.DS_RESPONSAVEL LIKE :resp
                                        OR R.DS_RAMAL LIKE :ramal
                                        OR R.DS_APELIDO LIKE :apelido
                                        OR R.DS_SETOR LIKE :setor
                                    )
                                    AND R.SN_VISUALIZA = 'S'
                                      ORDER BY R.DS_SETOR
                                                      ";		   
                      $statement = oci_parse($conexao, $sql_text);
             $parametro = "%".$set."%";
             oci_bind_by_name($statement, ":resp", $parametro,-1);
             oci_bind_by_name($statement, ":ramal", $parametro,-1);
             oci_bind_by_name($statement, ":apelido", $parametro,-1);
             oci_bind_by_name($statement, ":setor", $parametro,-1);
             
             
                  }
                  else{
                //      echo "Pesquisa ramal: ".$set."<br>Vazio";
                        $sql_text = "SELECT * FROM (
                                                SELECT rownum as NUMERO 
                                                   ,R.*
                                                FROM 
                                                (
                                                    SELECT * FROM DBAADV.INTRA_RAMAL I
                                                     ORDER BY I.DS_SETOR
                                                )
                                                R
                                                )
                                                S
                                                WHERE S.DS_SETOR LIKE :DSSETOR
                                                AND S.SN_VISUALIZA = 'S'
                                                ORDER BY  NUMERO


                                 ";
			$statement = oci_parse($conexao, $sql_text);	
                        $par = "$inicio%"; //par = de parametro
                        oci_bind_by_name($statement, ":DSSETOR", $par, -1);
                        
                  }
             
             
             oci_execute($statement);
             
            while($row = oci_fetch_array($statement, OCI_ASSOC)){
                $ramal = new Ramal();                
                if(isset($row["DS_RESPONSAVEL"])){
                    $resp = $row["DS_RESPONSAVEL"];
                }else{
                    $resp = "";
                }
                if(isset($row["DS_APELIDO"])){
                    $apelido = $row["DS_APELIDO"];
                }else{
                    $apelido = "";
                }
                
                $ramal->setCodigo($row["CD_RAMAL"]);
                $ramal->setResponsavel($resp);
                $ramal->setNrRamal($row["DS_RAMAL"]);                                
                $ramal->setSetor($row["DS_SETOR"]);
                $ramal->setSnVisutaliza($row["SN_VISUALIZA"]);
                $ramal->setDsApelido($apelido);
                $ramal->setCdSetor($row["CD_SETOR"]);
                $ramalList->addRamal($ramal);
                
            }
            $conn->closeConnection($conexao);
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
       return $ramalList;
	}    
        
        public function  total_pesquisa($set){
                 $conn = new ConnectionFactory();   
                 $conexao = $conn->getConnection();                 
                 $i = 0;      
		 
                 
              try {
                  
                $sql_text = "SELECT count(*) TOTAL FROM DBAADV.INTRA_RAMAL R             
                                                            WHERE 
                                                  (
                                                  R.DS_RESPONSAVEL LIKE :resp
                                                  OR R.DS_RAMAL LIKE :ramal
                                                  OR R.DS_APELIDO LIKE :apelido
                                                  OR R.DS_SETOR = :setor
                                                  )
                                                  AND R.SN_VISUALIZA = 'S'
                                                 ORDER BY R.DS_SETOR
                                                      ";		   
                      $statement = oci_parse($conexao, $sql_text);
                      $parametro = "%".$set."%";
             
             oci_bind_by_name($statement, ":resp", $parametro);
             oci_bind_by_name($statement, ":ramal", $parametro);
             oci_bind_by_name($statement, ":apelido", $parametro);
             oci_bind_by_name($statement, ":setor", $parametro);
		//	$statement = oci_parse($conexao, $sql_text);			 
                  
             
             
             oci_execute($statement);
             
            if($row = oci_fetch_array($statement, OCI_ASSOC)){
                
                $i = $row["TOTAL"];
                
                
            }
            $conn->closeConnection($conexao);
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
       return $i;
	}     
         public function  recuperar_ramal($id){
                 $conn = new ConnectionFactory();   
                 $conexao = $conn->getConnection();                 
                 $ramal = null;
                 //   echo "Codigo recuperar ramal: ".$id;
		         $sql_text = "SELECT R.* FROM DBAADV.INTRA_RAMAL R 						
						WHERE R.CD_RAMAL = :id";		   
              try {
             $statement = oci_parse($conexao, $sql_text);             
             
             oci_bind_by_name($statement, ":id", $id);
             
             oci_execute($statement);
             
            if($row = oci_fetch_array($statement, OCI_ASSOC)){
                if(isset($row["DS_RESPONSAVEL"])){
                    $resp = $row["DS_RESPONSAVEL"];
                }else{
                    $resp = "";
                }
                if(isset($row["DS_APELIDO"])){
                    $apelido = $row["DS_APELIDO"];
                }else{
                    $apelido = "";
                }
                $ramal = new Ramal();                
                $ramal->setCodigo($row["CD_RAMAL"]);
                $ramal->setResponsavel($resp);
                $ramal->setNrRamal($row["DS_RAMAL"]);
                $ramal->setSetor($row["DS_SETOR"]);
                $ramal->setSnVisutaliza($row["SN_VISUALIZA"]);
                $ramal->setDsApelido($apelido);   
                $ramal->setCdSetor($row["CD_SETOR"]);
                
            }
            $conn->closeConnection($conexao);
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
       return $ramal;
	}   
}
