<?php

//if ternario, depos do? verficar se e verdadeiro depois dos : verificar se e falso e atribui valor 0
	$erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario'] : 0;

	$erro_email = isset($_GET['erro_email']) 	? $_GET['erro_email'] : 0;

?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Developers Network - Registrar</title>
		<link rel="icon" type="imagem/png" href="imagens/logo_dn.png" />


		<!-- link arquivo css -->
		<link rel="stylesheet" type="text/css" href="bootstrap/estilo.css"/>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
	</head>

	<body>

		<!-- Static navbar -->
	    <nav id="menu" class="navbar navbar-primary navbar-static-top">
	      <div id="main-menu" class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a href=index.php><img id="Logo" src="imagens/logo_dn.png" /></a>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="index.php">Voltar para o Inicio</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<br /><br />

	    	<div class="col-md-4"></div>
	    	<div class="col-md-4">
	    		<h3>Inscreva-se já.</h3>
	    		<br />
				<form method="post" action="registra-usuario.php" enctype="multipart/form-data" id="formCadastrarse">
					<div class="form-group">
						<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required="requiored">
						<?php
							if($erro_usuario){ // valor de 1/true or 0//false
								echo "<font color='red'>Usuario ja existe</font>";
							}
						?>
					</div>

					<div class="form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">
						<?php
							if($erro_email){
								echo "<font color='red'>E-mail ja existe</font>";
							}
						?>
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored">
					</div>
					<button type="submit" class="btn btn-primary form-control">Inscreva-se</button>

				</form>
			</div>
	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>