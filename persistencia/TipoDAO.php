<?php

require_once 'GerenteDeConexao.php';
class TipoDAO {

    public static function pesquisa($palavra, $assunto){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "select * from tipo where {$assunto}='{$palavra}'";
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
        $sql = "select * from tipo where id_tipo={$id}";
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
        $sql = "select * from tipo";
        $result = $conn->query($sql);
        
        $conn->close();
        if ($result == TRUE) {
            return $result;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public static function delete($idTipo){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "delete from tipo where id_tipo=".$idTipo;

        if ($conn->query($sql) === TRUE) {
            echo "Registro excluido com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
    public static function update(Tipo $tipo, $idAnterior){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "update tipo set id_tipo={$tipo->id}, nome_tipo='{$tipo->nome}' where id_tipo={$idAnterior}";

        if ($conn->query($sql) === TRUE) {
            echo "Registro alterado com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
    public static function inserir(Tipo $tipo){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "insert into tipo (id_tipo, nome_tipo) values ({$tipo->id}, '{$tipo->nome}')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro inserido com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}

