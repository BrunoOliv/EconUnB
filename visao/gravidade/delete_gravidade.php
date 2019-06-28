<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../persistencia/GravidadeDAO.php';

    $id = $_POST['id'];
    
    GravidadeDAO::delete($id);