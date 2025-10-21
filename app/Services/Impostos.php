<?php

namespace App\Services;

class Impostos
{
    public static function calcularImposto($valor, $taxa) {

        $valor = floatval($valor);
        $taxa = floatval($taxa);
        $resultado = $valor * ($taxa / 100);

        return $resultado;
    }

    public static function calcular($valor, $taxa) {

        $valor = floatval($valor);
        $taxa = $valor * ($taxa / 100);
        $resultado = $valor + $taxa;

        return $resultado;
    }
}