<?php
require_once __DIR__.'/../../includes/cabecalho.php';
require_once __DIR__.'/../../persistencia/DenunciaDAO.php';

$id = $_POST['id'];

$result = DenunciaDAO::selectUm($id);

if ($result->num_rows > 0) {
   ?>
   <center><h3>ALTERA DENÚNCIA</h3></center>
   <form action='update_denuncia.php' method='post'>
   <?php
    while($row = $result->fetch_assoc()) {
        ?>
        <div class="form-group">
            <label>Id</label>
            <input type="hidden" name="idAnterior" value='<?= $id?>' />
            <input class="form-control" type="number" name="id" value='<?= $row['id_denuncia']?>' />
        </div>
        <div class="form-group">
            <h3>Descrição</h3>
            <input class="form-control" type="text" name="descricao" value='<?= $row['descricao_denuncia']?>' />
        </div>
        <div class="form-group">
            <h3>Id Pessoa</h3>
            <input class="form-control" type="number" name="idPessoa" value='<?= $row['id_pessoa']?>' />
        </div>
        <div class="form-group">
            <h3>Id Tipo</h3>
            <input class="form-control" type="number" name="idTipo" value='<?= $row['id_tipo']?>' />
        </div>
        <div class="form-group">
            <h3>Id Gravidade</h3>
            <input class="form-control" type="number" name="idGravidade" value='<?= $row['id_gravidade']?>' />
        </div>
        <div class="form-group">
            <h3>Id Local</h3>
            <input class="form-control" type="number" name="idLocal" value='<?= $row['id_local']?>' />
        </div>
        <button type="submit" name="bt_up_denuncia" class="btn btn-primary">
             Altera
        </button>  
        <?php
    }
    ?>
   </form>
   <?php
} else {
    echo "0 results";	
}