<?php
include_once "bd/conexao.php";
if(isset($_POST['submit'])){
$estado_lead = $_POST['estado'];
$sql = "SELECT DISTINCT mesorregiao_lead FROM leads WHERE estado_lead = '$estado_lead' ORDER BY mesorregiao_lead ASC";
$query = mysqli_query($conn, $sql);
}
?>
<div class="container-fluid">
    <div class="card card-horizontal card-default card-md mb-4" style="background-color: #3D3D3B;">
        <h1 class="text-center my-5">Filtrar regiões</h1>
        <div class="card-body py-md-30">
            <div class="horizontal-form">
                <form action="regioes_filtrar" method="post">
                    <div class="form-group row mb-5">
                        <div class="col-sm-1.5 d-flex aling-items-center">
                            <label for="inputName" class=" col-form-label color-dark fs-14 fw-500 align-center mb-20">Escolha uma mesorregião</label>
                        </div>
                        <div class="col-sm-2">
                            <select name="mesorregiao" class="form-control ih-medium ip-gray radius-xs b-light px-15" id="mesorregiao" style="background-color: #51514F"  required>
                                <option value=""></option>
                                <?php 
                                    while($row = mysqli_fetch_assoc($query)){
                                        echo(
                                            '<option value="'.$row['mesorregiao_lead'].'">'.$row['mesorregiao_lead'].'</option>'
                                        );
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="col-sm-5" style="margin-top: 1.5px;">
                            <div class="layout-button">
                                <button type="submit" name="filtrar" class="btn btn-success btn-default radius-xs btn-squared px-30">Procurar</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
<?php
if(isset($_POST['filtrar'])){
    $mesorregiao = $_POST['mesorregiao'];
    $sql = "SELECT * FROM leads WHERE mesorregiao_lead = '$mesorregiao'";
    $result = mysqli_query($conn, $sql);

                // Verificando se houve resultados
                if (mysqli_num_rows($result) > 0) {
                    if (mysqli_num_rows($result) > 0) {
                        $dados = '<div class="userDatatable userDatatable--ticket userDatatable--ticket--2 mt-1">';
                        $dados .= '<div class="table-responsive">';
                        $dados .= '<table class="table p-25 mb-0 table-borderless">';
                        $dados .= '<thead>';
                        $dados .= '<tr class="userDatatable-header">';
                        $dados .= '<th>
                        <span class="userDatatable-title">Nome</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Entrada</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Artista</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Casa Noturna</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Telefone</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Email</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Estado</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Cidade</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Classificação</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Data Contato</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Melhor Horário</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Descrição</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Valor</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Data Show</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Status</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Mesorregião</span>
                        </th>
                        <th>
                            <span class="userDatatable-title">Região</span>
                        </th>';
                        $dados .= '</tr>';
                        $dados .= '</thead>';
                        $dados .= '<tbody>';
                        // Exibindo cada lead como uma linha da tabela
                        while($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id_lead"];
                        $dados .= "<tr>";
                        $dados .= "<td>" . $row["nome_lead"] . "</td>";
                        $dados .= "<td>" . $row["entrada_lead"] . "</td>";
                        $dados .= "<td>" . $row["artista_lead"] . "</td>";
                        $dados .= "<td>" . $row["nome_casa_noturna"] . "</td>";
                        $dados .= "<td>" . $row["telefone_lead"] . "</td>";
                        $dados .= "<td>" . $row["email_lead"] . "</td>";
                        $dados .= "<td>" . $row["estado_lead"] . "</td>";
                        $dados .= "<td>" . $row["cidade_lead"] . "</td>";
                        $dados .= "<td>" . $row["classificacao_lead"] . "</td>";
                        $dados .= "<td>" . date('d/m/Y', strtotime($row["data_lead"])). "</td>";
                        $dados .= "<td>" . $row["melhor_horario_lead"] . "</td>";
                        $dados .= "<td>" . $row["descricao_lead"] . "</td>";
                        $dados .= "<td>" . $row["valor_lead"] . "</td>";
                        $dados .= "<td>" . $row["data_show"] . "</td>";
                        $dados .= "<td>" . $row["status_lead"] . "</td>";
                        $dados .= "<td>" . $row["mesorregiao_lead"] . "</td>";
                        $dados .= "<td>" . $row["regiao_lead"] . "</td>";
                        }
                        $dados .= "</tbody>";
                        $dados .= "</table>";
                        $dados .= "</div>";
                        $dados .= "</div>";
                    }
                    echo $dados;
                }
            }
