<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../modelos/Local.php';
    require_once __DIR__.'/../../persistencia/LocalDAO.php';

    $idAnterior = $_POST['idAnterior'];
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $sigla = $_POST['sigla'];
    
    $local = new Local($id, $sigla, $nome);

    LocalDAO::update($local, $idAnterior);