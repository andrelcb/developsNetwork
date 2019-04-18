<?php
	session_start();

	if(!isset($_SESSION['usuario'])){
		header('location: index.php?erro=1');
	}


	require_once('db.class.php');
	$cod_usuario = $_SESSION['cod_usuario'];

	$objBD = new bd();
	$link = $objBD->conexao_mysql();

	$sql = " SELECT date_format(c.data_inclusao,'%d %b %Y %T') as data, c.cod_compartilhe,  c.compartilhe,u.usuario";
	$sql.= " FROM compartilhe c JOIN usuarios u  ON(c.fk_cod_usuario = u.cod_usuario)";
	$sql.= " WHERE fk_cod_usuario = $cod_usuario ";
	$sql.= " OR fk_cod_usuario IN(select seguidor_cod_usuario from usuarios_seguidores where fk_cod_usuario = $cod_usuario)";
	$sql.=	" ORDER BY data_inclusao DESC";

	//executando a query.
	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){

		while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			echo '<a href="#" class="list-group-item">';
				echo '<h4 class="list-group-item-heading">'.$registro['usuario'].'<small>- '.$registro['data'].'</small></h4>';
				echo '<p class="list-group-item-text">'.$registro['compartilhe'].'</p>';

				//botao excluir:
				echo '<p class="list-group-item-text pull-right">';
					echo '<button type="button" class="btn btn-default btn_excluir" data-cod_compartilhe="'.$registro['cod_compartilhe'].'">Excluir</button>';

				echo '</p>';
				echo '<div class="clearfix"></div>';

			echo '</a>';

			
		}

	}else{
		echo "erro na consulta de compartilhamentos no banco de dados, procure o adminstrador!";
	}


?>