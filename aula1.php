<?php
	
  /*
    Banco de Dados II - Favenorte
    Conexção com banco de dados

  */


	// Dados para conexão
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "contabilidade";

	// Criando a conexão com o banco
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Verificando se houve erro ao conectar
	if ($conn->connect_error) {
		die("A conexão com o banco de dados falhou: " . $conn->connect_error);
	} 


?>