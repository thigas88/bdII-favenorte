<?php
  
  /*
    Banco de Dados II - Favenorte
    Conexção com banco de dados e recuperação da dados.
    Melhorando a exibição dos dados utilizando tabela

  */

  // Dados para conexão
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "empresa";

  // Criando a conexão com o banco
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificando se houve erro ao conectar
  if ($conn->connect_error) {
    die("A conexão com o banco de dados falhou: " . $conn->connect_error);
  } 


?>

<!DOCTYPE html>
<html lang="br">
<head>
	
	<meta charset="utf-8">

	<title>Lista de funcionários</title>

	<style type="text/css">
		body{
			font-family: arial;
		}
	</style>
</head>
<body>

<h3>Lista de empregados</h3>

<br />	

<table>
 
  <thead>
    <tr>
      <th>Nome</th>
      <th>Rua</th>
      <th>Cidade</th>
    </tr>
  </thead>

  <tbody>

    <?php 
  
    	// Comando SQL para buscar os dados de todos os empregados
      $sql = "SELECT nome_empregado, rua, cidade FROM empregados";

      // Executnando o SQL
      $result = $conn->query($sql);

      // Checamos se a consulta encontrou algum resultado.
      // $result->num_rows retorna o número de linhas (registros) encontrados na consulta.
      if ($result->num_rows > 0) {
        // Caso tenha encontrado o comnando WHILE irá percorrer o resultado que está
        // na variável $result e para cara iteração irá atruir a variável $row um valor do resultado
        // contendo os valores de todas as colunas especificadas na consulta.
        // $result->fetch_assoc() transforma cada linha do resultado em um array associativo do tipo chave/valor
        while($row = $result->fetch_assoc()) {

            // vamos montar as linhas da tabela de forma dinamica
            echo "<tr>";
            echo "<td>".$row["nome_empregado"]."</td>";
            echo "<td>".$row["rua"]."</td>";
            echo "<td>".$row["cida"]."</td>";
            echo "</tr>";
        }
      } else {
        // caso não tenha encontrado nada imprimimos uma informação
        echo "0 resultados";
      }

     ?>
      
    
  </tbody>

</table>

</body>
</html>
