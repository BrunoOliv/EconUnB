<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../persistencia/LocalDAO.php';

    $id = $_POST['id'];
    
    LocalDAO::delete($id);