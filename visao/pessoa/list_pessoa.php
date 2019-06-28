<?php

require_once __DIR__.'/../../includes/cabecalho.php';
require_once __DIR__.'/../../persistencia/PessoaDAO.php';

if( isset($_POST['bt_pes_pessoas']) ){
    $palavra = $_POST['palavra'];
    $assunto = $_POST['assunto'];

    $result = PessoaDAO::pesquisa($palavra, $assunto);
}else{
    $result = PessoaDAO::select();
}


if ($result->num_rows > 0) {
?>
    <center><h3>LISTAGEM DE PESSOAS(<a href="form_insert_pessoa.php">+</a>)</h3></center><br/>
 
    <form action="list_pessoa.php" method="post">
        <div class="form-group">
            <label>Termo de pesquisa:</label>
            <input name="palavra" class="form-group"/>
            <select name="assunto" class="form-group" >
                <option value="matricula_pessoa">MATRÍCULA</option>
                <option value="nome_pessoa">NOME</option>
                <option value="endereco_pessoa">ENDEREÇO</option>
                <option value="id_login">ID LOGIN</option>
                
            </select>
            <button type="submit" name="bt_pes_pessoas" value="SEND" class="btn btn-primary">
                PESQUISAR
            </button>
        </div>
    </form>

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>Matrícula</th>
                <th>Foto</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Login</th>
                <th colspan="2">OP</th>
            </tr>
        </thead>
        <tbody>
<?php
     while($row = $result->fetch_assoc()) { 
        ?>
        <tr>
            <td><?= $row['matricula_pessoa'] ?></td>
            <td>  <img src='getImagem.php?PicNum=<?= $row['matricula_pessoa'] ?>'> </td>
            <td><?= $row['nome_pessoa'] ?></td>
            <td><?= $row['endereco_pessoa'] ?></td>
            <td><?= $row['usuario_login'] ?></td>
            <td>
                <form action="form_update_pessoa.php" method="post">
                    <input type="hidden" name="matricula" value="<?= $row['matricula_pessoa'] ?>" >
                    <button name="update_pessoa" class="btn btn-dark">
                    Alt
                    </button>
                </form>
            </td>
            <td>
                <form action="delete_pessoa.php" method="post">
                    <input type="hidden" name="matricula" value="<?= $row['matricula_pessoa'] ?>" />
                    <button name="delete_pessoa" class="btn btn-dark">
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