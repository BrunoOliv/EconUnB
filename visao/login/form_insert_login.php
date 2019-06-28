<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../persistencia/LoginDAO.php';
    require_once __DIR__.'/../../modelos/Login.php';

?>
<center><h3>CADASTRO DE LOGIN</h3></center>
<form action="form_insert_login.php" method="post">
    <div class="form-group">
        <label>Id</label>
        <input class="form-control" type="number" name="id" />
    </div>
    <div class="form-group">
        <label>Usuário</label>
        <input class="form-control" type="text" name="usuario" />
    </div>
    <div class="form-group">
        <label>Senha</label>
        <input class="form-control" type="password" name="senha" />
    </div>
    <button type="submit" name="bt_inserir_login" value="SEND" class="btn btn-primary">
        CADASTRAR
    </button>
</form>

<?php 
   
if( isset($_POST['bt_inserir_login']) ){
    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $login = new Login($id, $usuario, $senha);
    LoginDAO::inserir($login);
}
 

