<?php

class GerenteDeConexao {
    private$servername;
    private $username;
    private $password;
    private $dbname;

    public function conectar( ){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "econunb";
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{
            return $conn;
        }
        
    }
}


