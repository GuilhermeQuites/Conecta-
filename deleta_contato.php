<?php
  include_once "bd/conexao.php";
  if(isset($id)){
    $sql = "DELETE FROM historico_leads WHERE id_contato = '$id'";

    if (mysqli_query($conn, $sql)) {
      echo '<span>Contato excluido com sucesso!</span>';
    } else {
      echo '<span>Ocorreu um erro ao excluir o Contato!</span>';
    }

    mysqli_close($conn);
  }