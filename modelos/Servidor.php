<?php

class Servidor extends Pessoa {
    public $cargo;

    public function __construct($matricula, $foto, $nome, $endereco, Login $login, $cargo) {
        parent::__construct($matricula, $foto, $nome, $endereco, $login);
        $this->cargo = $cargo;
    }
}