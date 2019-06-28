<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../modelos/Login.php';
    require_once __DIR__.'/../../persistencia/LoginDAO.php';

    $idAnterior = $_POST['idAnterior'];
    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    
    $login = new Login($id, $usuario, $senha);

    LoginDAO::update($login, $idAnterior);