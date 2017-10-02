<?php
date_default_timezone_set('America/Sao_Paulo');
include_once '../estrutura/controle/validar_secao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        include_once '../funcoes/function_acesso.php';
        include_once '../funcoes/function_letraMaiscula.php';
        include_once '../funcoes/funcaoData.php';
        include_once '../estrutura/conexao/conexao.php';

        $data_visita = dataAmericano(date('d/m/Y'));
        $hora_visita = date('H:i:s');
        
        

        if (isset($_POST['txt_nome_completo'])) {
            $nome_completo = letraMaiuscula($_POST['txt_nome_completo']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_tipo_doc'])) {
            $tipo_doc = letraMaiuscula($_POST['txt_tipo_doc']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_complemento_doc'])) {
            $complemento_doc = letraMaiuscula($_POST['txt_complemento_doc']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_telefone_fixo'])) {
            $telefone_fixo = letraMaiuscula($_POST['txt_telefone_fixo']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_telefone_celular'])) {
            $telefone_celular = letraMaiuscula($_POST['txt_telefone_celular']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
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
        if (isset($_POST['txt_assunto'])) {
            $assunto = letraMaiuscula($_POST['txt_assunto']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_autorizado'])) {
            $autorizado = letraMaiuscula($_POST['txt_autorizado']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }
        if (isset($_POST['txt_observacao'])) {
            $observacao = letraMaiuscula($_POST['txt_observacao']);
        } else {
            $error = "ERRO REPITA OPERAÇÃO";
        }


        if (isset($error)) {
            $_SESSION['MSG_RETORNO'] = "<div class='alert alert-danger'>ERROR -> " . $error . "</div>";
        } else {
            insere_acesso($pdo, $data_visita, $hora_visita, $nome_completo, $tipo_doc, $complemento_doc, $telefone_fixo, $telefone_celular, $andar, $secretaria, $assunto, $autorizado, $observacao);
            $_SESSION['MSG_RETORNO'] = "<div class='alert alert-success'> CADASTRADO COM SUCESSO </div>";
        }
    } catch (Exception $e) {
        $_SESSION['MSG_RETORNO'] = "<div class='alert alert-danger'>ERROR -> " . $e . "</div>";
    }
     $_SESSION['MSG_RETORNO'] ;
    die(header("Location: ../../../inicial.php"));
} else {
    die(header("Location: ../../../logout.php"));
}
