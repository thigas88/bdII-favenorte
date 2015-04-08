<?php
  
  /*
    Banco de Dados II - Favenorte
    Conexção com banco de dados e recuperação da dados.
    Melhorando a exibição dos dados utilizando tabela. 
    Acrescentamos o Bootstrap para estilizar.
    Tambem foi acrescentado o formulário para buscas 

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

  /* Definindo a codificação para utf8 */
  if (!$conn->set_charset("utf8")) {
      printf("Error ao definir o conjunto de caracteres para utf8: %s\n", $conn->error);
  } 

  // se alguma pesquisa foi feita busca no banco.
  if(isset($_POST['busca']) )
  {
      // Comando SQL para buscar os dados dos empregados pelo nome digitado
      $sql = "SELECT nome_empregado, rua, cidade FROM empregados WHERE nome_empregado LIKE '%".$_POST['busca']."%' ";

      // Executnando o SQL
      $result = $conn->query($sql);

  }elseif(isset($_POST['salvar']) )
      // dados enviados do formulário de cadsastro para serem salvos no banco

      // salvar dados da filial
      $sql = "INSERT INTO filial(campo, campo, campo) VALUES ('valor', 'valor', 'valor')";
      $conn->query($sql);
      $filial_id = $conn->insert_id;  // $conn->insert_id (modo OO) Retorna o id gerado automaticamente na última consulta

      // salvar dados do empregado
      $sql = "INSERT INTO empregados(campo, campo, campo) VALUES ('valor', 'valor', 'valor')";
      $conn->query($sql);
      $empregado_id = $conn->insert_id;

      // salvar relacionamento do empregado com a filial
      $sql = "INSERT INTO trabalha(campo, campo, campo) VALUES ('valor', 'valor', 'valor')";
      $conn->query($sql);


       // Comando SQL para buscar os dados de todos os empregados
      $sql = "SELECT nome_empregado, rua, cidade FROM empregados";

      // Executnando o SQL
      $result = $conn->query($sql);

  else
  {
       // Comando SQL para buscar os dados de todos os empregados
      $sql = "SELECT nome_empregado, rua, cidade FROM empregados";

      // Executnando o SQL
      $result = $conn->query($sql);
  }

?>

<!DOCTYPE html>
<html lang="br">
<head>
  
  <meta charset="utf-8">

  <title>Lista de funcionários</title>

  <!-- CSS do Bootstrap para melhor estilização -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <style type="text/css">
    body{
      font-family: arial;
    }
  </style>
</head>
<body>


<div class="container">

<div class="row">
  <h3>Lista de empregados</h3>
</div>

<br />
  
<div class="list">
  <div class="pesquisa-pessoa">

    <form class="bs-example form-horizontal" method="post">
      <div class="form-group">
        <label for="busca" class="col-lg-1 control-label">Buscar</label>
        <div class="col-lg-10">
          <input type="text" class="form-control"  name="busca" placeholder="Informe um nome pressione enter">
        </div>
      </div>
      
    </form>
  </div>

 <div class="row">
    <div class="col-md-6">
      <a href="cadastro.php">Adicionar</a>
    </div>
    <div class="col-md-6">
        <div class="text-right">
          <?php echo $result->num_rows.' regsitros encontrados.'; ?>
        </div>  
    </div>
 </div>

  <div class="table-responsive">
    <table class="table table-bordered">
     
      <thead>
        <tr>
          <th>Nome</th>
          <th>Rua</th>
          <th>Cidade</th>
        </tr>
      </thead>

      <tbody>

        <?php 
      
         

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
                echo "<td>".$row["cidade"]."</td>";
                echo "</tr>";
            }
          } else {
            // caso não tenha encontrado nada imprimimos uma informação
            echo "<tr><td colspan='3'>Nenhum funcionário encontrado.</td></tr>";
          }
          
         ?>
          
        
      </tbody>

    </table>

 </div>



</div>

</div>


</body>
</html>
