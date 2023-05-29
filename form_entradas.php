<div class="col-lg-12">
<div class="card card-Vertical card-default card-md mb-4" style="background-color: #3D3D3B">
      <h1 class="text-center my-5">Cadastro de Entradas</h1>
      <form action="cadastro-entradas.php" method="post" class='m-25'>
        <div class="row">
          <div class="col-md-4 mb-25">
            <label for="nome_cat_entrada">Nome</label>
            <input type="text" class="form-control" id="nome_cat_entrada" name="nome_cat_entrada" required>
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success ml-3">Cadastrar Entrada</button>
      </form>
</div>
</div>

<?php
  $url = implode("/", $_GET);
  $url_links = explode("/", $url);
  if(isset($url_links[1])){
    if($url_links[1] == 1){
      ?><script>
        document.getElementById('msg_cadastro').innerHTML = "Entrada cadastrada com sucesso!"
      </script>
<?php
  }else{
    ?>
    <script>
      document.getElementById('msg_cadastro').innerHTML = "Erro no cadastro da Entrada!"
    </script>
<?php
    }
  }
