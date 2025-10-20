<?php

namespace App\Services;

class MediasSomasMedianasPercentuais
{
    public static function calcularMedia($nota01, $nota02, $nota03) {

        $notas = [floatval($nota01), floatval($nota02), floatval($nota03)];
        $soma = array_sum($notas);
        $quantidade = count($notas);
        $resultado = $soma / $quantidade;

        return $resultado;
    }

    public static function calcularMediana($numero01, $numero02, $numero03, $numero04) {

        $numeros = [$numero01, $numero02, $numero03, $numero04];

        sort($numeros);

        $quantidade = count($numeros);

        if ($quantidade % 2 == 0) {

            $meio1 = $numeros[$quantidade / 2 - 1];
            $meio2 = $numeros[$quantidade / 2];
            $resultado = ($meio1 + $meio2) / 2;

        } else {

            $resultado = $numeros[floor($quantidade / 2)];

        }

        return $resultado;
    }

    public static function calcularPercentual($quantidade, $total) {

        $resultado = ($quantidade / $total) * 100;

        return $resultado;
    }
}