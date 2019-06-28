<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../persistencia/TipoDAO.php';
    require_once __DIR__.'/../../modelos/Tipo.php';

?>
<center><h3>CADASTRO DE TIPO</h3></center>
<form action="form_insert_tipo.php" method="post">
    <div class="form-group">
        <label>Id</label>
        <input class="form-control" type="number" name="id" />
    </div>
    <div class="form-group">
        <label>Nome</label>
        <input class="form-control" type="text" name="nome" />
    </div>
    <button type="submit" name="bt_inserir_tipo" value="SEND" class="btn btn-primary">
        CADASTRAR
    </button>
</form>

<?php 
   
if( isset($_POST['bt_inserir_tipo']) ){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $tipo = new Tipo($id, $nome);
    TipoDAO::inserir($tipo);
}
 

