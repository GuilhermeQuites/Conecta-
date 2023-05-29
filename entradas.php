<div class="col-lg-12">
    <div class="card card-horizontal card-default card-md mb-4">
        <div class="card-header">
            <h6>Cadastrar Entradas</h6>
        </div>
        <div class="card-body py-md-30">
            <div class="horizontal-form">
                <form action="" method="post">
                    <div class="form-group row mb-5">
                        <div class="col-sm-1.5 d-flex aling-items-center">
                            <label for="inputName" class=" col-form-label color-dark fs-14 fw-500 align-center mb-20">Nome</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="nome" class="form-control ih-medium ip-gray radius-xs b-light px-15" id="inputName" required>
                        </div>

                        <div class="col-sm-5">
                            <div class="col-sm-5" style="margin-top: 1.5px;">
                                <button type="submit" class="btn btn-primary btn-default radius-xs btn-squared px-30">Cadastrar</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once "bd/conexao.php";

if(isset($_POST['nome']))
    $conn->query($insert = "INSERT INTO categoria_entradas (nome_cat_entrada) VALUES ('$_POST[nome]')");
?>