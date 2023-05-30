<?php
// Configurações do banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "grupofmvapp_conecta";

// Criando a conexão com o banco de dados
$conn = new mysqli($servidor, $usuario, $senha, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
  die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta SQL para obter os contratantes
$contratantesSql = "SELECT id_contratante, nome_contratante FROM contratantes";
$contratantesResult = $conn->query($contratantesSql);

// Consulta SQL para obter os vendedores
$vendedoresSql = "SELECT vendedor_id , nome_vendedor FROM vendedor";
$vendedoresResult = $conn->query($vendedoresSql);

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Captura os valores do formulário
  $nome_lead = $_POST["nome_lead"];
  $telefone_lead = $_POST["telefone_lead"];
  $email_lead = $_POST["email_lead"];
  $estado_lead = $_POST["estado_lead"];
  $cidade_lead = $_POST["cidade_lead"];
  $descricao_lead = $_POST["descricao_lead"];
  $data_lead = $_POST["data_lead"];
  $melhor_horario_lead = $_POST["melhor_horario_lead"];
  $classificacao_lead = $_POST["classificacao_lead"];
  $artista_lead = $_POST["artista_lead"];
  $nome_casa_noturna = $_POST["nome_casa_noturna"];
  $valor_lead = $_POST["valor_lead"];
  $data_show = $_POST["data_show"];
  $status_lead = $_POST["status_lead"];
  $mesorregiao_lead = $_POST["mesorregiao_lead"];
  $regiao_lead = $_POST["regiao_lead"];

  // Obtém o ID do contratante selecionado
  $id_contratante = $_POST["id_contratante"];
  $id_vendedor = $_POST["vendedor_id"];

  // Comando SQL para inserção dos dados
  $sql = "INSERT INTO leads (nome_lead, telefone_lead, email_lead, estado_lead, cidade_lead, descricao_lead, data_lead, melhor_horario_lead, classificacao_lead, artista_lead, nome_casa_noturna, valor_lead, data_show, status_lead, mesorregiao_lead, regiao_lead, id_contratante, vendedor_id)
            VALUES ('$nome_lead', '$telefone_lead', '$email_lead', '$estado_lead', '$cidade_lead', '$descricao_lead', '$data_lead', '$melhor_horario_lead', '$classificacao_lead', '$artista_lead', '$nome_casa_noturna', '$valor_lead', '$data_show', '$status_lead', '$mesorregiao_lead', '$regiao_lead', '$id_contratante', '$id_vendedor')";

  if ($conn->query($sql) === TRUE) {
    echo "Registro inserido com sucesso!";
    header("Location: cadastro");
    exit();
  } else {
    echo "Erro ao inserir registro: " . $conn->error;
  }
}

// Fechando a conexão com o banco de dados
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Formulário de Leads</title>
</head>

<body>
  <form method="post" action="">
    <div class="col-md-6 mb-25">
      <label for="id_contratante">Contratante</label>