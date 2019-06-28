<?php

require_once __DIR__.'/../../includes/cabecalho.php';
require_once __DIR__.'/../../persistencia/TipoDAO.php';

if( isset($_POST['bt_pes_tipos']) ){
    $palavra = $_POST['palavra'];
    $assunto = $_POST['assunto'];

    $result = TipoDAO::pesquisa($palavra, $assunto);
}else{
    $result = TipoDAO::select();
}

if ($result->num_rows > 0) {
?>
    <center><h3>LISTAGEM DE TIPOS(<a href="form_insert_tipo.php">+</a>)</h3></center><br/>
 
    <form action="list_tipo.php" method="post">
        <div class="form-group">
            <label>Termo de pesquisa:</label>
            <input name="palavra" class="form-group"/>
            <select name="assunto" class="form-group" >
                <option value="id_tipo">ID</option>
                <option value="nome_tipo">Nome</option>
            </select>
            <button type="submit" name="bt_pes_tipos" value="SEND" class="btn btn-primary">
                PESQUISAR
            </button>
        </div>
    </form>

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th colspan="2">OP</th>
            </tr>
        </thead>
        <tbody>
<?php
     while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?= $row['id_tipo'] ?></td>
            <td><?= $row['nome_tipo'] ?></td>
            <td>
                <form action="form_update_tipo.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id_tipo'] ?>" >
                    <button name="update_tipo" class="btn btn-dark">
                    Alt
                    </button>
                </form>
            </td>
            <td>
                <form action="delete_tipo.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id_tipo'] ?>" />
                    <button name="delete_tipo" class="btn btn-dark">
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