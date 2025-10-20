<?php

namespace App\Services;

class Pontuacoes
{
    public static function calcularPontos($acertos) {

        $pontos_acerto = 1.5;
        $resultado = $pontos_acerto * $acertos;

        return $resultado;
    }

    public static function calcularTotal($total_questoes) {

        $pontos_acerto = 1.5;
        $resultado = $pontos_acerto * $total_questoes;

        return $resultado;
    }
}