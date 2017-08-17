<?php

function fun_validar_login($pdo, $login, $senha) {
    try {
        $sql_login_senha = " SELECT * FROM usuario ";
        $sql_login_senha = $sql_login_senha . " WHERE usuario = '{$login}'";
        $sql_login_senha = $sql_login_senha . " AND  senha = '{$senha}'";
        $sql_login_senha = $sql_login_senha . " AND  ativo = 0";

        $query_login_senha = $pdo->prepare($sql_login_senha);
        $query_login_senha->execute();
        if ($query_login_senha->fetchColumn() > 0) {
            $query_login_senha->execute();
            $dados = $query_login_senha->fetch();
            $_SESSION['LOGADO'] = "S";
            $_SESSION['PERFIL_USUARIO'] = $dados['perfil'];
            $pdo = null;
            return "conectado";
        } else {

            $pdo = null;
            return "USUÁRIO/SENHA INVÁLIDO!!!";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

//listando todos os usuarios
function find_all_usuario($pdo) {
    $sql = "SELECT * FROM usuario WHERE ativo = 0 order by usuario";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query;
}

//inserindo usuario
function insere_usuario($pdo, $login, $nome, $perfil, $senha) {
    $sql = "INSERT INTO usuario (usuario,senha,nome, perfil) VALUES ('{$login}', '{$senha}', '{$nome}', '{$perfil}')";
    $query = $pdo->prepare($sql);
    $query->execute();
}

//buscanco pelo codigo
function findbycode($pdo, $codigo) {
    $sql = "SELECT * FROM usuario WHERE id_usuario = '{$codigo}' AND ativo = 0 ";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query;
}

//alterando 
function update_usuario($pdo, $id_usuario, $nome, $login, $senha, $alterar_senha = 0, $alterar_perfil) {
    $sql = "UPDATE usuario SET ";
    $sql = $sql . " nome = '{$nome}', ";

    if ($alterar_senha === 1) {
        $sql = $sql . " senha = '{$senha}',";
    }
    $sql = $sql . " usuario = '{$login}', ";
    $sql = $sql . " perfil = '{$alterar_perfil}' ";
    $sql = $sql . " WHERE id_usuario = '{$id_usuario}'";
    $query = $pdo->prepare($sql);
    $query->execute();
}


//excluindo
function deletando_usuario($pdo, $id_usuario) {
    $sql = "UPDATE usuario SET ";
    $sql = $sql . " ativo = 1 ";
    $sql = $sql . " WHERE id_usuario = '{$id_usuario}'";
    $query = $pdo->prepare($sql);
    $query->execute();
}
