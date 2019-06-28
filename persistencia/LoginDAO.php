<?php

require_once 'GerenteDeConexao.php';
class LoginDAO {

    public static function pesquisa($palavra, $assunto){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "select * from login where {$assunto}='{$palavra}'";
        $result = $conn->query($sql);
        
        $conn->close();
        if ($result == TRUE) {
            return $result;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    public static function selectUm($id){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "select * from login where id_login={$id}";
        $result = $conn->query($sql);
        
        $conn->close();
        if ($result == TRUE) {
            return $result;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public static function select(){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "select * from login";
        $result = $conn->query($sql);
        
        $conn->close();
        if ($result == TRUE) {
            return $result;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public static function delete($idLogin){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "delete from login where id_login=".$idLogin;

        if ($conn->query($sql) === TRUE) {
            echo "Registro excluido com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
    public static function update(Login $login, $idAnterior){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "update login set id_login={$login->id}, usuario_login='{$login->usuario}', senha_login='{$login->senha}' where id_login={$idAnterior}";

        if ($conn->query($sql) === TRUE) {
            echo "Registro alterado com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
    public static function inserir(Login $login){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "insert into login (id_login, usuario_login, senha_login) values ({$login->id}, '{$login->usuario}', '{$login->senha}')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro inserido com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}

