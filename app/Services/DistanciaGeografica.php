<?php

namespace App\Services;

class DistanciaGeografica
{
    public static function calcular($latitude01, $longitude01, $latitude02, $longitude02) {

        $raio_terra = 6371;
        $latitude01 = deg2rad($latitude01);
        $longitude01 = deg2rad($longitude01);
        $latitude02 = deg2rad($latitude02);
        $longitude02 = deg2rad($longitude02);
        $deltaLatitude = $latitude02 - $latitude01;
        $deltaLongitude = $longitude02 - $longitude01;
        
        $a = sin($deltaLatitude / 2) ** 2 +
            cos($latitude01) * cos($latitude02) * sin($deltaLongitude / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $resultado = $raio_terra * $c;

        return $resultado;
    }
}