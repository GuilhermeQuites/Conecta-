<?php
include_once "bd/conexao.php";
$sql = "SELECT DISTINCT estado_lead FROM leads ORDER BY estado_lead ASC";
$query = mysqli_query($conn, $sql);
?>
<div class="container-fluid">
    <div class="card card-horizontal card-default card-md mb-4" style="background-color: #3D3D3B;">
        <h1 class="text-center my-5">Filtrar regiões</h1>
        <div class="card-body py-md-30">
            <div class="horizontal-form">
                <form action="regioes_filtrar" method="post">
                    <div class="form-group row mb-5">
                        <div class="col-sm-1.5 d-flex aling-items-center">
                            <label for="inputName" class=" col-form-label color-dark fs-14 fw-500 align-center mb-20">Escolha um estado</label>
                        </div>
                        <div class="col-sm-2">
                            <select name="estado" class="form-control ih-medium ip-gray radius-xs b-light px-15" id="estado" style="background-color: #51514F"  required>
                                <option value=""></option>
                                <?php 
                                    while($row = mysqli_fetch_assoc($query)){
                                        echo(
                                            '<option value="'.$row['estado_lead'].'">'.$row['estado_lead'].'</option>'
                                        );
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="col-sm-5" style="margin-top: 1.5px;">
                            <div class="layout-button">
                                <button type="submit" name="submit" class="btn btn-success btn-default radius-xs btn-squared px-30">Procurar</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
