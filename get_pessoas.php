<?php
	session_start();

	if(!isset($_SESSION['usuario'])){
		header('location: index.php?erro=1');
	}


	require_once('db.class.php');
	$nome_pessoa = $_POST['nome_pessoa'];

	$cod_usuario = $_SESSION['cod_usuario'];

	$objBD = new bd();
	$link = $objBD->conexao_mysql();


	//query que busca todos os valores de usuarios mesmo se nao tiverem seguidores..
	$sql = " SELECT u.*, us.* "; 
	$sql.=" FROM usuarios u LEFT JOIN usuarios_seguidores us ON (us.fk_cod_usuario = $cod_usuario AND u.cod_usuario = 	us.seguidor_cod_usuario)";
	$sql.=" WHERE u.usuario like '%$nome_pessoa%' AND u.cod_usuario != $cod_usuario ";

	//executando a query.
	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){

		while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			echo '<a href="#" class="list-group-item">';
				echo '<strong>'.$registro['usuario'].'</strong> <small>'.$registro['email'].'</small>';

				//if ternario para verificar se existe registro dentro da tabela usuarios_seguidores, e recebe valor de sim ou nao
				$esta_seguindo_usuario_sn = isset($registro['cod_usuario_seguidor']) && !empty($registro['cod_usuario_seguidor']) ? 'S' : 'N';

				//variavel para style dos botoes
				$btn_seguir_display ='block';
				$btn_deixar_seguir_display = 'block';

				//testa se a variavel esta_seguind_usuario_ tem o valor de S OU NAO caso esteja, determinar s visibilidade do botao
				if($esta_seguindo_usuario_sn == 'N'){

					$btn_deixar_seguir_display = 'none';

				}else{

					$btn_seguir_display ='none';
				}

				echo '<p class="list-group-item-text pull-right">';
					//botao de seguir
					echo '<button type="button" id="btn_seguir_'.$registro['cod_usuario'].'" style="display:'.$btn_seguir_display.'" 
					class="btn btn-primary btn_seguir" data-cod_usuario ="'.$registro['cod_usuario'].'">Seguir</button>';



					//botao de deixar de seguir
					echo '<button type="button" id="btn_deixar_seguir_'.$registro['cod_usuario'].'" style="display:'.$btn_deixar_seguir_display.'" class="btn btn-default btn_deixar_seguir" data-cod_usuario ="'.$registro['cod_usuario'].'">Deixa de Seguir</button>';

				echo '</p>';
				echo '<div class="clearfix"></div>';

			echo '</a>';
		}

	}else{
		echo "erro na consulta de usuarios no banco de dados, procure o adminstrador!";
	}


?>