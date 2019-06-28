<?php
require_once __DIR__.'/../../includes/cabecalho.php';
require_once __DIR__.'/../../persistencia/GravidadeDAO.php';

$id = $_POST['id'];

$result = GravidadeDAO::selectUm($id);

if ($result->num_rows > 0) {
   ?>
   <center><h3>ALTERA GRAVIDADE</h3></center>
   <form action='update_gravidade.php' method='post'>
   <?php
    while($row = $result->fetch_assoc()) {
        ?>
        <div class="form-group">
            <label>Id</label>
            <input type="hidden" name="idAnterior" value='<?= $id?>' />
            <input class="form-control" type="number" name="id" value='<?= $row['id_gravidade']?>' />
        </div>
        <div class="form-group">
            <h3>Nome</h3>
            <input class="form-control" type="text" name="nome" value='<?= $row['nome_gravidade']?>' />
        </div>
        <button type="submit" name="bt_up_gravidade" class="btn btn-primary">
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