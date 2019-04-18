<?php
	session_start();

	if(!isset($_SESSION['usuario'])){
		header('location: index.php?erro=1');
	}


	require_once('db.class.php');

	$cod_usuario = $_SESSION['cod_usuario'];
	$excluir_post_usuario = $_POST['excluir_post_usuario'];
	
	if($cod_usuario != '' && $excluir_post_usuario != ''){
		$objBD = new bd();
		$link = $objBD->conexao_mysql();

		$sql = "DELETE FROM compartilhe WHERE fk_cod_usuario = $cod_usuario AND cod_compartilhe = $excluir_post_usuario";

		mysqli_query($link, $sql);
	}


?>