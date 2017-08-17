<?php

include_once '../estrutura/controle/validar_secao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        include_once '../funcoes/function_secretaria.php';
        include_once '../funcoes/function_letraMaiscula.php';
        include_once '../estrutura/conexao/conexao.php';

        if (isset($_POST['txt_id_secretaria'])) {
            $id_secretaria = letraMaiuscula($_POST['txt_id_secretaria']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }

        if (isset($_POST['txt_exc_andar'])) {
            $andar = letraMaiuscula($_POST['txt_exc_andar']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_exc_secretaria'])) {
            $secretaria = letraMaiuscula($_POST['txt_exc_secretaria']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_exc_telefone_fixo'])) {
            $telefefone = letraMaiuscula($_POST['txt_exc_telefone_fixo']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }


        if (isset($error)) {
            $_SESSION['MSG_RETORNO'] = "<div class='alert alert-danger'>ERROR -> " . $error . "</div>";
        } else {
            deleta_secretaria($pdo, $id_secretaria);
            $_SESSION['MSG_RETORNO'] = "<div class='alert alert-success'> DELETADO COM SUCESSO </div>";
        }
    } catch (Exception $e) {
        $_SESSION['MSG_RETORNO'] = "<div class='alert alert-danger'>ERROR -> " . $e . "</div>";
    }

    die(header("Location: ../../../cadastro_secretaria.php"));
} else {
    die(header("Location: ../../../logout.php"));
}
