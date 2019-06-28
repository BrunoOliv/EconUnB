<?php

class Professor extends Pessoa {
    public $cpf;

    public function __construct($matricula, $foto, $nome, $endereco, Login $login, $cpf) {
        parent::__construct($matricula, $foto, $nome, $endereco, $login);
        $this->cpf = $cpf;
    }
}