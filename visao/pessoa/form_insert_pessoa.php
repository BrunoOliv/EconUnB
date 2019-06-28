<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../persistencia/PessoaDAO.php';
    require_once __DIR__.'/../../modelos/Pessoa.php';
    require_once __DIR__.'/../../modelos/Login.php';

?>
<center><h3>CADASTRO DE PESSOA</h3></center>
<form action="form_insert_pessoa.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Matrícula</label>
        <input class="form-control" type="number" name="matricula" />
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input class="form-control" type="file" name="foto" />
    </div>
    <div class="form-group">
        <label>Nome</label>
        <input class="form-control" type="text" name="nome" />
    </div>
    <div class="form-group">
        <label>Endereco</label>
        <input class="form-control" type="text" name="endereco" />
    </div>
    <div class="form-group">
        <label>ID Login</label>
        <input class="form-control" type="number" name="idLogin" />
    </div>
    <button type="submit" name="bt_inserir_pessoa" value="SEND" class="btn btn-primary">
        CADASTRAR
    </button>
</form>

<?php 
   
if( isset($_POST['bt_inserir_pessoa']) ){
    $matricula = $_POST['matricula'];
    $imagem = $_FILES['foto'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $idLogin = $_POST['idLogin'];

    if($imagem != NULL) { 
        $nomeFinal = time().'.jpg';
        if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
            $tamanhoImg = filesize($nomeFinal); 
     
            $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 

            $login = new Login($idLogin, "", "");
            $pessoa = new Pessoa($matricula, $mysqlImg, $nome, $endereco, $login);
            PessoaDAO::inserir($pessoa);
        
            unlink($nomeFinal);
        }
    }else{
        echo "Não realizou o upload de forma satisfatória.";
    }
}
 

