<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../persistencia/LocalDAO.php';
    require_once __DIR__.'/../../modelos/Local.php';

?>
<center><h3>CADASTRO DE LOCAL</h3></center>
<form action="form_insert_local.php" method="post">
    <div class="form-group">
        <label>Id</label>
        <input class="form-control" type="number" name="id" />
    </div>
    <div class="form-group">
        <label>Nome</label>
        <input class="form-control" type="text" name="nome" />
    </div>
    <div class="form-group">
        <label>Sigla</label>
        <input class="form-control" type="text" name="sigla" />
    </div>
    <button type="submit" name="bt_inserir_local" value="SEND" class="btn btn-primary">
        CADASTRAR
    </button>
</form>

<?php 
   
if( isset($_POST['bt_inserir_local']) ){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $sigla = $_POST['sigla'];
    $local = new Local($id, $sigla, $nome);
    LocalDAO::inserir($local);
}
 

