<?php

	session_start();
	//operador negação testaar ao contrario da existencia.
	if(!isset($_SESSION['usuario'])){
		header('location: index.php?erro=1');
	}

	require_once('db.class.php');

	$objBD = new bd();
	$link = $objBD->conexao_mysql();
	$cod_usuario = $_SESSION['cod_usuario'];

	$sql =" SELECT COUNT(*) as qtde_seguidores FROM usuarios_seguidores WHERE seguidor_cod_usuario = $cod_usuario";
	$qtde_segudiores = 0;

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){

			$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

			$qtde_segudiores = $registro['qtde_seguidores'];
			echo '<b>Seguidores</b> <br/>';
			echo $qtde_segudiores;


	}else{
		echo "erro na exeucação da query";
}
?>