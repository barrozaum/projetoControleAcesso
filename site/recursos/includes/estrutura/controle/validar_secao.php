<?php
//abrindo seção no servidor 
if(!isset($_SESSION))
{
   session_start();
}

if (!isset($_SESSION["LOGADO_SISTEMA"])) {
    session_destroy();
    header("Location: sessao_expirada.php");
    exit();
}

//error_reporting(0);