<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Calculos
{
    public function calcularSubtotalTotalCompras(Request $request) {
        $request->validate(
            [
                "valor" => "required",
                "quantidade" => "required"
            ],

            [
                "valor.required" => "Insira o valor dos produtos.",
                "quantidade.required" => "Insira a quantidade desejada."
            ]
        );
        
        $valor = floatval($request->input("valor"));
        $quantidade = intval($request->input("quantidade"));
        $total = $valor * $quantidade;

        session(["resultado" => number_format($total, 2, ",", ".")]);

        return redirect()->back();
    }

    public function calcularDescontosCupons(Request $request) {
        $request->validate(
            [
                "valor" => "required",
                "desconto" => "required"
            ],

            [
                "valor.required" => "Insira o valor do produto.",
                "desconto.required" => "Insira o desconto aplicado."
            ]
        );
        
        $valor = floatval($request->input("valor"));
        $desconto = intval($request->input("desconto"));
        $total = $valor - ($valor * $desconto / 100);

        session(["resultado" => number_format($total, 2, ",", ".")]);

        return redirect()->back();
    }
}
