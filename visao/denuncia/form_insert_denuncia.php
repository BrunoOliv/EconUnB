<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../persistencia/DenunciaDAO.php';
    require_once __DIR__.'/../../modelos/Denuncia.php';
    require_once __DIR__.'/../../modelos/Pessoa.php';
    require_once __DIR__.'/../../modelos/Tipo.php';
    require_once __DIR__.'/../../modelos/Gravidade.php';
    require_once __DIR__.'/../../modelos/Local.php';
    require_once __DIR__.'/../../modelos/Login.php';
    
?>
<center><h3>CADASTRO DE DENUNCIA</h3></center>
<form action="form_insert_denuncia.php" method="post">
    <div class="form-group">
        <label>Id</label>
        <input class="form-control" type="number" name="id" />
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input class="form-control" type="text" name="descricao" />
    </div>
    <div class="form-group">
        <label>Id Pessoa</label>
        <input class="form-control" type="number" name="idPessoa" />
    </div>
    <div class="form-group">
        <label>Id Tipo</label>
        <input class="form-control" type="number" name="idTipo" />
    </div>
    <div class="form-group">
        <label>Id Gravidade</label>
        <input class="form-control" type="number" name="idGravidade" />
    </div>
    <div class="form-group">
        <label>Id Local</label>
        <input class="form-control" type="number" name="idLocal" />
    </div>
    <button type="submit" name="bt_inserir_denuncia" value="SEND" class="btn btn-primary">
        CADASTRAR
    </button>
</form>

<?php 
   
if( isset($_POST['bt_inserir_denuncia']) ){
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $idPessoa = $_POST['idPessoa'];
    $idTipo = $_POST['idTipo'];
    $idGravidade = $_POST['idGravidade'];
    $idLocal = $_POST['idLocal'];

    $login = new Login("","","");
    $pessoa = new Pessoa($idPessoa, "","","", $login);
    $tipo = new Tipo($idTipo,"");
    $gravidade = new Gravidade($idGravidade,"");
    $local = new Local($idLocal,"","");

    $denuncia = new Denuncia($id, $descricao, $pessoa, $tipo, $gravidade, $local);
    DenunciaDAO::inserir($denuncia);
}
 

