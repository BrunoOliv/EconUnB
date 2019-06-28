<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../persistencia/DenunciaDAO.php';

    $id = $_POST['id'];
    
    DenunciaDAO::delete($id);