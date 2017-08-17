<?php

function insere_acesso($pdo, $data_visita, $hora_visita, $nome_completo, $tipo_doc, $complemento_doc, $telefone_fixo, $telefone_celular, $andar, $secretaria, $assunto, $autorizado, $observacao) {
    $pdo->beginTransaction();

    $sql = "INSERT INTO controle_acesso ";
    $sql = $sql . "(data_visita, hora_visita, nome_completo, tipo_doc, complemento_doc, andar, secretaria, assunto, autorizado, observacao, usuario)";
    $sql = $sql . "  VALUES ";
    $sql = $sql . "('{$data_visita}', '{$hora_visita}', '{$nome_completo}', '{$tipo_doc}', '{$complemento_doc}', '{$andar}', '{$secretaria}', '{$assunto}', '{$autorizado}', '{$observacao}', '{$_SESSION['LOGIN_USUARIO']}')";
    $query = $pdo->prepare($sql);
    $query->execute();
    $ultima_id = $pdo->lastInsertId();

    $tam_fixo =  strlen($telefone_fixo);
    $tam_cel =  strlen($telefone_celular);
    if ($tam_fixo >= 10 && $tam_fixo <= 11){
        insere_telefone_contato($pdo, $ultima_id, $telefone_fixo);
    }
    if ($tam_cel >= 10 && $tam_cel <= 11){
        insere_telefone_contato($pdo, $ultima_id, $telefone_celular);
    }
    
    $pdo->commit();
}

function insere_telefone_contato($pdo, $ultima_id, $telefone) {
    
    $sql = "INSERT INTO telefone ";
    $sql = $sql . " (id_acesso, numero)";
    $sql = $sql . " VALUES ";
    $sql = $sql . " ('{$ultima_id}', '{$telefone}') ";
    $query = $pdo->prepare($sql);
    $query->execute();
}
