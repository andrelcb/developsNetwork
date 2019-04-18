<?php

	session_start();

	require_once('db.class.php');

	//buscando informação do campo de login;
	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);

	//conexao com banco de dados
	$objBD = new bd();
	$link = $objBD->conexao_mysql();

	//query select;
	$sql = " SELECT cod_usuario,usuario,email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

	//retornar false pra um erro, ou uma referencia (resouserce);
	$resultado_id = mysqli_query($link, $sql);

	//nao tem a ver se existe ou nao registro no banco de dados, e sim com a execução corretar do comando query;
	if($resultado_id){

		$dados_usuarios = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuarios['usuario'])){

			$cod_usuario = $_SESSION['cod_usuario'];
			$usuario = $_SESSION['usuario'];
			$email = $_SESSION['email'];

			header('Location: home.php');
		}
		else{
			header('Location: index.php?erro=1');
		}
	}
	else{
		echo "Error ao buscar informação do banco de dados, favor informar o admin do site.";
	}



	//update true/false = mysqli_query
	//insert true/false = mysqli_query
	//select false/resource
	//delete true/false = mysqli_query


?>