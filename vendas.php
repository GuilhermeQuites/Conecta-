<div class="container-fluid">
<div class="card card-Vertical card-default card-md mb-4" style="background-color: #3D3D3B">
        <h1 class="text-center my-5">Contratos Finalizados</h1>
        <div class="card-body py-md-30">
            <div class="horizontal-form">
                <form action="" method="post">
                    <div class="form-group row mb-5">
                        <div class="col-sm-1.5 d-flex aling-items-center mt-2">
                            <label for="inputName" class=" col-form-label color-dark fs-14 fw-500 align-center mb-20">Listar por:</label>
                        </div>
                        <div class="col-sm-2">
                            <select type="text" name="categoria" class="form-control ih-medium ip-gray radius-xs b-light px-15" id="inputCategoria" style="background-color: #51514F" required>
                                <option value=""></option>
                                <option value="Artista">Artista</option>
                                <option value="Geral">Geral</option>
                            </select>
                        </div>

                        <div class="col-sm-5">
                            <div class="col-sm-5" style="margin-top: 1.5px;">
                                <button type="submit" name="submit" class="btn btn-success btn-default radius-xs btn-squared px-30">Buscar</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        


<?php
$artistas = $conn->query($select = "SELECT * FROM artista");
if(isset($_POST['categoria'])){
    if($_POST['categoria'] == "Artista"){
?>
        <form method="post">
        <div class="form-group row mb-5">
          <div class="col-sm-1.5 d-flex aling-items-center mt-2">
            <label for="artista_lead">Nome Artista</label>
          </div>
          <div class="col-sm-2">
            <select type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" id="artista_lead" name="nome" style="background-color: #51514F" required>
              <option value=""></option>
              <?php 
                while($row = $artistas->fetch_assoc()){
                  echo '<option value="'.$row["nome_artista"].'">'.$row["nome_artista"].'</option>';
                }
              ?>
            </select>
          </div>
        
        <div class="col-sm-5">
        <div class="col-sm-5" style="margin-top: 1.5px;">
            <button type="submit" name="filtrar-nome" class="btn btn-info btn-default radius-xs btn-squared px-30">Buscar</button>
        </div>
        </div>
        </div>
        </form>
<?php       
    }

    if($_POST['categoria'] == "Geral"){
        echo('
        <div class="userDatatable userDatatable--ticket userDatatable--ticket--2 mt-1">
        <div class="table-responsive">
        <table class="table mb-0 table-borderless">
        <thead>
            <tr class="userDatatable-header">
                <th>
                    <span class="userDatatable-title">Nome Lead</span>
                </th>
                <th>
                    <span class="userDatatable-title">Nome Artista</span>
                </th>
                <th>
                    <span class="userDatatable-title">Vendas Concluídas</span>
                </th>
            </tr>
        </thead>
        <tbody id="tbody-ranking">
        ');
        $historico = $conn->query($select = "SELECT nome_lead, artista_lead, id_lead FROM leads");
        while($row = $historico->fetch_assoc()){
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
                        $row['artista_lead'] .
                    '</div>
                </td>
                <td>
                    <div>'); 
                        $qtd = $conn->query($select = "SELECT COUNT(fklead) as soma FROM historico_leads WHERE status_contato = 'Finalizado' and fklead = '$row[id_lead]'");
                        $res = $qtd->fetch_assoc();
                        echo($res['soma'] .
                    '</div>
                </td>
            </tr>
                '
            );
        }
    
        echo('
    
        </tbody>
        </table>
        </div>
        </div>');

    }
}

if(isset($_POST["filtrar-nome"])){
    ?>      
    <div class="userDatatable userDatatable--ticket userDatatable--ticket--2 mt-1">
        <div class="table-responsive">
        <table class="table mb-0 table-borderless">
        <thead>
            <tr class="userDatatable-header">
                <th>
                    <span class="userDatatable-title">Nome Lead</span>
                </th>
                <th>
                    <span class="userDatatable-title">Nome Artista</span>
                </th>
                <th>
                    <span class="userDatatable-title">Vendas Concluídas</span>
                </th>
            </tr>
        </thead>
        <tbody id="tbody-ranking">

    <?php
    $nome = $_POST['nome'];
    $historico = $conn->query($select = "SELECT nome_lead, artista_lead, id_lead FROM leads WHERE artista_lead = '$nome'");
    while($row = $historico->fetch_assoc()){
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
                    $row['artista_lead'] .
                '</div>
            </td>
            <td>
                <div>'); 
                    $qtd = $conn->query($select = "SELECT COUNT(fklead) as soma FROM historico_leads WHERE status_contato = 'Finalizado' and fklead = '$row[id_lead]'");
                    $res = $qtd->fetch_assoc();
                    echo($res['soma'] .
                '</div>
            </td>
        </tr>
            '
        );
    }

    echo('

    </tbody>
    </table>
    </div>
    </div>');
}