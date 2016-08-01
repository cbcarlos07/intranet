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
    
    public function agendar($cdc, $cdf, $nmf){
        require_once 'ConnectionFactory.class.php';
        $teste = false;
        $conn = new ConnectionFactory();   
        $conexao = $conn->getConnection();
        $sql_text = "INSERT INTO DBAADV.INTRA_AGENDAMENTO (CD_CARDAPIO, CD_FUNCIONARIO, NM_FUNCIONARIO)
		     VALUES (:CDC, :CDF, :NMF)";
        try {
            
            //echo "Nome: ".
            //$codigo = $this->getCodigo();
            //$descricao = $tp->getDescricao();
            $statement = oci_parse($conexao, $sql_text);
            oci_bind_by_name($statement, ":CDC", $cdc);
	    oci_bind_by_name($statement, ":CDF", $cdf);
            oci_bind_by_name($statement, ":NMF", $nmf);
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
        
      public function delete($card, $func){
          require_once 'ConnectionFactory.class.php';
          $teste = false;
          $conn = new ConnectionFactory();
          $connection = $conn->getConnection();
          $sql_text = "DELETE FROM DBAADV.INTRA_AGENDAMENTO WHERE ROWID = :CDP";
          $select = "SELECT ROWID FROM DBAADV.INTRA_AGENDAMENTO I WHERE I.CD_CARDAPIO  = :CDP AND I.CD_FUNCIONARIO = :CDF";
          try{
              $statement = oci_parse($connection, $select);
              oci_bind_by_name($statement, ":CDP", $card);
              oci_bind_by_name($statement, ":CDF", $func);
              $rowid = oci_new_descriptor($connection, OCI_D_ROWID);
              oci_define_by_name($statement, "ROWID", $rowid);
              oci_execute($statement);
              while(oci_fetch($statement)){
                $nrows = oci_num_rows($statement);
                $delete = oci_parse($connection, $sql_text);
                oci_bind_by_name($delete, ":CDP", $rowid, -1, OCI_B_ROWID);
                oci_execute($delete, OCI_COMMIT_ON_SUCCESS);       
              }
            $teste = true;
          } catch (PDOException $ex) {
              echo "Erro: ".$ex->getMessage();
          }
          return $teste;
      }
      
    public function  verificarCadastro($cardapio, $func){
          require_once  'ConnectionFactory.class.php';
         $conn = new ConnectionFactory();   
         $conexao = $conn->getConnection();
         $i = 0;
         $sql_text = "SELECT * FROM DBAADV.INTRA_AGENDAMENTO I
                        WHERE I.CD_CARDAPIO = :CARD
                            AND I.CD_FUNCIONARIO = :FUNC";
         try {
           $stmt = oci_parse($conexao, $sql_text);                                            
           
           oci_bind_by_name($stmt, ":CARD", $cardapio);
           oci_bind_by_name($stmt, ":FUNC", $func);
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
      
      
}// FIM DA CLASSE