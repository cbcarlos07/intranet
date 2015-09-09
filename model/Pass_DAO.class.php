<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'ConnectionFactory.class.php';
class Rec_Pass_DAO {
    public function rec_pass($login){
        
        $conn = new ConnectionFactory();
        $con = $conn->getConnection();
        $pass = null;
        try{
                $query = "select dbaadv.senhausuariomv(:login) SENHA FROM DUAL";
                $stmt = oci_parse($con, $query);
            
                oci_bind_by_name($stmt, ':login', $login, -1);
            
            oci_execute($stmt);
            if(($row = oci_fetch_array($stmt, OCI_ASSOC)) != false){
                $pass = $row["SENHA"];
            }
            
            $conn->closeConnection($con);
        } catch ( PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
        return $pass;
    }
    
    public function rec_nome($login){
        
        $conn = new ConnectionFactory();
        $con = $conn->getConnection();
        
        $pass = null;
        try{
                $query = "SELECT U.NM_USUARIO NOME FROM DBASGU.USUARIOS U WHERE U.CD_USUARIO = :login";
                $stmt = oci_parse($con, $query);
            
                oci_bind_by_name($stmt, ':login', $login, -1);
            
            oci_execute($stmt);
            if(($row = oci_fetch_array($stmt, OCI_ASSOC)) != false){
                $pass = $row["NOME"];
            }
            
            $conn->closeConnection($con);
        } catch ( PDOException $ex) {
            echo "Erro: ".$ex->getMessage();
        }
        return $pass;
    }
    
}
