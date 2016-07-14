<?php   
 $acao = isset($_POST['acao']);
 
     
      function  getConnection(){
		  $ora_user = "dbamv"; 
		  $ora_senha = "hosp#dvmns"; 
		  $ora_bd = "(DESCRIPTION=
                        (ADDRESS_LIST=
                        (ADDRESS=(PROTOCOL=TCP)(HOST=10.51.26.63)(PORT=1521))
                        )
                        (CONNECT_DATA=
                        (SERVICE_NAME=smlmv)
                        )
                        )"; 
            $ora_conexao = oci_connect($ora_user, $ora_senha, $ora_bd);
        return $ora_conexao;
                    
    }
    
     function closeConnection($connection){
        $ora_conexao = oci_close($connection);
        
    }
     function getSetores(){
		//$connection = getConnection();
		//$lista = new RamalList();
		 /* $ora_user = "dbamv"; 
		  $ora_senha = "hosp#dvmns"; 
		  $ora_bd = "(DESCRIPTION=
                        (ADDRESS_LIST=
                        (ADDRESS=(PROTOCOL=TCP)(HOST=10.51.26.63)(PORT=1521))
                        )
                        (CONNECT_DATA=
                        (SERVICE_NAME=smlmv)
                        )
                        )"; */
            $ora_conexao = getConnection();
		    $sql_text = "select s.cd_setor, s.nm_setor from dbamv.setor s";
		
            $statement = oci_parse($ora_conexao, $sql_text);
           // oci_bind_by_name($statement, ":chapa", $chapa, -1);
            oci_execute($statement);
            oci_close($ora_conexao);
        		return $statement;
	}

	function insertSetores(){
		$teste = false;
		$ora_conexao = getConnection();
		$sql_text = "INSERT INTO DBAADV.INTRA_RAMAL 
					(CD_RAMAL, DS_RAMAL, DS_DESCRICAO, CD_SETOR, SN_VISUALIZA)
					VALUES 
					(:cdramal, :dsramal, :dsdesc, :cdsetor, :snvisualiza)";
					try {
							$codigo  = getSequencia();
							$ramal   = isset($_POST['ramal']);
							$descr   = isset($_POST['descricao']);
							$setor   = isset($_POST['setor']);
							$visualiza = isset($_POST['visualiza']);
							echo "Codigo do ramal: ".$codigo."<br>";
							echo "Setor do ramal: ".$setor."<br>";
							$statement = oci_parse($ora_conexao, $sql_text);
							oci_bind_by_name($statement, ":cdramal", $codigo);
							oci_bind_by_name($statement, ":dsramal", $ramal);
							oci_bind_by_name($statement, ":dsdesc", $codigo);
							oci_bind_by_name($statement, ":cdsetor", $setor);
							oci_bind_by_name($statement, ":snvisualiza", $visualiza);
							oci_execute($statement,  OCI_COMMIT_ON_SUCCESS);
							//echo "<script>  alert('Cadastrado')</script>";
							$teste = true;
							oci_close($ora_conexao);
				} catch (PDOException $ex) {
				    echo "Erro: ".$ex->getMessage();
			  }
            
        		return $teste;
	}
	
	

	

function getSequencia(){
			$n = 0;
            $ora_conexao = getConnection();
		    $sql_text = "SELECT DBAADV.SEQ_INTRA_RAMAL.NEXTVAL CODIGO FROM DUAL";
		
            $statement = oci_parse($ora_conexao, $sql_text);           
            oci_execute($statement);
			if($row == $oci_fetch($statement)){
				$n = $row['CODIGO'];
			}
            oci_close($ora_conexao);
        		return $n;
	}

?>