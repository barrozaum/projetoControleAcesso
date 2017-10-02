<?php

function dataBrasileiro($data) {

    if ($data == "" || $data == "1900-01-01 00:00:00.000") {
        return "00/00/0000";
    } else {
        $partes_data = explode("-", $data);
        $ano = $partes_data[0];
        $dia = $partes_data[1];
        $resto_data = explode(" ", $partes_data[2]);
        $mes = $resto_data[0];

        $data_brasil = $dia . "/" .  $mes. "/" . $ano;
        return $data_brasil;
    }
}

function dataAmericano($data) {
    if ($data == "" || $data == "00/00/0000") {
        return null;
    } else {
        $partes_data = explode("/", $data);
        $dia = $partes_data[0];
        $mes = $partes_data[1];
        $ano = $partes_data[2];

        //servidor web
        return $ano . "-" . $dia   . "-" . $mes;
    }
}
