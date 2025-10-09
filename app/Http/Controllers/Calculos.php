<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Calculos
{
    public function calcularSubtotalTotalCompras(Request $request) {
        $request->validate(
            [
                "valor01" => "required",
                "valor02" => "required"
            ],

            [
                "valor01.required" => "Insira o valor 1.",
                "valor02.required" => "Insira o valor 2."
            ]
        );
        
        $valor01 = $request->input("valor01");
        $valor02 = $request->input("valor02");
        $resultado = $valor01 . $valor02;

        session(["resultado" => $resultado]);

        return redirect()->back();
    }
}
