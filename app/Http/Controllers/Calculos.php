<?php

namespace App\Http\Controllers;

use App\Services\ConversaoMoeda;
use App\Services\ConversoresDiversos;
use App\Services\DescontosCupons;
use App\Services\Frete;
use App\Services\GraficosDinamicos;
use App\Services\Imc;
use App\Services\Impostos;
use App\Services\JurosCompostosSimples;
use App\Services\MediasSomasMedianasPercentuais;
use App\Services\ParcelamentoJuros;
use App\Services\PrevisaGanhosPerdas;
use App\Services\RelatoriosDesempenho;
use App\Services\SubtotalTotalCompras;
use App\Services\TaxaConversao;
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

    public function calcularConversoresDiversos(Request $request) {

        $escolha = $request->input("escolha");

        if ($escolha == "Selecione o conversor") {
            return redirect()->back()->withInput()->withErrors(["escolha" => "Selecione primeiro o conversor."]);
        }

        $request->validate(
            [
                "valor" => "required"
            ],

            [
                "valor.required" => "Insira o valor."
            ]
        );

        $valor = $request->input("valor");
        $simbolo = "";

        if ($escolha == "Celsius") {

            $simbolo = "°C";

            session(["resultado" => number_format(ConversoresDiversos::calcular($valor, $escolha), 1, ",") . " $simbolo"]);
        }

        if ($escolha == "Fahrenheit") {
            
            $simbolo = "°F";

            session(["resultado" => number_format(ConversoresDiversos::calcular($valor, $escolha), 1, ",") . " $simbolo"]);
        }

        if ($escolha == "Quilômetros") {

            $simbolo = "Km";

            session(["resultado" => number_format(ConversoresDiversos::calcular($valor, $escolha), 1, ",") . " $simbolo"]);
        }

        if ($escolha == "Milhas") {

            $simbolo = "milhas";

            session(["resultado" => ConversoresDiversos::calcular($valor, $escolha) . " $simbolo"]);
        }        

        return redirect()->back();
    }

    public function calcularMediasSomasMedianasPercentuais(Request $request) {

        $media = $request->boolean("media");
        $mediana = $request->boolean("mediana");
        $percentual = $request->boolean("percentual");
        $nota01 = $request->input("nota01");
        $nota02 = $request->input("nota02");
        $nota03 = $request->input("nota03");
        $numero01 = $request->input("numero01");
        $numero02 = $request->input("numero02");
        $numero03 = $request->input("numero03");
        $numero04 = $request->input("numero04");
        $quantidade = $request->input("quantidade");
        $total = $request->input("total");

        if (!$media && !$mediana && !$percentual) {
            return redirect()->back()->withInput()->with("escolha", "Escolha um cálculo.");
        } else {
            if ($media) {
    
                $errors = [];
    
                if ($nota01 === "" || $nota01 === null) {
                    $errors['nota01'] = "Insira a nota 1.";
                }
    
                if ($nota02 === "" || $nota02 === null) {
                    $errors['nota02'] = "Insira a nota 2.";
                }
    
                if ($nota03 === "" || $nota03 === null) {
                    $errors['nota03'] = "Insira a nota 3.";
                }
    
                if (!empty($errors)) {
                    return redirect()->back()->withInput()->withErrors($errors);
                }
    
                session(["resultado_media" => number_format(MediasSomasMedianasPercentuais::calcularMedia($nota01, $nota02, $nota03), 1, ".")]);
    
                return redirect()->back();
            } else if ($mediana) {

                $errors = [];
    
                if ($numero01 === "" || $numero01 === null) {
                    $errors['numero01'] = "Insira a número 1.";
                }
    
                if ($numero02 === "" || $numero02 === null) {
                    $errors['numero02'] = "Insira a número 2.";
                }
    
                if ($numero03 === "" || $numero03 === null) {
                    $errors['numero03'] = "Insira a número 3.";
                }

                if ($numero04 === "" || $numero04 === null) {
                    $errors['numero03'] = "Insira a número 3.";
                }
    
                if (!empty($errors)) {
                    return redirect()->back()->withInput()->withErrors($errors);
                }
    
                session(["resultado_mediana" => number_format(MediasSomasMedianasPercentuais::calcularMediana($numero01, $numero02, $numero03, $numero04), 1, ",")]);
    
                return redirect()->back();
            } else if ($percentual) {
                $request->validate(
                    [
                        "quantidade" => "required",
                        "total" => "required"
                    ],
    
                    [
                        "quantidade.required" => "Insira a quantidade.",
                        "total.required" => "Insira o total."
                    ]
                );
    
                session(["resultado_percentual" => number_format(MediasSomasMedianasPercentuais::calcularPercentual($quantidade, $total), 2, ",")]);
    
                return redirect()->back();
            }
        }
    }

    public function exibirGraficosDinamicos(Request $request) {
        $request->validate(
            [
                "permitidos" => "required",
                "negados" => "required"
            ],

            [
                "permitidos.required" => "Insira os permitidos.",
                "negados.required" => "Insira os negados."
            ]
        );

        $permitidos = $request->input("permitidos");
        $negados = $request->input("negados");

        session(
            [
                "permitidos" => $permitidos,
                "negados" => $negados,
                "total" => GraficosDinamicos::calcular($permitidos, $negados)
            ]
        );

        return redirect()->back();
    }

    public function calcularRelatoriosDesempenho(Request $request) {
        $request->validate(
            [
                "venda01" => "required",
                "venda02" => "required",
                "venda03" => "required",
                "venda04" => "required"
            ],

            [
                "venda01.required" => "Insira a venda 1.",
                "venda02.required" => "Insira a venda 2.",
                "venda03.required" => "Insira a venda 3.",
                "venda04.required" => "Insira a venda 4."
            ]
        );

        $venda01 = $request->input("venda01");
        $venda02 = $request->input("venda02");
        $venda03 = $request->input("venda03");
        $venda04 = $request->input("venda04");

        session(
            [
                "total" => number_format(RelatoriosDesempenho::calcularTotal($venda01, $venda02, $venda03, $venda04), 2, ","),
                "media" => number_format(RelatoriosDesempenho::calcularMedia($venda01, $venda02, $venda03, $venda04), 2, ","),
                "melhor" => number_format(RelatoriosDesempenho::calcularMelhor($venda01, $venda02, $venda03, $venda04), 2, ","),
                "pior" => number_format(RelatoriosDesempenho::calcularPior($venda01, $venda02, $venda03, $venda04), 2, ","),
                "taxa" => number_format(RelatoriosDesempenho::calcularTaxa($venda01, $venda02, $venda03, $venda04), 2, ",")
            ]
        );

        return redirect()->back();
    }

    public function calcularTaxaConversao(Request $request) {
        $request->validate(
            [
                "numero_conversoes" => "required",
                "numero_visitas" => "required"
            ],

            [
                "numero_conversoes.required" => "Insira o n/conversões.",
                "numero_visitas.required" => "Insira o n/visitas."
            ]
        );

        $numero_conversoes = $request->input("numero_conversoes");
        $numero_visitas = $request->input("numero_visitas");

        session(["resultado" => number_format(TaxaConversao::calcular($numero_conversoes, $numero_visitas), 2, ",")]);

        return redirect()->back();
    }
}
