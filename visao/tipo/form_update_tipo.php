<?php
require_once __DIR__.'/../../includes/cabecalho.php';
require_once __DIR__.'/../../persistencia/TipoDAO.php';

$id = $_POST['id'];

$result = TipoDAO::selectUm($id);

if ($result->num_rows > 0) {
   ?>
   <center><h3>ALTERA TIPO</h3></center>
   <form action='update_tipo.php' method='post'>
   <?php
    while($row = $result->fetch_assoc()) {
        ?>
        <div class="form-group">
            <label>Id</label>
            <input type="hidden" name="idAnterior" value='<?= $id?>' />
            <input class="form-control" type="number" name="id" value='<?= $row['id_tipo']?>' />
        </div>
        <div class="form-group">
            <h3>Nome</h3>
            <input class="form-control" type="text" name="nome" value='<?= $row['nome_tipo']?>' />
        </div>
        <button type="submit" name="bt_up_tipo" class="btn btn-primary">
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