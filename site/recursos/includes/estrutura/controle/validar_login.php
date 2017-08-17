<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    session_start();


    try {
        include_once '../conexao/conexao.php';
        include_once '../../funcoes/function_letraMaiscula.php';
        include_once '../../funcoes/function_usuario.php';

        $login = letraMaiuscula($_POST['txtlogin']);
        $password = md5(letraMaiuscula($_POST['txtsenha']));

        $retorn_login = fun_validar_login($pdo, $login, $password);
        if ($retorn_login === "conectado") {
            $_SESSION['LOGADO_SISTEMA'] = "Logado";
            $_SESSION['LOGIN_USUARIO'] = "{$login}";
            header("Location: ../../../../inicial.php");
        } else {
            $_SESSION['MENSAGEM'] = $retorn_login;
            header('Location:../../../../');
        }
    } catch (Exception $e) {
        $_SESSION['MENSAGEM'] = $e->getMessage();
        header('Location:../../../../');
    }
} else {
    $_SESSION['MENSAGEM'] = "ERRO NA REQUISIÇÃO !!!";
    header('Location:../../../../');
}

