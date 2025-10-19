<?php

namespace App\Services;

class ConversoresDiversos
{
    public static function calcular($valor, $escolha) {

        $valor = floatval($valor);
        $resultado = "";

        if ($escolha == "Celsius") {

            $resultado = ($valor - 32) * 5 / 9;

        } else if ($escolha == "Fahrenheit") {
            
            $resultado = ($valor * 9 / 5) + 32;

        } else if ($escolha == "Quilômetros") {

            $resultado = $valor / 0.621371;

        } else if ($escolha == "Milhas") {

            $resultado = $valor * 0.621371;

        }

        return $resultado;
    }
}