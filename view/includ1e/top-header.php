<?php 
  $ip = $_SERVER['SERVER_ADDR'];
  $add = 'http://'.$ip.'/intranet/login';
?>
<header class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-5 header-logo">
					<br>
                                        <a href="<?php echo $add; ?>"><img src="../img/LOGOHAM.png" alt="" class="img-responsive logo" width="25%"></a>
				</div>

				<div class="col-md-7">
					<nav class="navbar navbar-default">
					  <div class="container-fluid nav-bar">
					    <!-- Marca e alternância se agrupados para melhor visualização móvel -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					    </div>