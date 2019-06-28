<?php

require_once 'GerenteDeConexao.php';
class LocalDAO {

    public static function pesquisa($palavra, $assunto){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "select * from local where {$assunto}='{$palavra}'";
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
        $sql = "select * from local where id_local={$id}";
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
        $sql = "select * from local";
        $result = $conn->query($sql);
        
        $conn->close();
        if ($result == TRUE) {
            return $result;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public static function delete($idLocal){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "delete from local where id_local=".$idLocal;

        if ($conn->query($sql) === TRUE) {
            echo "Registro excluido com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
    public static function update(Local $local, $idAnterior){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "update local set id_local={$local->id}, nome_local='{$local->nome}', sigla_local='{$local->sigla}' where id_local={$idAnterior}";

        if ($conn->query($sql) === TRUE) {
            echo "Registro alterado com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
    public static function inserir(local $local){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "insert into local (id_local, nome_local, sigla_local) values ({$local->id}, '{$local->nome}', '{$local->sigla}')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro inserido com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}

