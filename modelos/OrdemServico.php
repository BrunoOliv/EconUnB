<?php

class Denuncia  {
    public $denuncia;
    public $funcionario;
    public $dataInicial;
    public $dataFinal;

    public function __construct(Denuncia $denuncia, Funcionario $funcionario, $dataInicial, $dataFinal) {
        $this->denuncia = $denuncia;
        $this->funcionario = $funcionario;
        $this->dataInicial = $dataInicial;
        $this->dataFinal = $dataFinal;
        $this->descricao = $descricao;
    }
}