<?php
 
 $sis = $_GET['sis'];

?>


<html>
<head>
<title>tela</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css.css">
<link rel="shortcut icon" href="imagens/ham.png">
</head>
<div id="imagem">
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (tela.jpg) -->
<table id="Tabela_01" width="1280" height="687" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="2">
			<img src="imagens/index_01.png" width="1280" height="585" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img src="imagens/index_02.png" width="934" height="102" alt=""></td>
		<td>
			<a  href="red.php?sis=<?php echo $sis; ?>">
				<img src="imagens/tela_03.png" width="346" height="75" border="0" alt="" onmouseover="this.src='imagens/botao.png'" onmouseout="this.src='imagens/tela_03.png'"

				></a></td>
	</tr>
	<tr>
		<td>
			<img src="imagens/index_04.png" width="346" height="27" alt=""></td>
	</tr>
</table>
<!-- End Save for Web Slices -->
</div>
</body>
</html>