<?php


require_once('conexao.php');

sleep(3);

$nome=$_POST['usuarioNome'];
$use=$_POST['usuarioUser'];
$nivel=$_POST['usuarioRestricao'];
$pass=$_POST['usuarioSenha'];

/*switch($_POST['acao']){
	case 'cadastro':
		
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

//$duplicidade = false;
/*$comando = "SELECT * FROM usuarios WHERE usuario='".$user."'";
if($duplicidade = mysqli_query($conexao, $comando)){*/
  //echo "Tem";
/*  $contar = mysqli_num_rows($duplicidade);
  echo '<script>alert("ja existe usuario cadastrado com esses dados '.$contar.');
  window.location="http://localhost/intranet/Admin/nutricao.php";
  </script>';*/
 // header('location:http://localhost/intranet/Admin/nutricao.php');
/*}else{*/
	
$comando = "insert into usuarios (nome,usuario,nivel,senha) values  ('$nome','$user','$nivel','$pass')";

$query = mysqli_query($conexao,$comando);

header('location:http://localhost/intranet/Admin/nutricao.php');
//mysqli_close($conexao);


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