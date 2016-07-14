<!doctype html>
<html>
<link href="tab/tabulous/demo/demo/tabulous.css" rel="stylesheet" type="text/css" />

<!---topo--->
<?php require ('include/ie9/head.php')?>

<body>
<!---menu--->
<?php include 'include/ie9/menu.php'; menu('2')?>

<div class="linhaext">
	
    <div id="wrapper">

				<div id="tabs">
		<ul style="margin:0 auto;list-style:none;">
			<li style="float:left"><a href="#tabs-1" title="">Almoço e Janta</a></li>
			<li style="float:left"><a href="#tabs-2" title="">Café da Manhã</a></li>
		</ul>

		<div id="tabs_container">
			
		


		<div id="tabs-1">
			<p>
            
                <?php include 'Admin/php/consulta_cardpainel.php';?>
                <ul class="listacardapio">
                
                <?php while ($dados = mysqli_fetch_array($query1)){?>
                <li><p id="espaco_p"><strong>Prato Principal:</strong> <?php echo $dados['principal'] ?></p></li>
                <li><p id="espaco_p"><strong>Acompanhamento:</strong> <?php echo $dados['acompanhamento'] ?></p></li>
                <li><p id="espaco_p"><strong>Salada:</strong> <?php echo $dados['salada'] ?></p></li>
                <li><p id="espaco_p"><strong>Caldos:</strong> <?php echo $dados['caldos'] ?></p></li>
                <li><p id="espaco_p"><strong>Sucos:</strong> <?php echo $dados['sucos'] ?></p></li>
                <li><p id="espaco_p" class="p6"><strong>Sobremesa:</strong> <?php echo $dados['sobremesa'] ?></p></li>
                <?php } ?>
                </ul>
                </p>	   
		</div>

		<div id="tabs-2">
			  <p>Não há nenhum Cadastro</p>   
			
		</div>

		<div id="tabs-3">
			    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem.</p><p> Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales.</p>
		</div>

		</div><!--End tabs container-->
		
	</div><!--End tabs-->




	

		
	</div>

	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="tab/tabulous/demo/demo/tabulous.js"></script>
<script type="text/javascript" src="tab/tabulous/demo/demo/js.js"></script>
		
</div>
</body>
</html>