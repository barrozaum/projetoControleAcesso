<?php

function busca_por_data($pdo, $data_inicial, $data_final){
    $sql = "SELECT * FROM controle_acesso WHERE data_visita BETWEEN '{$data_inicial}' AND '{$data_final}'";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query;
     
}