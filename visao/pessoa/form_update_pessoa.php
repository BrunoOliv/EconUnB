<?php
require_once __DIR__.'/../../includes/cabecalho.php';
require_once __DIR__.'/../../persistencia/PessoaDAO.php';

$matricula = $_POST['matricula'];

$result = PessoaDAO::selectUm($matricula);

if ($result->num_rows > 0) {
   ?>
   <center><h3>ALTERA PESSOA</h3></center>
   <form action='update_pessoa.php' method='post'>
   <?php
    while($row = $result->fetch_assoc()) {
        ?>
        <div class="form-group">
            <label>Matrícula</label>
            <input type="hidden" name="matriculaAnterior" value='<?= $matricula?>' />
            <input class="form-control" type="number" name="matricula" value='<?= $row['matricula_pessoa']?>' />
        </div>
        <div class="form-group">
            <h3>Nome</h3>
            <input class="form-control" type="text" name="nome" value='<?= $row['nome_pessoa']?>' />
        </div>
        <div class="form-group">
            <h3>Endereço</h3>
            <input class="form-control" type="text" name="endereco" value='<?= $row['endereco_pessoa']?>' />
        </div>
        <div class="form-group">
            <h3>ID Login</h3>
            <input class="form-control" type="number" name="idLogin" value='<?= $row['id_login']?>' />
        </div>
        <button type="submit" name="bt_up_pessoa" class="btn btn-primary">
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