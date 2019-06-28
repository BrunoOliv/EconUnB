<?php

require_once __DIR__.'/../../includes/cabecalho.php';
require_once __DIR__.'/../../persistencia/GravidadeDAO.php';

if( isset($_POST['bt_pes_gravidades']) ){
    $palavra = $_POST['palavra'];
    $assunto = $_POST['assunto'];

    $result = GravidadeDAO::pesquisa($palavra, $assunto);
}else{
    $result = GravidadeDAO::select();
}

if ($result->num_rows > 0) {
?>
    <center><h3>LISTAGEM DE GRAVIDADES(<a href="form_insert_gravidade.php">+</a>)</h3></center><br/>
 
    <form action="list_gravidade.php" method="post">
        <div class="form-group">
            <label>Termo de pesquisa:</label>
            <input name="palavra" class="form-group"/>
            <select name="assunto" class="form-group" >
                <option value="id_gravidade">ID</option>
                <option value="nome_gravidade">Nome</option>
            </select>
            <button type="submit" name="bt_pes_gravidades" value="SEND" class="btn btn-primary">
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
            <td><?= $row['id_gravidade'] ?></td>
            <td><?= $row['nome_gravidade'] ?></td>
            <td>
                <form action="form_update_gravidade.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id_gravidade'] ?>" >
                    <button name="update_gravidade" class="btn btn-dark">
                    Alt
                    </button>
                </form>
            </td>
            <td>
                <form action="delete_gravidade.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id_gravidade'] ?>" />
                    <button name="delete_gravidade" class="btn btn-dark">
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