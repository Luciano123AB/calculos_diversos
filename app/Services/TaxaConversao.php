<?php

namespace App\Services;

class TaxaConversao
{
    public static function calcular($numero_conversoes, $numero_visitas) {

        $resultado = ($numero_conversoes / $numero_visitas) * 100;

        return $resultado;
    }
}