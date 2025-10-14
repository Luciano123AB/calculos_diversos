<?php

namespace App\Services;

class DescontosCupons
{
    public static function calcular($valor, $desconto) {

        $valor = floatval($valor);
        $resultado = $valor - ($valor * $desconto / 100);

        return $resultado;
    }
}