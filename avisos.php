<div class="container-fluid">
<div class="card card-Vertical card-default card-md mb-4" style="background-color: #3D3D3B">
    <h1 class="text-center my-5">Contatos à serem realizados:</h1>
    <form method="post" class='m-25'>
        <div class="form-group col-md-4 d-inline-flex">
            <button type="submit" name="hoje" class="btn btn-success mx-2">Hoje</button>
            <button type="submit" name="semana" class="btn btn-info mx-2">Semanalmente</button>
        </div>
    </form>


<?php 
include_once "bd/conexao.php";
if(isset($_POST['hoje'])){
    $data = date('Y/m/d');
    $sql = "SELECT * from leads where data_lead =  '$data'";
    $leads = mysqli_query($conn, $sql);
?>
            <div class="userDatatable userDatatable--ticket userDatatable--ticket--2 mt-1">
                <div class="table-responsive">
                    <table class="table p-25 mb-0 table-borderless">
                        <thead>
                        <tr class="userDatatable-header">
                        <th>
                            <span class="userDatatable-title">Nome</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Entrada</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Telefone</span>
                        </th>
                        <th style="width: 400px; height:50">
                            <span class="userDatatable-title">Email</span>
                        </th>
                        <th style="width: 400px; height:50">
                            <span class="userDatatable-title">Estado</span>
                        </th>
                        <th style="width: 400px; height:50">
                            <span class="userDatatable-title">Cidade</span>
                        </th>
                        <th style="width: 400px; height:50">
                            <span class="userDatatable-title">Descrição</span>
                        </th>
                        <th style="width: 400px; height:50">
                            <span class="userDatatable-title">Data</span>
                        </th>
                        <th style="width: 400px; height:50">
                            <span class="userDatatable-title">Melhor horário</span>
                        </th>
                        <th style="width: 400px; height:50">
                            <span class="userDatatable-title">Classificaçao</span>
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody-comentario">
<?php
  while($row = $leads->fetch_assoc()){
    echo(
        '
        <tr>
            <td>
                <div>' .
                    $row['nome_lead'] .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['entrada_lead'] .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['telefone_lead'] .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['email_lead'] .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['estado_lead'] .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['cidade_lead'] .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['descricao_lead'] .
                '</div>
            </td>
            <td>
                <div>' .
                    date('d/m/Y',  strtotime($row['data_lead'])) .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['melhor_horario_lead'] .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['classificacao_lead'] .
                '</div>
            </td>'
    ); 
    }
    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}

if(isset($_POST['semana'])){
    $sql = "SELECT * FROM leads WHERE YEAR(data_lead) = YEAR(CURDATE()) AND YEARWEEK(data_lead, 1) = YEARWEEK(CURDATE(), 1)";
    $leads = mysqli_query($conn, $sql);
     ?>
            <div class="userDatatable userDatatable--ticket userDatatable--ticket--2 mt-1">
                <div class="table-responsive">
                    <table class="table p-25 mb-0 table-borderless">
                        <thead>
                        <tr class="userDatatable-header">
                        <th>
                            <span class="userDatatable-title">Nome</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Entrada</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Telefone</span>
                        </th>
                        <th style="width: 400px; height:50">
                            <span class="userDatatable-title">Email</span>
                        </th>
                        <th style="width: 400px; height:50">
                            <span class="userDatatable-title">Estado</span>
                        </th>
                        <th style="width: 400px; height:50">
                            <span class="userDatatable-title">Cidade</span>
                        </th>
                        <th style="width: 400px; height:50">
                            <span class="userDatatable-title">Descrição</span>
                        </th>
                        <th style="width: 400px; height:50">
                            <span class="userDatatable-title">Data</span>
                        </th>
                        <th style="width: 400px; height:50">
                            <span class="userDatatable-title">Melhor horário</span>
                        </th>
                        <th style="width: 400px; height:50">
                            <span class="userDatatable-title">Classificaçao</span>
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody-comentario">
<?php
  while($row = $leads->fetch_assoc()){
    echo(
        '
        <tr>
            <td>
                <div>' .
                    $row['nome_lead'] .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['entrada_lead'] .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['telefone_lead'] .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['email_lead'] .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['estado_lead'] .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['cidade_lead'] .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['descricao_lead'] .
                '</div>
            </td>
            <td>
                <div>' .
                    date('d/m/Y',  strtotime($row['data_lead'])) .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['melhor_horario_lead'] .
                '</div>
            </td>
            <td>
                <div>' .
                    $row['classificacao_lead'] .
                '</div>
            </td>'
    ); 
    }
?>
                        </tbody>
                    </table>
                </div>
            </div>
<?php
}
?>
</div>
</div>
