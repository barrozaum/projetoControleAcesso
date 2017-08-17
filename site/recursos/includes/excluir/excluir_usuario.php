<?php

include_once '../estrutura/controle/validar_secao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        include_once '../funcoes/function_usuario.php';
        include_once '../funcoes/function_letraMaiscula.php';
        include_once '../estrutura/conexao/conexao.php';

        if (isset($_POST['txt_id_usuario'])) {
            $id_usuario = letraMaiuscula($_POST['txt_id_usuario']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_exc_login_colaborador'])) {
            $colaborador_login = letraMaiuscula($_POST['txt_exc_login_colaborador']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_exc_colaborador_nome'])) {
            $colaborador_nome = letraMaiuscula($_POST['txt_exc_colaborador_nome']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }

        if (isset($error)) {
            $_SESSION['MSG_RETORNO'] = "<div class='alert alert-danger'>ERROR -> " . $error . "</div>";
        } else {
            deletando_usuario($pdo, $id_usuario);
            $_SESSION['MSG_RETORNO'] = "<div class='alert alert-success'> DELETADO COM SUCESSO </div>";
        }
    } catch (Exception $e) {
        $_SESSION['MSG_RETORNO'] = "<div class='alert alert-danger'>ERROR -> " . $e . "</div>";
    }

    die(header("Location: ../../../cadastro_usuario.php"));
} else {
    die(header("Location: ../../../logout.php"));
}
