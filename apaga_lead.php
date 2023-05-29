
<?php
include_once "bd/conexao.php";
if (isset($_POST['excluir'])) {
    $id = $_GET['id'];
    $result = $conn->query($delete = "DELETE FROM leads WHERE id_lead = '$id'");
}
?>

