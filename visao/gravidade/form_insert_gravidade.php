<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../persistencia/GravidadeDAO.php';
    require_once __DIR__.'/../../modelos/Gravidade.php';

?>
<center><h3>CADASTRO DE GRAVIDADE</h3></center>
<form action="form_insert_gravidade.php" method="post">
    <div class="form-group">
        <label>Id</label>
        <input class="form-control" type="number" name="id" />
    </div>
    <div class="form-group">
        <label>Nome</label>
        <input class="form-control" type="text" name="nome" />
    </div>
    <button type="submit" name="bt_inserir_gravidade" value="SEND" class="btn btn-primary">
        CADASTRAR
    </button>
</form>

<?php 
   
if( isset($_POST['bt_inserir_gravidade']) ){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $gravidade = new Gravidade($id, $nome);
    GravidadeDAO::inserir($gravidade);
}
 

