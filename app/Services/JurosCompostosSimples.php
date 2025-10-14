<?php

namespace App\Services;

class JurosCompostosSimples
{
    public static function calcular($valor, $juros, $taxa, $tempo) {

        $valor = floatval($valor);
        $taxa = floatval($taxa) / 100;
        $resultado = 0.0;
        
        if ($juros == "Composto") {

            $resultado = $valor * pow((1 + $taxa), $tempo);

        }

        if ($juros == "Simples") {

            $resultado = $valor + ($valor * $taxa * $tempo);

        }

        return $resultado;
    }
}