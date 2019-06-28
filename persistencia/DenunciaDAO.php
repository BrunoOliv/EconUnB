<?php

require_once 'GerenteDeConexao.php';
class DenunciaDAO {

    public static function pesquisa($palavra, $assunto){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "select * from denuncia_view where {$assunto}='{$palavra}'";
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
        $sql = "select * from denuncia where id_denuncia={$id}";
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
        $sql = "select * from denuncia_view";
        $result = $conn->query($sql);
        
        $conn->close();
        if ($result == TRUE) {
            return $result;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public static function delete($idDenuncia){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "delete from denuncia where id_denuncia=".$idDenuncia;

        if ($conn->query($sql) === TRUE) {
            echo "Registro excluido com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
    public static function update(Denuncia $denuncia, $idAnterior){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "update denuncia set id_denuncia={$denuncia->id}, descricao_denuncia='{$denuncia->descricao}',
         id_pessoa='{$denuncia->pessoa->matricula}', id_tipo='{$denuncia->tipo->id}',
          id_gravidade='{$denuncia->gravidade->id}', id_local='{$denuncia->local->id}' where id_denuncia={$idAnterior}";

        if ($conn->query($sql) === TRUE) {
            echo "Registro alterado com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
    public static function inserir(Denuncia $denuncia){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "call confereDenuncia ({$denuncia->id}, '{$denuncia->descricao}', {$denuncia->pessoa->matricula},
            {$denuncia->tipo->id}, {$denuncia->gravidade->id}, {$denuncia->local->id})";

        if ($conn->query($sql) === TRUE) {
            echo "Registro inserido com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}

