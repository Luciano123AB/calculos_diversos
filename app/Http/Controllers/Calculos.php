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

    public function calcularFrete(Request $request) {
        $request->validate(
            [
                "valor_km" => "required",
                "distancia" => "required"
            ],

            [
                "valor_km.required" => "Insira o valor por Km.",
                "distancia.required" => "Insira a distância."
            ]
        );
        
        $valor_km = floatval($request->input("valor_km"));
        $distancia = intval($request->input("distancia"));
        $total = $valor_km * $distancia;

        session(["resultado" => number_format($total, 2, ",", ".")]);

        return redirect()->back();
    }

    public function calcularImpostos(Request $request) {
        $request->validate(
            [
                "valor" => "required",
                "taxa" => "required"
            ],

            [
                "valor.required" => "Insira o valor.",
                "taxa.required" => "Insira a taxa de imposto."
            ]
        );
        
        $valor = floatval($request->input("valor"));
        $taxa = intval($request->input("taxa"));
        $imposto = $valor * ($taxa / 100);
        $valor_final = $valor * $imposto;

        session(["imposto" => number_format($imposto, 2, ",", ".")]);
        session(["resultado" => number_format($valor_final, 2, ",", ".")]);

        return redirect()->back();
    }
}
