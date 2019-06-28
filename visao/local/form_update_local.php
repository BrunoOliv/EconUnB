<?php
require_once __DIR__.'/../../includes/cabecalho.php';
require_once __DIR__.'/../../persistencia/LocalDAO.php';

$id = $_POST['id'];

$result = LocalDAO::selectUm($id);

if ($result->num_rows > 0) {
   ?>
   <center><h3>ALTERA LOCAL</h3></center>
   <form action='update_local.php' method='post'>
   <?php
    while($row = $result->fetch_assoc()) {
        ?>
        <div class="form-group">
            <label>Id</label>
            <input type="hidden" name="idAnterior" value='<?= $id?>' />
            <input class="form-control" type="number" name="id" value='<?= $row['id_local']?>' />
        </div>
        <div class="form-group">
            <h3>Nome</h3>
            <input class="form-control" type="text" name="nome" value='<?= $row['nome_local']?>' />
        </div>
        <div class="form-group">
            <h3>Sigla</h3>
            <input class="form-control" type="text" name="sigla" value='<?= $row['sigla_local']?>' />
        </div>
        <button type="submit" name="bt_up_local" class="btn btn-primary">
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