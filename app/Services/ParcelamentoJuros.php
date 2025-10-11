<?php

namespace App\Services;

class ParcelamentoJuros
{
    public static function calcular($valor, $taxa, $numero_meses) {

        $valor = floatval($valor);
        $taxa = floatval($taxa) / 100;
        $numero_meses = intval($numero_meses);

        if ($taxa == 0.0 || $taxa == "") {

            $resultado = $valor / $numero_meses;

        } else {

            $resultado = $valor * (($taxa) * pow(1 + $taxa, $numero_meses)) / (pow(1 + $taxa, $numero_meses) - 1);
            
        }

        return $resultado;
    }
}