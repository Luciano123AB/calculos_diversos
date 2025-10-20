<?php

namespace App\Services;

class VerificacaoLimitesRegras
{
    public static function calcular($idade, $renda) {
        if ($idade >= 18 && $renda >= 2000) {

            $resultado = "APROVADO";

        } else {

            $resultado = "REPROVADO";

        }

        return $resultado;
    }
}