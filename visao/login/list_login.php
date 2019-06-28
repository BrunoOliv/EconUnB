<?php

require_once __DIR__.'/../../includes/cabecalho.php';
require_once __DIR__.'/../../persistencia/LoginDAO.php';

if( isset($_POST['bt_pes_logins']) ){
    $palavra = $_POST['palavra'];
    $assunto = $_POST['assunto'];

    $result = LoginDAO::pesquisa($palavra, $assunto);
}else{
    $result = LoginDAO::select();
}

if ($result->num_rows > 0) {
?>
    <center><h3>LISTAGEM DE LOGINS(<a href="form_insert_login.php">+</a>)</h3></center><br/>
 
    <form action="list_login.php" method="post">
        <div class="form-group">
            <label>Termo de pesquisa:</label>
            <input name="palavra" class="form-group"/>
            <select name="assunto" class="form-group" >
                <option value="id_login">ID</option>
                <option value="usuario_login">Usuário</option>
                <option value="senha_login">Senha</option>
            </select>
            <button type="submit" name="bt_pes_logins" value="SEND" class="btn btn-primary">
                PESQUISAR
            </button>
        </div>
    </form>

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>USUÁRIO</th>
                <th>SENHA</th>
                <th colspan="2">OP</th>
            </tr>
        </thead>
        <tbody>
<?php
     while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?= $row['id_login'] ?></td>
            <td><?= $row['usuario_login'] ?></td>
            <td><?= $row['senha_login'] ?></td>
            <td>
                <form action="form_update_login.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id_login'] ?>" >
                    <button name="update_login" class="btn btn-dark">
                    Alt
                    </button>
                </form>
            </td>
            <td>
                <form action="delete_login.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id_login'] ?>" />
                    <button name="delete_login" class="btn btn-dark">
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