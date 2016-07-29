<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Funcionario_DAO{
      
    private $p= null;



    public function getFuncionario($usuario){
            //echo "<script>alert($codigo);</script>";
          $p= new PDO('odbc:Driver={SQL Server};Server=10.51.26.2;Database=APS; Uid=sa;Pwd=1844');
          
          $stmt = $p->prepare("select 
                    ee.int_2 Chapa
                    , n.name_first Nome
                    , jt.[name] Funcao
                    , jt.[id_job_title] code_func
                    , le.[name] Departamento
                    , le.[id_legal_entity] code_depart     
                 from Person p
                      join Natural_Person n on (p.id_person = n.id_natural_person)
                      join Enrollment e on (p.id_person = e.id_person)
                      join Enrollment_Employee ee on (e.id_enrollment = ee.id_enrollment)
                      join Job_Title jt on (ee.id_job_title = jt.id_job_title)
                      join Legal_Entity le on (e.id_department = le.id_legal_entity)
                where  p.id_object_class = 97404
                      and ee.int_2 = $usuario
                order by 4");
          //$stmt->bindParam(':codigo', $usuario,PDO::PARAM_STR);      
          $retorno = $stmt->execute();
          
                if($retorno > 0){
                    $result = $stmt->fetch();
                    //echo $result['Nome'];
                    $nome = $result['Nome'];
                }else{
                    $nome = "Nome nao encontrado";
                }
          return $nome;      

    }
    
    public function agendar($cardapio, $funcionario){
        require_once 'ConnectionFactory.class.php';
        $teste = false;
        $conn = new ConnectionFactory();   
        $conexao = $conn->getConnection();
        $sql_text = "INSERT INTO DBAADV.INTRA_AGENDAMENTO (CD_TIPO_PRATO, D_TIPO_PRATO)
		     VALUES (:CDTP, :DSTP)";
        try {
            
            echo "Nome: ".
            $codigo = $this->getCodigo();
            $descricao = $tp->getDescricao();
            $statement = oci_parse($conexao, $sql_text);
            oci_bind_by_name($statement, ":CDTP", $codigo);
	    oci_bind_by_name($statement, ":DSTP", $descricao);
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
		 $sql_text = "SELECT DBAADV.SEQ_INTRA_TIPO_PRATO.NEXTVAL CODIGO FROM DUAL";
				
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
          $sql_text = "DELETE FROM DBAADV.INTRA_TIPO_PRATO WHERE ROWID = :CDTP";
          $select = "SELECT ROWID FROM DBAADV.INTRA_TIPO_PRATO R WHERE CD_TIPO_PRATO = :CDTP";
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
      
    
}// FIM DA CLASSE