<?php
require_once __DIR__.'/../../includes/cabecalho.php';
require_once __DIR__.'/../../persistencia/LoginDAO.php';

$id = $_POST['id'];

$result = LoginDAO::selectUm($id);

if ($result->num_rows > 0) {
   ?>
   <center><h3>ALTERA LOGIN</h3></center>
   <form action='update_login.php' method='post'>
   <?php
    while($row = $result->fetch_assoc()) {
        ?>
        <div class="form-group">
            <label>Id</label>
            <input type="hidden" name="idAnterior" value='<?= $id?>' />
            <input class="form-control" type="number" name="id" value='<?= $row['id_login']?>' />
        </div>
        <div class="form-group">
            <h3>Usuário</h3>
            <input class="form-control" type="text" name="usuario" value='<?= $row['usuario_login']?>' />
        </div>
        <div class="form-group">
            <h3>Senha</h3>
            <input class="form-control" type="text" name="senha" value='<?= $row['senha_login']?>' />
        </div>
        <button type="submit" name="bt_up_login" class="btn btn-primary">
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