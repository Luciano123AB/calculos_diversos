<?php

namespace App\Services;

class Frete
{
    public static function calcular($valor_km, $distancia) {

        $valor_km = floatval($valor_km);
        $distancia = floatval($distancia);
        $resultado = $valor_km * $distancia;

        return $resultado;
    }
}