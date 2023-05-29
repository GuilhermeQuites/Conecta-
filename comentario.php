<div class="container-fluid">
    <div class="card card-horizontal card-default card-md mb-4" style="background-color: #3D3D3B">
        <div class="card-header">
            <h6>Contatos</h6>
        </div>
        <div class="card-body py-md-30">
            <div class="horizontal-form">
                <form id="form_contato" action="" method="post">
                    <div class="form-group row mb-5">
                        <div class="col-sm-1.5 d-flex aling-items-center">
                            <label for="inputName" class=" col-form-label color-dark fs-14 fw-500 align-center mb-10">Nova data de contato</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="date" name="data" class="form-control ih-medium ip-gray radius-xs b-light px-15" required>
                        </div>

                        <div class="col-sm-1.5 d-flex aling-items-center">
                            <label for="inputName" class=" col-form-label color-dark fs-14 fw-500 align-center mb-10">Status</label>
                        </div>
                        <div class="col-sm-2">
                            <select type="text" name="status" class="form-control ih-medium ip-gray radius-xs b-light px-15" style="background-color: #51514F" required>
                                <option value=""></option>
                                <option value="Em andamento">Em andamento</option>
                                <option value="Finalizado">Finalizado</option>
                                <option value="Não finalizado">Não finalizado</option>
                            </select>
                        </div>

                        <div class="col-sm-1.5 d-flex aling-items-center">
                            <label for="inputName" class=" col-form-label color-dark fs-14 fw-500 align-center mt-10 mb-10">Descrição</label>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <textarea class="form-control" name="descricao" id="descricao" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-5" style="margin-top: 50px;">
                            <div class="layout-button">
                                <button type="submit" name="submit" class="btn btn-primary btn-default radius-xs btn-squared px-30">Cadastrar</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
            <form method="post">
                <button type="submit" name="listar" class="btn btn-info">Listar</button>
            </form>
        </div>


<?php
if(isset($_POST['listar']))
{
?>
        <div class="userDatatable userDatatable--ticket userDatatable--ticket--2 mt-1">
            <div class="table-responsive">
            <table id="tabela-listagem" class="table m-25 table-borderless">
                <thead>
                    <tr class="userDatatable-header">
                        <th>
                            <span class="userDatatable-title">Id</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Data</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Status</span>
                        </th>
                        <th style="width: 400px; height:50">
                            <span class="userDatatable-title">Descrição</span>
                        </th>
                        <th style="width: 50px; height:50">
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody-comentario">
<?php
  include_once "bd/conexao.php";
  $historico = $conn->query($select = "SELECT * FROM historico_leads WHERE fklead = $id ORDER BY id_contato DESC");
  while($row = $historico->fetch_assoc()){
    echo(
        '
        <tr>
            <td>
                <div>' .
                    $row['id_contato'] .
                '</div>
            </td>
            <td>
                <div>' .
                    date('d/m/Y',  strtotime($row['data_contato'])) .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['status_contato'] .
                '</div>
            </td>
            <td>
                <div style="white-space: pre-wrap; width: 400px; height:150, text-align: center">' .
                    $row['descricao_contato'] .
                '</div>
            </td> 

            <td>
                <ul style="display: flex; flex-direction: row;">
                    <li style="padding: 2px;">
                        <a href="comentario/'. $id . '/edita/'. $row['id_contato'] .'" class="edit">
                            <i style="color: purple;" class="uil uil-edit"></i>
                        </a>
                    </li>
                    <li style="padding: 2px;">
                        <a href="comentario/'. $id . '/deleta/'. $row['id_contato'] .'">
                          <i style="color: purple;" class="uil uil-trash-alt"></i>
                        </a>
                    </li>
                </ul>
            </td>
        </tr>
        </tbody>
        '
    );
  }
}
?>

<?php
if(isset($metodo) and $metodo == 'deleta'){
  ?> 
  <div class="modal fade show" id="modal-exclusao-contato" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs modal-info  modal-xs col-xs-1" role="document">
       <div class="modal-content ">
          <div class="modal-body">
             <h6 class="modal-title">Tem certeza que deseja excluir esse Lead? Essa ação é irreversível!</h6>
          </div>
             <div class="admin__button-group button-group d-flex pt-1 justify-content-md-end justify-content-end mt-10 mb-10" style="margin-right: 10px;">
                <a href="deleta_contato/<?php echo $id2; ?>">
                <button id="excluir" class="btn btn-danger btn-default btn-rounded mr-10">
                   Sim
                </button>
                </a>
             </div>
       </div>
    </div>
  </div>
  <script src="assets/vendor_assets/js/jquery/jquery-3.5.1.min.js"></script>
  <script>
      $(document).ready(function(){
          $('#modal-exclusao-contato').modal('show')
          $('.footer-wrapper').hide()
      })
  </script>
<?php 
}

if(isset($metodo) and $metodo == 'edita'){
  $result = $conn->query($select = "SELECT * FROM historico_leads WHERE id_contato = $id2");
  if ($result->num_rows > 0) {
    $dados = $result->fetch_array();
?> 
<div class="modal fade" id="modal-edicao-contato" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
        <div class="modal-body">
            <div class="modal-info-body d-flex">
              <div class="modal-info-icon success" id="icon_confirmacao">
                <img src="img/svg/alert-circle.svg" alt="alert-circle" class="svg">
                <div class="modal-info-text mt-2">
                  <i class="bi bi-x"></i>
                  <h6 class="h6_modal">Para editar um Contato modifique os dados abaixo!</h6>
                <div/>
                <span id="msgAviso"></span>
              </div>
              <BR>
              <form id="editar-comentario" method="post">
              <div class="row" id = "dvConteudo">
<?php
 echo ('
                    
              <div class="col-6">
                  <label class="label_modal"> Data </label> 
                  <input type="date" required class="form-control" name="data_contato" id="data_contato" value="' . $dados['data_contato'] . '"' . '>
              </div> 
              
              <div class="col-6">
                  <label class="label_modal"> Descricao </label> 
                  <input type="text" required class="form-control" name="descricao_contato" id="descricao_contato" value="' . $dados['descricao_contato'] . '"' . '>
              </div> 


              <div class="modal-footer">
                  <a href="" id="anchor_cancelar">
                      <button type="button" id="cancelar_contato" class="btn btn-light btn-outlined btn-sm" data-bs-dismiss="modal">Cancelar</button>
                  </a>
                      <button type="submit" name="atualizado_contato" id="atualizar_contato" class="btn btn-info btn-outlined btn-sm">Atualizar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
');
  }
?>
  <script src="assets/vendor_assets/js/jquery/jquery-3.5.1.min.js"></script>
  <script>
      $(document).ready(function(){
          $('#modal-edicao-contato').modal('show')
          $('.footer-wrapper').hide()
      })
  </script>
<?php 
}
?>

<?php
if(isset($_POST['atualizado_contato'])){
  $conn->query($update_comentario = "UPDATE historico_leads SET data_contato = '$_POST[data_contato]', descricao_contato = '$_POST[descricao_contato]' WHERE id_contato = $id2");
  ?>
  <script>
    $(document).ready(function(){
          $('#anchor_cancelar').attr('href', 'listar')
          $('#msgAviso').html("Usuário atualizado com sucesso!")
          $('#descricao_contato').attr("type", "hidden")
          $('#descricao_contato').val("")
          $('#data_contato').attr("type", "hidden")
          $('#data_contato').val("")
          $(".label_modal").hide()
          $(".h6_modal").hide()
          $("#atualizar_contato").hide()
          $("#cancelar_contato").html("Fechar")
          $("#modal-edicao-contato").css("width", "200px").css("margin-left", "45vw")
          $('.footer-wrapper').hide()
      }
    )
  </script>
<?php
}

if(isset($_POST['submit'])){
    $conn->query($update_data = "UPDATE leads SET data_lead = '$_POST[data]' WHERE id_lead = '$id'");
    $conn->query($adiciona_contato = "INSERT INTO historico_leads (data_contato, descricao_contato, fklead, status_contato) VALUES ('$_POST[data]', '$_POST[descricao]', '$id', '$_POST[status]')");
    echo $conn->error;
    mysqli_close($conn);
}