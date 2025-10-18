<?php

namespace App\Http\Controllers;

use App\Services\ConversaoMoeda;
use App\Services\DescontosCupons;
use App\Services\Frete;
use App\Services\Imc;
use App\Services\Impostos;
use App\Services\JurosCompostosSimples;
use App\Services\ParcelamentoJuros;
use App\Services\PrevisaGanhosPerdas;
use App\Services\SubtotalTotalCompras;
use App\Services\TaxasPercentuais;
use App\Services\Validacao;
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

    public function calcularConversaoMoeda(Request $request) {
        $request->validate(
            [
                "valor" => "required"
            ],

            [
                "valor.required" => "Insira o valor dos produtos."
            ]
        );
        
        $valor = $request->input("valor");
        $moeda = $request->input("moeda");

        if ($moeda == "Selecione a moeda") {
            return redirect()->back()->withInput()->with("moeda", "Selecione a moeda.");
        }

        $simbolo = "";

        if ($moeda == "Dólar") {
            $simbolo = "$";
        }

        if ($moeda == "Euro") {
            $simbolo = "€";
        }

        if ($moeda == "Libra") {
            $simbolo = "£";
        }

        if ($moeda == "Iene") {
            $simbolo = "¥";
        }

        if ($moeda == "Fraco") {
            $simbolo = "Fr";
        }
        
        session(["resultado" => "$simbolo " . number_format(ConversaoMoeda::calcular($valor, $moeda), 2, ",", ".")]);

        return redirect()->back();
    }

    public function calcularJurosCompostosSimples(Request $request) {
        $request->validate(
            [
                "valor" => "required",
                "juros" => "required",
                "taxa" => "required",
                "tempo" => "required"
            ],

            [
                "valor.required" => "Insira o valor dos produtos.",
                "juros.required" => "Selecione o tipo de juros.",
                "taxa.required" => "Insira a taxa.",
                "tempo.required" => "Insira o tempo."
            ]
        );
        
        $valor = $request->input("valor");
        $juros = $request->input("juros");
        $taxa = $request->input("taxa");
        $tempo = $request->input("tempo");

        if ($juros == "Selecione o juros") {
            return redirect()->back()->withInput()->with("juros", "Selecione o tipo de juros.");
        }
        
        session(["resultado" => number_format(JurosCompostosSimples::calcular($valor, $juros, $taxa, $tempo), 2, ",", ".")]);

        return redirect()->back();
    }

    public function calcularTaxasPercentuais(Request $request) {
        $request->validate(
            [
                "valor" => "required",
                "taxa" => "required"
            ],

            [
                "valor.required" => "Insira o valor.",
                "taxa.required" => "Insira a taxa."
            ]
        );

        $valor = $request->input("valor");
        $taxa = $request->input("taxa");
        
        session(["resultado" => number_format(TaxasPercentuais::calcular($valor, $taxa), 2, ",", ".")]);

        return redirect()->back();
    }

    public function calcularPrevisaoGanhosPerdas(Request $request) {
        $request->validate(
            [
                "receita" => "required",
                "despesa" => "required"
            ],

            [
                "receita.required" => "Insira a receita.",
                "despesa.required" => "Insira a despesa."
            ]
        );

        $receita = $request->input("receita");
        $despesa = $request->input("despesa");
        
        session(["resultado" => number_format(PrevisaGanhosPerdas::calcular($receita, $despesa), 2, ",", ".")]);

        return redirect()->back();
    }

    public function calcularValidacao(Request $request) {

        $tipo = $request->input("dados");

        if ($tipo === "Selecione o dado") {
            return redirect()->back()->withInput()->withErrors(["dado" => "Selecione primeiro o tipo de dado."]);
        }

        $request->validate(
            [
                "dado" => "required"
            ],

            [
                "dado.required" => "Insira o dado."
            ]
        );

        $dado = trim($request->input("dado"));

        switch ($tipo) {
            case "cpf":
                if (strlen($dado) < 14) {
                    return redirect()->back()->withInput()->withErrors(["dado" => "O CPF deve ter 14 dígitos."]);
                }

                session(["resultado" => Validacao::validarCpf($dado)]);
            break;

            case "cnpj":
                if (strlen($dado) < 18) {
                    return redirect()->back()->withInput()->withErrors(["dado" => "O CNPJ deve ter 18 dígitos."]);
                }

                session(["resultado" => Validacao::validarCnpj($dado)]);
            break;

            case "idade":
                session(["resultado" => Validacao::validarIdade($dado)]);
            break;
        }

        return redirect()->back();
    }

    public function calcularImc(Request $request) {
        $request->validate(
            [
                "peso" => "required",
                "altura" => "required"
            ],

            [
                "peso.required" => "Insira o peso.",
                "altura.required" => "Insira a altura."
            ]
        );

        $peso = $request->input("peso");
        $altura = $request->input("altura");
        
        session(["resultado" => number_format(Imc::calcular($peso, $altura), 2, ".")]);
        session(["classificacao" => Imc::classificar(number_format(Imc::calcular($peso, $altura), 2, "."))]);

        return redirect()->back();
    }
}
