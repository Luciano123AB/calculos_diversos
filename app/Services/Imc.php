<?php

namespace App\Services;

class Imc
{
    public static function calcular($peso, $altura) {

        $peso = floatval($peso);
        $altura = floatval($altura);
        $resultado = $peso / pow($altura, 2);        

        return $resultado;
    }

    public static function classificar($imc) {

        $classificacao = "";

        if ($imc < 18.5) {
            $classificacao = "Abaixo do peso";
        } elseif ($imc < 24.9) {
            $classificacao = "Peso normal";
        } elseif ($imc < 29.9) {
            $classificacao = "Sobrepeso";
        } elseif ($imc < 34.9) {
            $classificacao = "Obesidade grau I";
        } elseif ($imc < 39.9) {
            $classificacao = "Obesidade grau II";
        } else {
            $classificacao = "Obesidade grau III (Mórbida)";
        }

        return $classificacao;
    }
}