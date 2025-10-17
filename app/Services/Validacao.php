<?php

namespace App\Services;

class Validacao
{
    public static function validarCpf($dado) {
        
        $dado = preg_replace('/\D/', '', $dado);
        $resultado = "";

        if (strlen($dado) != 11) {
            return false;
        }

        if (preg_match('/^(\d)\1{10}$/', $dado)) {
            return false;
        }

        $dado_array = str_split($dado);
        $soma1 = 0;

        for ($i = 0; $i < 9; $i++) {
            $soma1 += $dado_array[$i] * (10 - $i);
        }

        $resto1 = $soma1 % 11;
        $digito1 = $resto1 < 2 ? 0 : 11 - $resto1;
        $soma2 = 0;

        for ($i = 0; $i < 10; $i++) {
            $soma2 += $dado_array[$i] * (11 - $i);
        }

        $resto2 = $soma2 % 11;
        $digito2 = $resto2 < 2 ? 0 : 11 - $resto2;

        if ($dado_array[9] == $digito1 && $dado_array[10] == $digito2) {

            $resultado = "CPF Válido";

            return $resultado;
        } else {

            $resultado = "CPF Inválido";

            return $resultado;
        }
    }

    public static function validarCnpj($dado) {

        $dado = preg_replace('/\D/', '', $dado);
        $resultado = "";

        if (strlen($dado) != 14 || preg_match('/(\d)\1{13}/', $dado)) {
            return false;
        } else {
            for ($t = 12; $t < 14; $t++) {
    
                $d = 0;
    
                for ($m = $t - 7, $i = 0; $i < $t; $i++) {
                    $d += $dado[$i] * $m--;
                    if ($m < 2) $m = 9;
                }
    
                $d = ((10 * $d) % 11) % 10;
    
                if ($dado[$i] != $d) {

                    $resultado = "CNPJ Inválido";

                    return $resultado;
                } else {

                    $resultado = "CNPJ Válido";

                    return $resultado;
                }
            }
        }
    }

    public static function validarIdade($dado) {

        $resultado = "";

        if ($dado >= 18) {

            $resultado = "Maior de idade";

            return $resultado;
        } else {

            $resultado = "Menor de idade";

            return $resultado;
        }
    }
}