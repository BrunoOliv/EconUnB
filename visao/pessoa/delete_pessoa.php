<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../persistencia/PessoaDAO.php';

    $matricula = $_POST['matricula'];
    
    PessoaDAO::delete($matricula);