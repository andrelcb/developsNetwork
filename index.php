<?php

	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0 ;


?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Developers Network</title>
		<link rel="icon" type="imagem/png" href="imagens/logo_dn.png" />

		<link rel="stylesheet" type="text/css" href="bootstrap/estilo.css"/>
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
		<script>
			$(document).ready(function(){
				//verificar se os campos de usuario e senha foram preenchidos
				$('#btn_login').click(function(){

					var campo_vazio = false;
					
					if($('#campo_usuario').val() == ''){
						$('#campo_usuario').css({'border-color': 'red'});
						var campo_vazio = true;
					}else{

						$('#campo_usuario').css({'border-color': '#CCC'});
					}

					if($('#campo_senha').val() == ''){
						$('#campo_senha').css({'border-color': 'red'});
						var campo_vazio = true;
					}else{
						$('#campo_senha').css({'border-color': '#CCC'});
					}


					if(campo_vazio) return false;
				})


			})				
		</script>
	</head>

	<body>
		<!-- Static menu -->
	    <nav class="navbar navbar-primary navbar-static-top">
	      <div id="main-menu" class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a id="" href=index.php><img id="Logo" src="imagens/logo_dn.png" /></a>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="inscrevase.php">Inscrever-se</a></li>
	            <!-- Tag de impressão curta do php atribuindo "open" a class do li, caso de erro no login, menu ficara aberto apos erro, por conta da class open -->
	            <li class="<?= $erro == 1 ? 'open': ''?>">
	            	<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
					<ul class="dropdown-menu" aria-labelledby="entrar">
						<div class="col-md-12">
				    		<p>Você possui uma conta?</h3>
				    		<br />
							<form method="post" action="validar_acesso.php" id="formLogin">
								<div class="form-group">
									<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" required ="requiored">
								</div>
								
								<div class="form-group">
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" required="requiored">
								</div>
								
								<button type="submit" class="btn btn-primary" id="btn_login">Entrar</button>
								<br>
								<?php
									if($erro == 1){
										echo'<font color="red">usuario ou senha invalids(s)</font>';
									}
								?>
							</form>
                        </ul>
                    </li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </nav>


	    <div id="apresenta" class="container">

	      <!-- Main component for a primary marketing message or call to action -->
	       <div class="jumbotron">
	        <h1 style="color: #000; margin-top: 100px;text-align: center;"><b>Bem vindo ao Develops Network<b/></h1>
	        <p style="color: #000; 	text-align: center;"><b>Compartilhe de suas ideias..<b></p>
	      </div>

	      <div class="clearfix"></div>
		</div>

	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>