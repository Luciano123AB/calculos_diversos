<?php

namespace App\Services;

class PrevisaGanhosPerdas
{
    public static function calcular($receita, $despesa) {

        $receita = floatval($receita);
        $despesa = intval($despesa);
        $resultado = $receita - $despesa;

        return $resultado;
    }
}