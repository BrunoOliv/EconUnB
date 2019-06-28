<?php

class Funcionario extends Pessoa {
    public $dataContrato;

    public function __construct($matricula, $foto, $nome, $endereco, Login $login, $dataContrato) {
        parent::__construct($matricula, $foto, $nome, $endereco, $login);
        $this->dataContrato = $dataContrato;
    }
}