<?php

	session_start();
	//operador negação testaar ao contrario da existencia.
	if(!isset($_SESSION['usuario'])){
		header('location: index.php?erro=1');
	}

?>


<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Developers Network - Inicio</title>

		<link rel="icon" type="imagem/png" href="imagens/logo_dn.png" />

		<!-- link arquivo css -->
		<link rel="stylesheet" type="text/css" href="bootstrap/estilo.css"/>


		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<script type="text/javascript">
			$(document).ready(function(){
				//associar o evento de click para o botao
				$('#btn_procurar').click(function(){

					if($('#nome_pessoa').val().length > 0){

						$.ajax({
							url: 'get_pessoas.php',
							method: 'post',
							data: $('#form_procurar_pessoa').serialize(),
							success: function(data){
								$('#pessoas').html(data);

								$('.btn_seguir').click(function(){
									var cod_usuario = $(this).data('cod_usuario');

									$('#btn_seguir_' + cod_usuario).hide();
									$('#btn_deixar_seguir_' + cod_usuario).show();

									$.ajax({
										url: 'seguir.php',
										method: 'post',
										data: {seguir_cod_usuario: cod_usuario},
										success: function(data){
										}

									});
								});

								$('.btn_deixar_seguir').click(function(){
									var cod_usuario = $(this).data('cod_usuario');

									$('#btn_seguir_'+cod_usuario).show();
									$('#btn_deixar_seguir_'+cod_usuario).hide();

									$.ajax({
										url: 'dexair_seguir.php',
										method: 'post',
										data: {deixar_seguir_cod_usuario: cod_usuario},
										success: function(data){
										}

									});

								});

							}
						});
					}

				});

				function atualizarSeguidores(){
					//carregar a qtde a seguidores automaticamente
					$.ajax({
						url: 'atualizar_seguidores.php',
						success: function(data){
							$('#seguidores').html(data)
							atualizarSeguidores();
						}
					});
				}


				function atualizarPost(){
					//carregar a qtde a comprtilhamento automaticamente
					$.ajax({
						url: 'atualizar_post.php',
						success: function(data){
							$('#post').html(data)
						}
					});
				}
				atualizarSeguidores();
				atualizarPost();

			});
		</script>
	
	</head>

	<body>
		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a href=index.php><img id="Logo" src="imagens/logo_dn.png"/></a>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	          	<li><a href="home.php">Pagina Inicial</a></li>
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>



	    <div class="container">
	    	<!-- DIV DA DIRETA DO CONTÉUDO -->
	    	<div class="col-md-3">
	    		<div class="panel panel-primary">
	    			<div class="panel-body">
	    				<h4><?= $_SESSION['usuario']?></h4>
	    				<br>

	    				<!--Enviado por metodo ajax -->
	    				<div id="post" class="col-md-6"></div>
	    				<div id ="seguidores" class="col-md-6"></div>

	    			</div>
	    		</div>
	    	</div>

	    	<!-- DIV CENTRAL DO CONTÉUDO -->
	    	<div class="col-md-6">
	    		<div class="panel panel-primary"  id="compartilhe_panel">
	    			<div class="panel-body">
	    				<form class="input-group" id="form_procurar_pessoa">
	    					<input type="text" id="nome_pessoa" class="form-control" name="nome_pessoa" placeholder="Qual developer voce procura?" maxlength="240">
	    					<span class="input-group-btn">
	    						<button class="btn btn-primary" id="btn_procurar" type="button">Procurar</button>
	    					</span>
	    				</form>
	    			</div>
	    		</div> <!-- FIM DO PANEL DE COMPARTILHAMENTO -->

	    		<!-- div de compartilhamentos dos usuarios -->
	    		<div id="pessoas" class="list-group"></div>
			</div>

			<!-- DIV DA ESQUERDA  DO CONTÉUDO -->
			<div class="col-md-3">
				<div class="panel panel-primary">
					<div class="panel-body">
					</div>
				</div>
			</div>

	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>