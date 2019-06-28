<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../modelos/Tipo.php';
    require_once __DIR__.'/../../persistencia/TipoDAO.php';

    $idAnterior = $_POST['idAnterior'];
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    
    $tipo = new Tipo($id, $nome);

    TipoDAO::update($tipo, $idAnterior);