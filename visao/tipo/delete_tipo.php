<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../persistencia/TipoDAO.php';

    $id = $_POST['id'];
    
    TipoDAO::delete($id);