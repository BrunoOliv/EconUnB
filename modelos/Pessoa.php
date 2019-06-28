<?php

class Pessoa {
    public $matricula;
    public $foto;
    public $nome;
    public $endereco;
    public $login;
    
    public function __construct($matricula, $foto, $nome, $endereco, Login $login) {
        $this->matricula = $matricula;
        $this->foto = $foto;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->login = $login;
    }
    
}
