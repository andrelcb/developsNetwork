<?php

	session_start();

	require_once('db.class.php');

	$usuario = $_POST['usuario'];
	$email =  $_POST['email'];
	$senha = md5($_POST['senha']);

	$objBD = new bd();

	//conexao, criar uma variavel para receber o return do metodo (conexao_mysql);
	$link = $objBD->conexao_mysql();

	//verirficar se o usuario ja existe
	$sql = "select * from usuarios where usuario = '$usuario' ";

	$usuario_existe = false;
	$email_existe = false;

	if($resultado_id = mysqli_query($link, $sql)){

		$dados_usuario = mysqli_fetch_array($resultado_id);

		if($dados_usuario){
			$usuario_existe = true;
		}
	}
	else{
		echo "erro ao tentar localizar o registro de usuario";
	}

	//verificar se o e-mail ja existe
	$sql = "select * from usuarios where email = '$email' ";

	if($resultado_id = mysqli_query($link, $sql)){

		$dados_usuario = mysqli_fetch_array($resultado_id);

		if($dados_usuario){
			$email_existe = true;
		}
	}
	else{
		echo "erro ao tentar localizar o registro de usuario";
	}

	if($usuario_existe || $email_existe){

		$retorno_get = '';

		if($usuario_existe){
			$retorno_get.="erro_usuario=1&";
		}

		if($email_existe){
			$retorno_get.="erro_email=1&";
		}

		header('location: inscrevase.php?'.$retorno_get);
		die();
	}


	//query insert
	$sqlinsert = " insert into usuarios (usuario,email,senha) values ('$usuario','$email','$senha')";

	//query para consultar os valores no banco de dados
	$sqlquery = "SELECT cod_usuario,usuario,email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

	//executar a query
	//mysqli_query = espera dois paramentros, conexao, e a query
	//fazer essa validação e mt importante.
	if(mysqli_query($link, $sqlinsert)){
		if($resultado_id = mysqli_query($link, $sqlquery)){

			$dados_usuario = mysqli_fetch_array($resultado_id);
		}

		if(isset($dados_usuario['usuario'])){

			$_SESSION['cod_usuario'] = $dados_usuarios['cod_usuario'];
			$_SESSION['usuario'] = $dados_usuario['usuario'];
			$_SESSION['email'] = $dados_usuario['email'];
			header('location: home.php');
		}
	}
	else{
		echo "Erro ao registrar, entre em contato com o admnistrador.";
	}

?>