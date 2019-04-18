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
				$('#btn_compartilhe').click(function(){

					if($('#text_compartilhe').val().length > 0){

						$.ajax({
							url: 'inclui_compartilhe.php',
							method: 'post',
							data: $('#form_compartilhe').serialize(),
							success: function(data){
								$('#text_compartilhe').val('');
								atualizarCompartilhe();
								atualizarPost();
							}
						});
					}
				});

				function atualizarCompartilhe(){
					//carregar os post a partie
					$.ajax({
						url: 'get_compartilhe.php',
						success: function(data){
							$('#compartilhe').html(data);

							$('.btn_excluir').click(function(){	
								var cod_compartilhe = $(this).data('cod_compartilhe');

								$.ajax({
									url: 'deletar_post.php',
									method: 'post',
									data:{ excluir_post_usuario: cod_compartilhe},
									success: function(data){
										atualizarCompartilhe();
									}

								});

							});

						}
					});
				}
				function atualizarSeguidores(){
					//carregar a qtde a comprtilhamento automaticamente
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

				atualizarCompartilhe();
				atualizarPost();
				atualizarSeguidores();
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
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>



	    <div class="container">
	    	<!-- DIV DA DIRETA DO CONTÉUDO -->
	    	<div class="col-md-3">
	    		<div class="panel panel-primary">
	    			<div class="panel-body ">
	    				<h4><?= $_SESSION['usuario']?></h4>

	    				<br>

	    				<div id="post" class="col-md-6">
	    				</div>

	    				<div id ="seguidores" class="col-md-6">
	    				</div>
	    			</div>
	    		</div>
	    	</div>

	    	<!-- DIV CENTRAL DO CONTÉUDO -->
	    	<div class="col-md-6">
	    		<div class="panel panel-primary"  id="compartilhe_panel">
	    			<div class="panel-body">
	    				<form class="input-group" id="form_compartilhe">
	    					<input type="text" id="text_compartilhe" class="form-control" name="text_compartilhe" placeholder="Compartilhe suas ideias..." maxlength="240">
	    					<span class="input-group-btn">
	    						<button class="btn btn-primary" id="btn_compartilhe" type="button">Compartilhar</button>
	    					</span>
	    				</form>
	    			</div>
	    		</div> <!-- FIM DO PANEL DE COMPARTILHAMENTO -->

	    		<!-- div de compartilhamentos dos usuarios -->
	    		<div id="compartilhe" class="list-group"></div>
			</div>

			<!-- DIV DA ESQUERDA  DO CONTÉUDO -->
			<div class="col-md-3">
				<div class="panel panel-primary">
					<div class="panel-body">
						<h4><a href="procurar_pessoas.php">Procurar por developers</h4>
					</div>
				</div>
			</div>

	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>