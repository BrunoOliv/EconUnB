<?php

class Local  {
    public $id;
    public $sigla;    
    public $nome;

    public function __construct($id, $sigla, $nome) {
        $this->id = $id;
        $this->sigla = $sigla;
        $this->nome = $nome;
    }
}