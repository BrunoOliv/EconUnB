<?php

require_once 'GerenteDeConexao.php';
class PessoaDAO {

    public static function pesquisa($palavra, $assunto){
        if($assunto == "id_login"){
            $assunto = "p.id_login";
        }
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "select * from pessoa as p 
                inner join login as l on p.id_login = l.id_login  
                where {$assunto}='{$palavra}'";
        $result = $conn->query($sql);
        
        $conn->close();
        if ($result == TRUE) {
            return $result;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    public static function selectUm($matricula){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "select * from pessoa where matricula_pessoa={$matricula}";
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
        $sql = "select * from pessoa as p
                inner join login as l on p.id_login = l.id_login";
        $result = $conn->query($sql);
        
        $conn->close();
        if ($result == TRUE) {
            return $result;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public static function delete($matriculaPessoa){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "delete from pessoa where matricula_pessoa=".$matriculaPessoa;

        if ($conn->query($sql) === TRUE) {
            echo "Registro excluido com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
    public static function update(Pessoa $pessoa, $matriculaAnterior){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "update pessoa set matricula_pessoa={$pessoa->matricula}, nome_pessoa='{$pessoa->nome}', endereco_pessoa='{$pessoa->endereco}', id_login='{$pessoa->login->id}' where matricula_pessoa={$matriculaAnterior}";

        if ($conn->query($sql) === TRUE) {
            echo "Registro alterado com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
    public static function inserir(Pessoa $pessoa){
        $gc = new GerenteDeConexao;
        $conn = $gc->conectar();
        $sql = "insert into pessoa (matricula_pessoa, foto_pessoa, nome_pessoa, endereco_pessoa, id_login) values ({$pessoa->matricula}, '{$pessoa->foto}', '{$pessoa->nome}', '{$pessoa->endereco}', '{$pessoa->login->id}')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro inserido com sucesso !!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}

