<?php
  include_once "bd/conexao.php";

  if (isset($_POST['submit'])) {
    $nome_cat_entrada = $_POST['nome_cat_entrada'];

    $sql = "INSERT INTO categoria_entradas (nome_cat_entrada) VALUES ('$nome_cat_entrada')";


    mysqli_query($conn, $sql);

    if (mysqli_query($conn, $sql)) {
      header("Location: entradas/1");
    } else {
      header("Location: entradas/2");
    }

    mysqli_close($conn);
  }