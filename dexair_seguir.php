<?php
	session_start();

	//operador negação testaar ao contrario da existencia.
	if(!isset($_SESSION['usuario'])){
		header('location: index.php?erro=1');
	}

	require_once('db.class.php');

	$cod_usuario = $_SESSION['cod_usuario'];
	$deixar_seguir_cod_usuario = $_POST['deixar_seguir_cod_usuario'];

	

	if($cod_usuario != '' && $deixar_seguir_cod_usuario != ''){
		
		$objBD = new bd();
		$link = $objBD->conexao_mysql();

		$sql = "DELETE FROM usuarios_seguidores WHERE fk_cod_usuario = $cod_usuario AND seguidor_cod_usuario = $deixar_seguir_cod_usuario";

		mysqli_query($link, $sql);


	}
?>

	