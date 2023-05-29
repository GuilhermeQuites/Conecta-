<?php
  include_once "bd/conexao.php";
  if(isset($id)){
    $sql = "DELETE FROM leads WHERE id_lead = '$id'";

    if (mysqli_query($conn, $sql)) {
      echo '<span>Lead excluido com sucesso!</span>';
    } else {
      echo '<span>Ocorreu um erro ao excluir o Lead!</span>';
    }

    mysqli_close($conn);
  }