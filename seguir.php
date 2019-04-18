<?php
	session_start();

	//operador negação testaar ao contrario da existencia.
	if(!isset($_SESSION['usuario'])){
		header('location: index.php?erro=1');
	}

	require_once('db.class.php');

	$cod_usuario = $_SESSION['cod_usuario'];
	$seguir_cod_usuario = $_POST['seguir_cod_usuario'];

	

	if($cod_usuario != '' && $seguir_cod_usuario != ''){
		
		$objBD = new bd();
		$link = $objBD->conexao_mysql();

		$sql = "INSERT INTO usuarios_seguidores(fk_cod_usuario, seguidor_cod_usuario) values ($cod_usuario, $seguir_cod_usuario)";
		mysqli_query($link, $sql);


	}
?>

	