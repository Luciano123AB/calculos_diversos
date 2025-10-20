<?php

namespace App\Services;

class GraficosDinamicos
{
    public static function calcular($permitidos, $negados) {

        $resultado = $permitidos + $negados;

        return $resultado;
    }
}