<?php

require_once 'GerenteDeConexao.php';
class GravidadeDAO {

    public static function pesquisa($palavra, $assunto){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "select * from gravidade where {$assunto}='{$palavra}'";
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
        $sql = "select * from gravidade where id_gravidade={$id}";
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
        $sql = "select * from gravidade";
        $result = $conn->query($sql);
        
        $conn->close();
        if ($result == TRUE) {
            return $result;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public static function delete($idGravidade){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "delete from gravidade where id_gravidade=".$idGravidade;

        if ($conn->query($sql) === TRUE) {
            echo "Registro excluido com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
    public static function update(Gravidade $gravidade, $idAnterior){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "update gravidade set id_gravidade={$gravidade->id}, nome_gravidade='{$gravidade->nome}' where id_gravidade={$idAnterior}";

        if ($conn->query($sql) === TRUE) {
            echo "Registro alterado com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
    public static function inserir(Gravidade $gravidade){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "insert into gravidade (id_gravidade, nome_gravidade) values ({$gravidade->id}, '{$gravidade->nome}')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro inserido com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}

