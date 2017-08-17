<?php

include_once '../estrutura/controle/validar_secao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        include_once '../funcoes/function_secretaria.php';
        include_once '../funcoes/function_letraMaiscula.php';
        include_once '../estrutura/conexao/conexao.php';


        if (isset($_POST['txt_andar'])) {
            $andar = letraMaiuscula($_POST['txt_andar']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_secretaria'])) {
            $secretaria = letraMaiuscula($_POST['txt_secretaria']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_telefone_fixo'])) {
            $telefefone = letraMaiuscula($_POST['txt_telefone_fixo']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }


        if (isset($error)) {
            $_SESSION['MSG_RETORNO'] = "<div class='alert alert-danger'>ERROR -> " . $error . "</div>";
        } else {
            insere_secretaria($pdo, $andar, $secretaria, $telefefone);
            $_SESSION['MSG_RETORNO'] = "<div class='alert alert-success'> CADASTRADO COM SUCESSO </div>";
        }
    } catch (Exception $e) {
        $_SESSION['MSG_RETORNO'] = "<div class='alert alert-danger'>ERROR -> " . $e . "</div>";
    }

    die(header("Location: ../../../cadastro_secretaria.php"));
} else {
    die(header("Location: ../../../logout.php"));
}
