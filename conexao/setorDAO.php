<?php
    include ('ConnectionFactory.php');
	public function getSetores(){
		$connection = getConnection();
		//$lista = new RamalList();
		$sql_text = "select s.cd_setor, s.nm_setor from dbamv.setor s";
		try {
            $statement = oci_parse($connection, $sql_text);
           // oci_bind_by_name($statement, ":chapa", $chapa, -1);
            oci_execute($statement);
            
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
		return $statement;
	}
	
?>