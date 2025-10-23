<?php

namespace App\Services;

class Fisicos
{
    public static function calcularConsumo($quantidade, $tempo) {

        $resultado = $quantidade / $tempo;

        return $resultado;
    }

    public static function calcularEficiencia($distancia, $tempo) {

        $resultado = $distancia / $tempo;

        return $resultado;
    }
}