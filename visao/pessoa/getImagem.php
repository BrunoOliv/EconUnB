<?php
    require_once __DIR__.'/../../persistencia/PessoaDAO.php';

    $PicNum = $_GET["PicNum"];

    $result = PessoaDAO::selectUm($PicNum);
    $row = $result->fetch_assoc(); 
    Header( "Content-type: image/gif"); 
    echo $row['foto_pessoa'];