<?php


include 'conexao.php';

switch ($_POST['acao']) {
    case 'cadastro':

        sleep(2);

        $nome = $_POST['usuarioNome'];
        $user = $_POST['usuarioUser'];
        $nivel = $_POST['usuarioRestricao'];
        $pass = $_POST['usuarioSenha'];


        $duplicidade = "select * from usuarios where usuario = '$user'";
        $dp = mysqli_query($conexao, $duplicidade);
        $contar = mysqli_num_rows($dp);

        if ($contar == 0) {

            $comando = "insert into usuarios (nome,usuario,nivel,senha) values  ('$nome','$user','$nivel','$pass');";

            $query = mysqli_query($conexao, $comando);

            if ($query)
                return 1;
            else
                return '2 ' . $comando;
        }else {
            echo '1';
        }
        break;


    case 'deletar':
        //print_r($_POST);
        $delid = $_POST['delete'];
        $qr = "DELETE from usuarios WHERE idUser = $delid";
        $ex = mysqli_query($conexao, $qr);
        if ($ex) {
            echo '1';
        }
        break;

    case 'consultar':
        $idforconsult = $_POST['editar'];
        $qr = "SELECT * FROM usuarios WHERE idUser = $idforconsult";
        $ex = mysqli_query($conexao, $qr);
        $st = mysqli_fetch_assoc($ex);
        //echo $st['nome'];
        //$_SESSION['nome'] = $st['nome'];
        //print_r($st);
        echo json_encode($st);
        break;

    case 'editar':
        $idforedit = $_POST['editar'];

        $u['nome'] = mysqli_real_escape_string($conexao, ($_POST['nome']));
        $u['usuario'] = mysqli_real_escape_string($conexao, ($_POST['usuario']));
        $u['nivel'] = mysqli_real_escape_string($conexao, ($_POST['nivel']));
        $u['senha'] = mysqli_real_escape_string($conexao, ($_POST['senha']));
        $u['senha'] = md5($u['senha']);

        foreach ($u as $key => $value) {
            $update[] = "$key = '$value'";
        }
        $update = implode(', ', $update);

        $qr = "UPDATE usuarios SET $update WHERE idUser = $idforedit";
        $ex = mysqli_query($conexao, $qr);
        //$st = mysqli_fetch_assoc($ex);
        //echo $st['nome'];
        //$_SESSION['nome'] = $st['nome'];
        //print_r($st);
        echo json_encode($st);
        break;
}	


//header('location:http://localhost/intranet/Admin/nutricao.php');


/*require_once('conexao.php');

sleep(3);

switch($_POST['acao']){
	case 'cadastro':
		
		echo '<script>alert(oi)</script>';
		$c['nome'] 		= mysqli_real_escape_string($conexao,($_POST['usuarioNome']));
		$c['usuario']   = mysqli_real_escape_string($conexao,($_POST['usuarioUser']));
		$c['nivel'] 	= mysqli_real_escape_string($conexao,($_POST['usuarioRestricao']));
		$c['senha'] 	= mysqli_real_escape_string($conexao,($_POST['usuarioSenha']));
		
		if(in_array('',$c)){
			echo '1';	
		}else{
			$c['senha'] = md5($c['senha']);
			$c['data_usuario'] = date('Y-m-d H:i:s');
			
			$campos = implode(',',array_keys($c));
			$values = "'".implode("', '",array_values($c))."'";		
			$qr = "INSERT INTO usuarios (".$campos.") VALUES (".$values.")";
			$st = mysqli_query($conexao,$qr) or die ('2');
			if(!empty($st)){
				echo $c['nome'].' '.$c['sobrenome'];
			}else{
				echo '2';	
			}
		}
	break;
	
}*/


/*switch ($nivel){
	case "Administrador":
	$nivel = 1;
	break;
	case "Nutricao":
	$nivel = 2;
	break;
	case "Telefonia";
	$nivel = 3;
	break;
}*/
//$contar = 0;
//$duplicidade = false;
/*$comando = "SELECT * FROM usuarios WHERE usuario='".$user."'";
if($duplicidade = mysqli_query($conexao, $comando)){*/
  //echo "Tem";
/*  $contar = mysqli_num_rows($duplicidade);
  echo '<script>alert("ja existe usuario cadastrado com esses dados '.$contar.');
  window.location="http://localhost/intranet/Admin/nutricao.php";
  </script>';*/
 // header('location:http://localhost/intranet/Admin/nutricao.php');
/*}else{
$comando = "insert into usuarios (nome,usuario,nivel,senha) values  ('$nome','$user','$nivel','$pass')";

$query = mysqli_query($conexao,$comando);

header('location:http://localhost/intranet/Admin/nutricao.php');
mysqli_close($conexao);
}*/

//echo "<script> alert('Duplicidade: ".$duplicidade."')

//$contar = mysqli_num_rows($duplicidade);
/*
if (!$duplicidade = mysqli_query($conexao, $comando)){
echo "<script> alert('Cadastrou');</script>";	
/*$comando = "insert into usuarios (nome,usuario,nivel,senha) values  ('$nome','$user','$nivel','$pass')";

$query = mysqli_query($conexao,$comando);

header('location:http://localhost/intranet/Admin/nutricao.php');
mysqli_close($conexao);
*/
/*}else{
	echo '<script>alert("ja existe usuario cadastrado com esses dados")</script>';
}
*/




?>