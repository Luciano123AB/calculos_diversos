<?php

namespace App\Services;

class RelatoriosDesempenho
{
    public static function calcularTotal($venda01, $venda02, $venda03, $venda04) {

        $vendas = [$venda01, $venda02, $venda03, $venda04];
        $resultado = array_sum($vendas);

        return $resultado;
    }

    public static function calcularMedia($venda01, $venda02, $venda03, $venda04) {

        $vendas = [$venda01, $venda02, $venda03, $venda04];
        $total_vendas = array_sum($vendas);
        $resultado = $total_vendas / count($vendas);

        return $resultado;
    }

    public static function calcularMelhor($venda01, $venda02, $venda03, $venda04) {

        $vendas = [$venda01, $venda02, $venda03, $venda04];
        $resultado = max($vendas);

        return $resultado;
    }

    public static function calcularPior($venda01, $venda02, $venda03, $venda04) {

        $vendas = [$venda01, $venda02, $venda03, $venda04];
        $resultado = min($vendas);

        return $resultado;
    }

    public static function calcularTaxa($venda01, $venda02, $venda03, $venda04) {

        $vendas = [$venda01, $venda02, $venda03, $venda04];
        $resultado = (($vendas[count($vendas) - 1] - $vendas[0]) / $vendas[0]) * 100;

        return $resultado;
    }
}