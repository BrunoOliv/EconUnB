<?php

require_once __DIR__.'/../../includes/cabecalho.php';
require_once __DIR__.'/../../persistencia/DenunciaDAO.php';

if( isset($_POST['bt_pes_denuncias']) ){
    $palavra = $_POST['palavra'];
    $assunto = $_POST['assunto'];

    $result = DenunciaDAO::pesquisa($palavra, $assunto);
}else{
    $result = DenunciaDAO::select();
}

if ($result->num_rows > 0) {
?>
    <center><h3>LISTAGEM DE DENÚNCIAS(<a href="form_insert_denuncia.php">+</a>)</h3></center><br/>
 
    <form action="list_denuncia.php" method="post">
        <div class="form-group">
            <label>Termo de pesquisa:</label>
            <input name="palavra" class="form-group"/>
            <select name="assunto" class="form-group" >
                <option value="id_denuncia">ID</option>
                <option value="descricao_denuncia">DESCRIÇÃO</option>
                <option value="matricula_pessoa">ID PESSOA</option>
                <option value="id_tipo">ID TIPO</option>
                <option value="id_gravidade">ID GRAVIDADE</option>
                <option value="id_local">ID LOCAL</option>
            </select>
            <button type="submit" name="bt_pes_denuncias" value="SEND" class="btn btn-primary">
                PESQUISAR
            </button>
        </div>
    </form>

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>DESCRIÇÃO</th>
                <th>PESSOA</th>
                <th>TIPO</th>
                <th>GRAVIDADE</th>
                <th>LOCAL</th>
                <th colspan="2">OP</th>
            </tr>
        </thead>
        <tbody>
<?php
     while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?= $row['id_denuncia'] ?></td>
            <td><?= $row['descricao_denuncia'] ?></td>
            <td><?= $row['nome_pessoa'] ?></td>
            <td><?= $row['nome_tipo'] ?></td>
            <td><?= $row['nome_gravidade'] ?></td>
            <td><?= $row['nome_local'] ?></td>
            <td>
                <form action="form_update_denuncia.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id_denuncia'] ?>" >
                    <button name="update_denuncia" class="btn btn-dark">
                    Alt
                    </button>
                </form>
            </td>
            <td>
                <form action="delete_denuncia.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id_denuncia'] ?>" />
                    <button name="delete_denuncia" class="btn btn-dark">
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