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

        default :
            return "ERROR";
    }
}

function func_ordem_andar($andar = "") {
    if ($andar == "") {
        $andares = array("" => "SELECIONE O ANDAR", "1" => "PRIMEIRO", "2" => "SEGUNDO", "3" => "TERCEIRO");
    } else if ($andar == 1) {
        $andares = array("1" => "PRIMEIRO", "2" => "SEGUNDO", "3" => "TERCEIRO");
    } else if ($andar == 2) {
        $andares = array("2" => "SEGUNDO", "1" => "PRIMEIRO", "3" => "TERCEIRO");
    } else {
        $andares = array("3" => "TERCEIRO", "1" => "PRIMEIRO", "2" => "SEGUNDO");
    }

    return $andares;
}
