<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Tipo_Refeicao_DAO {
    
    
    public function insert (Tipo_Refeicao $tp){
        require_once 'ConnectionFactory.class.php';
        $teste = false;
        $conn = new ConnectionFactory();   
        $conexao = $conn->getConnection();
        $sql_text = "INSERT INTO DBAADV.INTRA_TP_REFEICAO (CD_TP_REFEICAO, DS_TP_REFEICAO, DS_HORARIO)
		     VALUES (:CDTP, :DSTP, :DSH)";
        try {
            echo "Nome: ".
            $codigo = $this->getCodigo();
            $descricao = $tp->getDescricao();
            $horario = $tp->getHorario();
            $statement = oci_parse($conexao, $sql_text);
            oci_bind_by_name($statement, ":CDTP", $codigo);
	    oci_bind_by_name($statement, ":DSTP", $descricao);
            oci_bind_by_name($statement, ":DSH", $horario);
            oci_execute($statement,  OCI_COMMIT_ON_SUCCESS);
	    $teste = true;
            $conn->closeConnection($conexao);
        } catch (PDOException $ex) {
            echo " Erro: ".$ex->getMessage();
        }
        return $teste;
    }
    
    
    public function update (Tipo_Refeicao $tp){
        require_once 'ConnectionFactory.class.php';
        $conn = new ConnectionFactory();   
        $teste = false;
        $conexao = $conn->getConnection();
        $sql_text = "UPDATE DBAADV.INTRA_TP_REFEICAO SET DS_TP_REFEICAO = :DSTP, DS_HORARIO = :DSH WHERE CD_TP_REFEICAO = :CDTP ";
        try {
            $codigo = $tp->getCodigo();
            $descricao = $tp->getDescricao();
            $horario = $tp->getHorario();
            $statement = oci_parse($conexao, $sql_text);
            oci_bind_by_name($statement, ":CDTP", $codigo);
	    oci_bind_by_name($statement, ":DSTP", $descricao);
            oci_bind_by_name($statement, ":DSH", $horario);
            oci_execute($statement,  OCI_COMMIT_ON_SUCCESS);
            $teste = true;
            $conn->closeConnection($conexao);
        } catch (PDOException $ex) {
            echo " Erro: ".$ex->getMessage();
        }
        return $teste;
    }

    public function  getCodigo(){
                 $conn = new ConnectionFactory();   
                 $conexao = $conn->getConnection();
                 $i = 0;
		 $sql_text = "SELECT DBAADV.SEQ_INTRA_TP_REFEICAO.NEXTVAL CODIGO FROM DUAL";
				
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
        
      public function delete($codigo){
          require_once 'ConnectionFactory.class.php';
          $teste = false;
          $conn = new ConnectionFactory();
          $connection = $conn->getConnection();
          $sql_text = "DELETE FROM DBAADV.INTRA_TP_REFEICAO WHERE ROWID = :CDTP";
          $select = "SELECT ROWID FROM DBAADV.INTRA_TP_REFEICAO R WHERE CD_TP_REFEICAO = :CDTP";
          try{
              $statement = oci_parse($connection, $select);
              oci_bind_by_name($statement, ":CDTP", $codigo);
              $rowid = oci_new_descriptor($connection, OCI_D_ROWID);
              oci_define_by_name($statement, "ROWID", $rowid);
              oci_execute($statement);
              while(oci_fetch($statement)){
                $nrows = oci_num_rows($statement);
                $delete = oci_parse($connection, $sql_text);
                oci_bind_by_name($delete, ":CDTP", $rowid, -1, OCI_B_ROWID);
                oci_execute($delete, OCI_COMMIT_ON_SUCCESS);       
              }
            $teste = true;
          } catch (PDOException $ex) {
              echo "Erro: ".$ex->getMessage();
          }
          return $teste;
      }
      
      public function  verificarDulicidade($descricao){
          require_once  'ConnectionFactory.class.php';
         $conn = new ConnectionFactory();   
         $conexao = $conn->getConnection();
         $i = 0;
         $sql_text = "SELECT * FROM DBAADV.INTRA_TP_REFEICAO I WHERE I.DS_TP_REFEICAO = :DSTP ";
         try {
           $stmt = oci_parse($conexao, $sql_text);                                            
           oci_bind_by_name($stmt, ":DSTP", $descricao);
           oci_execute($stmt);
           if ($row = oci_fetch_array($stmt, OCI_ASSOC)){
                $i = 1; 
            }
            $conn->closeConnection($conexao);
        } catch (PDOException $ex) {
           echo " Erro: ".$ex->getMessage();
        }
        return $i;
    }
    
    public function  lista_tipo($desc){
        require_once 'ConnectionFactory.class.php';
        require '/services/TipoRefeicaoList.class.php';
        require_once 'bean/Tipo_Refeicao.class.php';
         $conn = new ConnectionFactory();   
         $conexao = $conn->getConnection();                 
        // $tipo = null;
         $tipoList = new TipoRefeicaoList();
         try {
             if($desc != ""){
                 $sql_text = "SELECT 
                                I.CD_TP_REFEICAO
                                ,I.DS_TP_REFEICAO
                                ,I.DS_HORARIO_INICIAL || ' ÀS ' || I.DS_HORARIO_FINAL DS_HORARIO
                              FROM DBAADV.INTRA_TP_REFEICAO I
                              WHERE I.DS_TP_REFEICAO LIKE :DSTP ";
                 $statement = oci_parse($conexao, $sql_text);
                 $parametro = "%".$desc."%";
                 oci_bind_by_name($statement, ":DSTP", $parametro,-1);
             }else{
                 $sql_text = "SELECT 
                                I.CD_TP_REFEICAO
                                ,I.DS_TP_REFEICAO
                                ,I.DS_HORARIO_INICIAL || ' ÀS ' || I.DS_HORARIO_FINAL DS_HORARIO
                              FROM DBAADV.INTRA_TP_REFEICAO I
                              ORDER BY 1
                             ";
                 $statement = oci_parse($conexao, $sql_text);	
             }
              oci_execute($statement);
              while($row = oci_fetch_array($statement, OCI_ASSOC)){
                  $tipo = new Tipo_Refeicao(); 
                  $tipo->setCodigo($row["CD_TP_REFEICAO"]);
                  $tipo->setDescricao($row["DS_TP_REFEICAO"]);
                  $tipo->setHorario($row["DS_HORARIO"]);
                  $tipoList->addTipo_Refeicao($tipo);
              }
               $conn->closeConnection($conexao);
         } catch (PDOException $ex) {
               echo "Erro: ".$ex->getMessage();
         }
         return $tipoList;
    }
     
    
    public function  recuperar_tipo($id){
        require_once 'ConnectionFactory.class.php';
        $conn = new ConnectionFactory();   
        $conexao = $conn->getConnection();   
        $tipo = null;
       // echo "Codigo: $id";
        $sql_text = "SELECT * FROM DBAADV.INTRA_TP_REFEICAO I WHERE I.CD_TP_REFEICAO = :CDTP";
        try {
            $statement = oci_parse($conexao, $sql_text);         
            oci_bind_by_name($statement, ":CDTP", $id);
            oci_execute($statement);
            if($row = oci_fetch_array($statement, OCI_ASSOC)){
                $tipo = new Tipo_Refeicao();
                $tipo->setCodigo($row["CD_TP_REFEICAO"]);
                $tipo->setDescricao($row["DS_TP_REFEICAO"]);
                //$tipo->setHorario($row["DS_HORARIO"]);
                
            }
            $conn->closeConnection($conexao);
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
        return $tipo;
    }
    
     public function  contarRegistros(){
        $conn = new ConnectionFactory();   
        $conexao = $conn->getConnection();   
        $tipo = 0;
        $sql_text = "SELECT COUNT(*) TOTAL FROM DBAADV.INTRA_TP_REFEICAO ";
        try {
            $statement = oci_parse($conexao, $sql_text);                     
            oci_execute($statement);
            if($row = oci_fetch_array($statement, OCI_ASSOC)){
                $tipo = $row["CD_TP_REFEICAO"];
            }
            $conn->closeConnection($conexao);
        } catch (PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
        return $tipo;
    }
} // fim da classe