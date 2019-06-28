<?php
    require_once __DIR__.'/../../includes/cabecalho.php';
    require_once __DIR__.'/../../persistencia/DenunciaDAO.php';
    require_once __DIR__.'/../../modelos/Denuncia.php';
    require_once __DIR__.'/../../modelos/Pessoa.php';
    require_once __DIR__.'/../../modelos/Tipo.php';
    require_once __DIR__.'/../../modelos/Gravidade.php';
    require_once __DIR__.'/../../modelos/Local.php';
    require_once __DIR__.'/../../modelos/Login.php';

    $idAnterior = $_POST['idAnterior'];
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $idPessoa = $_POST['idPessoa'];
    $idTipo = $_POST['idTipo'];
    $idGravidade = $_POST['idGravidade'];
    $idLocal = $_POST['idLocal'];
    
    $login = new Login("","","");
    $pessoa = new Pessoa($idPessoa, "","","", $login);
    $tipo = new Tipo($idTipo,"");
    $gravidade = new Gravidade($idGravidade,"");
    $local = new Local($idLocal,"","");

    $denuncia = new Denuncia($id, $descricao, $pessoa, $tipo, $gravidade, $local);
    DenunciaDAO::update($denuncia, $idAnterior);