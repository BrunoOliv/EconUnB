<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../modelos/Gravidade.php';
    require_once __DIR__.'/../../persistencia/GravidadeDAO.php';

    $idAnterior = $_POST['idAnterior'];
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    
    $gravidade = new Gravidade($id, $nome);

    GravidadeDAO::update($gravidade, $idAnterior);