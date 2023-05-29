<div class="col-lg-12">
    <div class="card card-Vertical card-default card-md mb-4" style="background-color: #3D3D3B">
        <h1 class="text-center my-5">Cadastrar Artistas</h1>
        <div class="card-body py-md-30">
            <div class="horizontal-form">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-25">
                            <label for="inputName" class=" col-form-label color-dark fs-14 fw-500 align-center mb-20">Nome</label>
                            <input type="text" name="nome" class="form-control ih-medium ip-gray radius-xs b-light px-15" id="inputName" required>
                        </div>
                        <div class="col-md-6 mb-25">
                            <label for="inputName" class=" col-form-label color-dark fs-14 fw-500 align-center mb-20">Categoria</label>
                            <select type="text" name="categoria" class="form-control ih-medium ip-gray radius-xs b-light px-15" id="inputCategoria" style="background-color: #51514F" required>
                                <option value=""></option>
                                <option value="Artista Solo">Artista Solo</option>
                                <option value="Banda">Banda</option>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <div class="col-sm-5" style="margin-top: 1.5px;">
                                <button type="submit" name="submit" class="btn btn-success btn-default radius-xs btn-squared px-30">Cadastrar</button>
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

if(isset($_POST['submit']))
    $conn->query($insert = "INSERT INTO artista (nome_artista, tipo_artista) VALUES ('$_POST[nome]', '$_POST[categoria]')");
?>