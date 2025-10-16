<?php

namespace App\Services;

class TaxasPercentuais
{
    public static function calcular($valor, $taxa) {

        $valor = floatval($valor);
        $taxa = floatval($taxa);
        $resultado = $valor * $taxa;

        return $resultado;
    }
}