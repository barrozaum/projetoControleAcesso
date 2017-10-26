<?php

//descricao andar
function func_descricao_andar($andar) {
    switch ($andar) {
        case 1:
            return "PRIMEIRO";

        case 2:
            return "SEGUNDO";

        case 3 :
            return "TERCEIRO";

        case 4 :
            return "TERREO";


        default :
            return "ERROR";
    }
}

function func_ordem_andar($andar = "") {
    if ($andar == "") {
        $andares = array("" => "SELECIONE O ANDAR", "1" => "PRIMEIRO", "2" => "SEGUNDO", "3" => "TERCEIRO", "4" => "TERREO");
    } else if ($andar == 1) {
        $andares = array("1" => "PRIMEIRO", "2" => "SEGUNDO", "3" => "TERCEIRO", "4" => "TERREO");
    } else if ($andar == 2) {
        $andares = array("2" => "SEGUNDO", "1" => "PRIMEIRO", "3" => "TERCEIRO", "4" => "TERREO");
    } else if ($andar == 3) {
        $andares = array("3" => "TERCEIRO", "1" => "PRIMEIRO", "2" => "SEGUNDO", "4" => "TERREO");
    } else {
        $andares = array("4" => "TERREO", "3" => "TERCEIRO", "1" => "PRIMEIRO", "2" => "SEGUNDO");
    }

    return $andares;
}
