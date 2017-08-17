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
        if (isset($_POST['txt_alt_login_colaborador'])) {
            $colaborador_login = letraMaiuscula($_POST['txt_alt_login_colaborador']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_alt_colaborador_nome'])) {
            $colaborador_nome = letraMaiuscula($_POST['txt_alt_colaborador_nome']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }

        if(isset($_POST['txt_alterar_perfil'])){
              $alterar_perfil = letraMaiuscula($_POST['txt_alterar_perfil']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_alterar_senha'])) {
            $alterar_senha = letraMaiuscula($_POST['txt_alterar_senha']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if ($alterar_senha === 1) {
            if (isset($_POST['txt_alt_colaborador_senha'])) {
                $colaborador_senha = letraMaiuscula($_POST['txt_alt_colaborador_senha']);
            } else {
                $error = "ERRO REPITA OPERAÇÃO";
            }
            if (isset($_POST['txt_alt_colaborador_conf_senha'])) {
                $colaborador_conf_senha = letraMaiuscula($_POST['txt_alt_colaborador_conf_senha']);
            } else {
                $error = "ERRO REPITA OPERAÇÃO";
            }


            if ($_POST['txt_alt_colaborador_senha'] !== $_POST['txt_alt_colaborador_conf_senha']) {
                $error = "SENHAS NÃO CONFEREM !!!";
            } else {
                $password = md5($colaborador_conf_senha);
            }
        }

        if (isset($error)) {
            $_SESSION['MSG_RETORNO'] = "<div class='alert alert-danger'>ERROR -> " . $error . "</div>";
        } else {
            update_usuario($pdo, $id_usuario, $colaborador_nome, $colaborador_login, $colaborador_senha, $alterar_senha, $alterar_perfil);
            $_SESSION['MSG_RETORNO'] = "<div class='alert alert-success'> ALTERADO COM SUCESSO </div>";
        }
    } catch (Exception $e) {
        $_SESSION['MSG_RETORNO'] = "<div class='alert alert-danger'>ERROR -> " . $e . "</div>";
    }

    die(header("Location: ../../../cadastro_usuario.php"));
} else {
    die(header("Location: ../../../logout.php"));
}
