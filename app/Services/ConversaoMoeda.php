<?php

namespace App\Services;

class ConversaoMoeda
{
    public static function calcular($valor, $moeda) {

        $valor = floatval($valor);
        $moeda = $moeda;
        $resultado = 0.0;

        if ($moeda == "Dólar") {

            $resultado = $valor / 5.53;

        }

        if ($moeda == "Euro") {

            $resultado = $valor / 6.42;

        }

        if ($moeda == "Libra") {

            $resultado = $valor / 7.18;

        }

        if ($moeda == "Iene") {

            $resultado = $valor / 0.40;

        }

        if ($moeda == "Franco") {

            $resultado = $valor / 6.91;

        }

        return $resultado;
    }
}