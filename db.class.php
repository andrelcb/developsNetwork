<?php

class bd{
	//host
	private $host = 'localhost';

	//usuario
	private $usuario = 'root';

	//senha
	private $senha = '';

	//banco de dados
	private $banco_de_dados = 'twitter_clone';

	function conexao_mysql(){

		//criar a conexao, recebe 4 paramentros, do banco de dad
		$conexao = mysqli_connect($this->host, $this->usuario, $this->senha, $this->banco_de_dados);

		//ajustar o charset de comunicação entre a aplicação e o banco de dados recebe dois paramentros.
		mysqli_set_charset($conexao,'utf8');

		//verficar se houve algum erro de conexao com banco de dados.
		//mysqli_connect_errno = se nao for 0 existe sim um erro com banco de dados.
		//mysqli_connect_error = mensagem do erro.
		if(mysqli_connect_errno()){
			echo 'Erro ao tentar se conectar com banco de dados:'.mysqli_connect_error();
		}
		
		return $conexao;
	}

}


?>