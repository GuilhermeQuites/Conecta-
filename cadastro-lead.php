<?php
  include_once "bd/conexao.php";

  if (isset($_POST['submit'])) {
    $nome_lead = $_POST['nome_lead'];
    $entrada_lead = $_POST['entrada_lead'];
    $telefone_lead = $_POST['telefone_lead'];
    $email_lead = $_POST['email_lead'];
    $estado_lead = $_POST['estado_lead'];
    $cidade_lead = $_POST['cidade_lead'];
    $descricao_lead = $_POST['descricao_lead'];
    $data_lead = $_POST['data_lead'];
    $melhor_horario_lead = $_POST['melhor_horario_lead'];
    $classificacao_lead = $_POST['classificacao_lead'];
    $artista_lead = $_POST['artista_lead'];
    $nome_casa_noturna = isset($_POST['nome_casa_noturna']) ? $_POST['nome_casa_noturna'] : "";
    $valor_lead = $_POST['valor_lead'];
    $data_show = $_POST['data_show'];
    $status_lead = $_POST['status_lead'];
    $mesorregiao_lead = $_POST['mesorregiao_lead'];
    $regiao_lead = $_POST['regiao_lead'];

    // Insere os dados do formulário no banco de dados
    $sql = "INSERT INTO leads (nome_lead, entrada_lead, telefone_lead, email_lead, estado_lead, cidade_lead, descricao_lead, data_lead, melhor_horario_lead, classificacao_lead, artista_lead, nome_casa_noturna, valor_lead, data_show, status_lead, mesorregiao_lead, regiao_lead)
    VALUES ('$nome_lead', '$entrada_lead', '$telefone_lead', '$email_lead', '$estado_lead', '$cidade_lead', '$descricao_lead', '$data_lead', '$melhor_horario_lead', '$classificacao_lead', '$artista_lead', '$nome_casa_noturna', '$valor_lead', '$data_show', '$status_lead', '$mesorregiao_lead', '$regiao_lead')";

    if (mysqli_query($conn, $sql)) {
      header("Location: cadastro/1");
    } else {
      header("Location: cadastro/2");
    }

    mysqli_close($conn);
    
  }