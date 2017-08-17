<?php

include_once '../estrutura/controle/validar_secao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        include_once '../funcoes/function_usuario.php';
        include_once '../funcoes/function_letraMaiscula.php';
        include_once '../estrutura/conexao/conexao.php';

        if (isset($_POST['txt_perfil'])) {
            $colaborador_perfil = "ADMINISTRADOR";
        } else {
            $colaborador_perfil = "USUARIO";
        }

        if (isset($_POST['txt_login_colaborador'])) {
            $colaborador_login = letraMaiuscula($_POST['txt_login_colaborador']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_colaborador_nome'])) {
            $colaborador_nome = letraMaiuscula($_POST['txt_colaborador_nome']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_colaborador_senha'])) {
            $colaborador_senha = letraMaiuscula($_POST['txt_colaborador_senha']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_colaborador_conf_senha'])) {
            $colaborador_conf_senha = letraMaiuscula($_POST['txt_colaborador_conf_senha']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }

        if ($_POST['txt_colaborador_senha'] !== $_POST['txt_colaborador_conf_senha']) {
            $error = "SENHAS NÃO CONFEREM !!!";
        }else{
          
            $password = md5($colaborador_conf_senha);
        }

        if (isset($error)) {
            $_SESSION['MSG_RETORNO'] = "<div class='alert alert-danger'>ERROR -> " . $error . "</div>";
        } else {
            insere_usuario($pdo, $colaborador_login, $colaborador_nome,$colaborador_perfil, $password);
            $_SESSION['MSG_RETORNO'] = "<div class='alert alert-success'> CADASTRADO COM SUCESSO </div>";
        }
    } catch (Exception $e) {
        $_SESSION['MSG_RETORNO'] = "<div class='alert alert-danger'>ERROR -> " . $e . "</div>";
    }

    die(header("Location: ../../../cadastro_usuario.php"));
} else {
    die(header("Location: ../../../logout.php"));
}
