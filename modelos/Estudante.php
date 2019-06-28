<?php

class Estudante extends Pessoa {
    public $anoIngresso;

    public function __construct($matricula, $foto, $nome, $endereco, Login $login, $anoIngresso) {
        parent::__construct($matricula, $foto, $nome, $endereco, $login);
        $this->anoIngresso = $anoIngresso;
    }
}