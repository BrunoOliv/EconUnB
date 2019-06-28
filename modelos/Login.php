<?php
class Login {
    public $id;
    public $usuario;
    public $senha;
    
    public function __construct($id, $usuario, $senha) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->senha = $senha;
    }
}
