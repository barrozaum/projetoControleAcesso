<?php

try {
    $Localizacao_Banco = "BARROZO\SQLEXPRESS";
    $nome_Base_Dados = "CODENI_CONTROLE_ACESSO";
    $usuario_Banco = 'sa';
    $senha_Banco = '123';
    $pdo = new PDO("sqlsrv:Server=$Localizacao_Banco;Database=$nome_Base_Dados", "$usuario_Banco", "$senha_Banco");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
} catch (PDOException $e) {
    print $e->getMessage();
}
?>