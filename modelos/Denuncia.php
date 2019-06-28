<?php

class Denuncia  {
    public $id;
    public $descricao;
    public $tipo;
    public $local;
    public $gravidade;
    public $pessoa;
    
    public function __construct($id, $descricao, Pessoa $pessoa, Tipo $tipo, Gravidade $gravidade, Local $local) {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->tipo = $tipo;
        $this->local = $local;
        $this->gravidade = $gravidade;
        $this->pessoa = $pessoa;
    }
}