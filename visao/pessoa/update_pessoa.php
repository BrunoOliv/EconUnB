<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../modelos/Pessoa.php';
    require_once __DIR__.'/../../modelos/Login.php';
    require_once __DIR__.'/../../persistencia/PessoaDAO.php';

    $matriculaAnterior = $_POST['matriculaAnterior'];
    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $idLogin = $_POST['idLogin'];

    $login = new Login($idLogin, "", "");
    $pessoa = new Pessoa($matricula, "", $nome, $endereco, $login);

    PessoaDAO::update($pessoa, $matriculaAnterior);