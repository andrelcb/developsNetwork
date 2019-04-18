<?php
	session_start();

	//operador negação testaar ao contrario da existencia.
	if(!isset($_SESSION['usuario'])){
		header('location: index.php?erro=1');
	}

	require_once('db.class.php');

	$text_compartilhe = $_POST['text_compartilhe'];
	$cod_usuario = $_SESSION['cod_usuario'];

	

	if($text_compartilhe != '' && $cod_usuario != ''){
		
		$objBD = new bd();
		$link = $objBD->conexao_mysql();

		$sql = "INSERT INTO compartilhe (fk_cod_usuario, compartilhe) values ($cod_usuario,'$text_compartilhe')";
		mysqli_query($link, $sql);


	}
?>

	