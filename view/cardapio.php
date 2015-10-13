
<html lang="en">
<?php include '../include/header.php'; ?>
<body>
	
	<!-- ====================================================
	header seçao -->
                                            <?php
                                              include ('../include/top-header.php');
                                            ?>
					    <!-- Colete as ligações nav, formulários e outros conteúdos para alternar -->
					      <?php 
                                                include ('../include/menu.php');
                                                menu('2');
                                                
                                             ?>
                                                
                                            <!-- /navbar-collapse -->
					  <?php
                                              include '../include/button-header.php';
                                             ?><!-- fim do header area -->

			<!--  seçao sistemas -->
                        
                <script type="text/javascript">
                $('#vai').('show');
                
                </script>                    
                        
			<section class="about text-center" id="about">
				<div class="container">
                                    <H2>Cardapio</H2>
                                    
                                   <div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Cafe da manha</a></li>
    <li><a href="#tab2" data-toggle="tab">Almoço</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      <p id="vai">Café da Manhã</p>
    </div>
    <div class="tab-pane" id="tab2">
      <p>Almoço</p>
    </div>
  </div>
</div>
                                  
				</div>
                
			</section><!-- end of about section -->


	

	<!-- script tags
	============================================================= -->
	<script src="js/jquery-2.1.1.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>