<?php

require_once __DIR__.'/../../includes/cabecalho.php';
require_once __DIR__.'/../../persistencia/LocalDAO.php';

if( isset($_POST['bt_pes_locais']) ){
    $palavra = $_POST['palavra'];
    $assunto = $_POST['assunto'];

    $result = LocalDAO::pesquisa($palavra, $assunto);
}else{
    $result = LocalDAO::select();
}

if ($result->num_rows > 0) {
?>
    <center><h3>LISTAGEM DE LOCAIS(<a href="form_insert_local.php">+</a>)</h3></center><br/>
 
    <form action="list_local.php" method="post">
        <div class="form-group">
            <label>Termo de pesquisa:</label>
            <input name="palavra" class="form-group"/>
            <select name="assunto" class="form-group" >
                <option value="id_local">ID</option>
                <option value="nome_local">Nome</option>
                <option value="sigla_local">Sigla</option>
            </select>
            <button type="submit" name="bt_pes_locais" value="SEND" class="btn btn-primary">
                PESQUISAR
            </button>
        </div>
    </form>

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>SIGLA</th>
                <th colspan="2">OP</th>
            </tr>
        </thead>
        <tbody>
<?php
     while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?= $row['id_local'] ?></td>
            <td><?= $row['nome_local'] ?></td>
            <td><?= $row['sigla_local'] ?></td>
            <td>
                <form action="form_update_local.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id_local'] ?>" >
                    <button name="update_local" class="btn btn-dark">
                    Alt
                    </button>
                </form>
            </td>
            <td>
                <form action="delete_local.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id_local'] ?>" />
                    <button name="delete_local" class="btn btn-dark">
                    Del
                    </button>
                </form>
            </td>
        </tr>
        <?php
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "0 results";	
}
?>