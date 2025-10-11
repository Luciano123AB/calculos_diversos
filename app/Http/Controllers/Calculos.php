<?php

namespace App\Http\Controllers;

use App\Services\DescontosCupons;
use App\Services\Frete;
use App\Services\Impostos;
use App\Services\ParcelamentoJuros;
use App\Services\SubtotalTotalCompras;
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
        
        $valor = $request->input("valor");
        $quantidade = $request->input("quantidade");
        
        session(["resultado" => number_format(SubtotalTotalCompras::calcular($valor, $quantidade), 2, ",", ".")]);

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
        
        $valor = $request->input("valor");
        $desconto = $request->input("desconto");

        session(["resultado" => number_format(DescontosCupons::calcular($valor, $desconto), 2, ",", ".")]);

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
        
        $valor_km = $request->input("valor_km");
        $distancia = $request->input("distancia");

        session(["resultado" => number_format(Frete::calcular($valor_km, $distancia), 2, ",", ".")]);

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
        
        $valor = $request->input("valor");
        $taxa = $request->input("taxa");

        session(["imposto" => number_format(Impostos::calcularImposto($valor, $taxa), 2, ",", ".")]);
        session(["resultado" => number_format(Impostos::calcular($valor, $taxa), 2, ",", ".")]);

        return redirect()->back();
    }

    public function calcularParcelamentoJuros(Request $request) {
        $request->validate(
            [
                "valor" => "required",
                "numero_meses" => "required"
            ],

            [
                "valor.required" => "Insira o valor.",
                "numero_meses.required" => "Insira o número de meses."
            ]
        );
        
        $valor = $request->input("valor");
        $taxa = $request->input("taxa", 0.0);
        $numero_meses = $request->input("numero_meses");

        if ($taxa == "") {
            return redirect()->back()->withInput()->with("taxa", "Insira a taxa.");
        }

        session(["resultado" => number_format(ParcelamentoJuros::calcular($valor, $taxa, $numero_meses), 2, ",", ".")]);

        return redirect()->back();
    }
}
