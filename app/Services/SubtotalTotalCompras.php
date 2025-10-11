<?php

namespace App\Services;

class SubtotalTotalCompras
{
    public static function calcular($valor, $quantidade) {

        $valor = floatval($valor);
        $quantidade = intval($quantidade);
        $resultado = $valor * $quantidade;

        return $resultado;
    }
}