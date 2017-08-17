<?php
if (isset($_POST['acao'])) {
    if ($_POST['acao'] === "listar_andar") {
        $cod = $_POST['codigo'];
        listar_secretarias_por_andar($cod);
    }
}

//inserindo secretaria
function insere_secretaria($pdo, $andar, $secretaria, $tel) {
    $sql = "INSERT INTO secretaria (descricao_secretaria, numero_andar, telefone) VALUES ('{$secretaria}', '{$andar}', '{$tel}')";
    $query = $pdo->prepare($sql);
    $query->execute();
}

//buscanco pelo codigo
function findbycode($pdo, $codigo) {
    $sql = "SELECT * FROM secretaria WHERE id_secretaria = '{$codigo}' AND ativo = 0 ";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query;
}

// buscando todos os registros

function find_all_secretaria($pdo) {
    $sql = "select * FROM secretaria WHERE ativo = 0 order  by id_secretaria";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query;
}

//alterando 
function update_secretaria($pdo, $id_secretaria, $andar, $secretaria, $tel) {
    $sql = "UPDATE secretaria SET ";
    $sql = $sql . " numero_andar = '{$andar}', ";
    $sql = $sql . " descricao_secretaria = '{$secretaria}', ";
    $sql = $sql . " telefone = '{$tel}'";
    $sql = $sql . " WHERE id_secretaria = '{$id_secretaria}'";
    $query = $pdo->prepare($sql);
    $query->execute();
}

function deleta_secretaria($pdo, $id_secretaria) {
    $sql = "UPDATE secretaria SET ";
    $sql = $sql . " ativo = 1 ";
    $sql = $sql . " WHERE id_secretaria = '{$id_secretaria}'";
    $query = $pdo->prepare($sql);
    $query->execute();
}

function listar_secretarias_por_andar($cod) {
    try {
        include_once '../estrutura/conexao/conexao.php';
        if($cod < 1){
            $saida = "<option value=''>SELECIONE PRIMEIRO O ANDAR</option>";
        }else{
            $saida = "<option value=''>SELECIONE SECRETARIA</option>";
        
        }
        $sql = "SELECT * FROM secretaria WHERE numero_andar = '{$cod}' AND ativo = 0";
        $query = $pdo->prepare($sql);
        $query->execute();
        while ($dados = $query->fetch()) {
            $saida = $saida . "<option value='{$dados['id_secretaria']}'>{$dados['descricao_secretaria']}</option>";
        }
        
    } catch (Exception $e) {
        print $e->getMessage();
    }
    $pdo=null;
    print $saida;
}
