<?php

namespace App\Services;

class JurosCompostosSimples
{
    public static function calcularAumento($valor, $juros, $taxa, $tempo) {

        $valor = floatval($valor);
        $taxa = floatval($taxa) / 100;
        $aumento = 0.0;
        $resultado = 0.0;
        
        if ($juros == "Composto") {

            $aumento = $valor * pow((1 + $taxa), $tempo);
            $resultado = $aumento - $valor;

        }

        if ($juros == "Simples") {

            $aumento = $valor + ($valor * $taxa * $tempo);
            $resultado = $aumento - $valor;

        }

        return $resultado;
    }

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