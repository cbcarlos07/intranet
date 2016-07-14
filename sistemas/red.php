<?php
$sis = $_GET['sis'];

switch($sis){
	case 'soul':
	   header('Location:http://10.51.28.10/atendimento');
	break;
	case 'pep':
	    header('Location:http://10.51.28.10/mvpep');
	break;
}

?>