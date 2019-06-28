<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../persistencia/LoginDAO.php';

    $id = $_POST['id'];
    
    LoginDAO::delete($id);