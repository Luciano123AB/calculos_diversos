<?php

namespace App\Http\Controllers;

use App\Services\ConversaoMoeda;
use App\Services\ConversoresDiversos;
use App\Services\DescontosCupons;
use App\Services\DistanciaGeografica;
use App\Services\Fisicos;
use App\Services\Frete;
use App\Services\GraficosDinamicos;
use App\Services\Imc;
use App\Services\Impostos;
use App\Services\JurosCompostosSimples;
use App\Services\MediasSomasMedianasPercentuais;
use App\Services\ParcelamentoJuros;
use App\Services\Pontuacoes;
use App\Services\PrevisaGanhosPerdas;
use App\Services\RelatoriosDesempenho;
use App\Services\SubtotalTotalCompras;
use App\Services\TaxaConversao;
use App\Services\TaxasPercentuais;
use App\Services\Validacao;
use App\Services\VerificacaoLimitesRegras;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Calculos
{
    public function calcularSubtotalTotalCompras(Request $request): RedirectResponse {
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
        
        session()->flash("resultado", number_format(SubtotalTotalCompras::calcular($request->input("valor"), $request->input("quantidade")), 2, ",", "."));

        return redirect()->back();
    }

    public function calcularDescontosCupons(Request $request): RedirectResponse {
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

        session()->flash(
            [
                "resultado" => number_format(DescontosCupons::calcular($valor, $desconto), 2, ",", "."),
                "desconto" => number_format(DescontosCupons::calcularDesconto($valor, $desconto), 2, ",", ".")
            ]
        );

        return redirect()->back();
    }

    public function calcularFrete(Request $request): RedirectResponse {
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

        session()->flash("resultado", number_format(Frete::calcular($request->input("valor_km"), $request->input("distancia")), 2, ",", "."));

        return redirect()->back();
    }

    public function calcularImpostos(Request $request): RedirectResponse {
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

        session()->flash([
            "imposto" => number_format(Impostos::calcularImposto($valor, $taxa), 2, ",", "."),
            "resultado" => number_format(Impostos::calcular($valor, $taxa), 2, ",", ".")
        ]);

        return redirect()->back();
    }

    public function calcularParcelamentoJuros(Request $request): RedirectResponse {
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

        if ($taxa == 0.0) {
            session()->flash("resultado", number_format(ParcelamentoJuros::calcular($valor, $taxa, $numero_meses), 2, ",", "."));
        } else {
            session()->flash(
                [
                    "resultado" => number_format(ParcelamentoJuros::calcular($valor, $taxa, $numero_meses), 2, ",", "."),
                    "taxa_parcela" => number_format(ParcelamentoJuros::calcularTaxa($valor, $taxa, $numero_meses), 2, ",", ".")
                ]
            );
        }        

        return redirect()->back();
    }

    public function calcularConversaoMoeda(Request $request): RedirectResponse {
        $request->validate(
            [
                "valor" => "required"
            ],

            [
                "valor.required" => "Insira o valor dos produtos."
            ]
        );
        
        $moeda = $request->input("moeda");

        if ($moeda == "Selecione a moeda") {
            return redirect()->back()->withInput()->with("moeda", "Selecione a moeda.");
        }

        $simbolo = "";

        if ($moeda == "Dólar") {
            $simbolo = "$";

            session()->flash("valor_moeda", "5,40");
        }

        if ($moeda == "Euro") {
            $simbolo = "€";

            session()->flash("valor_moeda", "6,27");
        }

        if ($moeda == "Libra") {            
            $simbolo = "£";

            session()->flash("valor_moeda", "7.18");
        }

        if ($moeda == "Iene") {
            $simbolo = "¥";

            session()->flash("valor_moeda", "0.40");
        }

        if ($moeda == "Fraco") {
            $simbolo = "Fr";

            session()->flash("valor_moeda", "6.91");
        }
        
        session()->flash("resultado", "$simbolo " . number_format(ConversaoMoeda::calcular($request->input("valor"), $moeda), 2, ",", "."));

        return redirect()->back();
    }

    public function calcularJurosCompostosSimples(Request $request): RedirectResponse {
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
        
        session()->flash(
            [
                "resultado" => number_format(JurosCompostosSimples::calcular($valor, $juros, $taxa, $tempo), 2, ",", "."),
                "aumento" => number_format(JurosCompostosSimples::calcularAumento($valor, $juros, $taxa, $tempo), 2, ",", ".")
            ]
        );

        return redirect()->back();
    }

    public function calcularTaxasPercentuais(Request $request): RedirectResponse {
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
        
        session()->flash("resultado", number_format(TaxasPercentuais::calcular($request->input("valor"), $request->input("taxa")), 2, ",", "."));

        return redirect()->back();
    }

    public function calcularPrevisaoGanhosPerdas(Request $request): RedirectResponse {
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
        
        session()->flash("resultado", number_format(PrevisaGanhosPerdas::calcular($request->input("receita"), $request->input("despesa")), 2, ",", "."));

        return redirect()->back();
    }

    public function calcularValidacao(Request $request): RedirectResponse {

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

                session()->flash("resultado", Validacao::validarCpf($dado));
            break;

            case "cnpj":
                if (strlen($dado) < 18) {
                    return redirect()->back()->withInput()->withErrors(["dado" => "O CNPJ deve ter 18 dígitos."]);
                }

                session()->flash("resultado", Validacao::validarCnpj($dado));
            break;

            case "idade":
                session()->flash("resultado", Validacao::validarIdade($dado));
            break;
        }

        return redirect()->back();
    }

    public function calcularImc(Request $request): RedirectResponse {
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
        
        session()->flash([
            "resultado" => number_format(Imc::calcular($peso, $altura), 2, "."),
            "classificacao" => Imc::classificar(number_format(Imc::calcular($peso, $altura), 2, "."))
        ]);

        return redirect()->back();
    }

    public function calcularConversoresDiversos(Request $request): RedirectResponse {

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

            session()->flash("resultado", number_format(ConversoresDiversos::calcular($valor, $escolha), 1, ",") . " $simbolo");
        }

        if ($escolha == "Fahrenheit") {            
            $simbolo = "°F";

            session()->flash("resultado", number_format(ConversoresDiversos::calcular($valor, $escolha), 1, ",") . " $simbolo");
        }

        if ($escolha == "Quilômetros") {
            $simbolo = "Km";

            session()->flash("resultado", number_format(ConversoresDiversos::calcular($valor, $escolha), 1, ",") . " $simbolo");
        }

        if ($escolha == "Milhas") {
            $simbolo = "milhas";

            session()->flash("resultado", ConversoresDiversos::calcular($valor, $escolha) . " $simbolo");
        }        

        return redirect()->back();
    }

    public function calcularMediasSomasMedianasPercentuais(Request $request): RedirectResponse {

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

        if (!$media && !$mediana && !$percentual) {
            return redirect()->back()->withInput()->with("escolha", "Escolha um cálculo.");
        }

        if ($media) {

            $errors = [];

            if ($nota01 === "" || $nota01 === null) {
                $errors["nota01"] = "Insira a nota 1.";
            }

            if ($nota02 === "" || $nota02 === null) {
                $errors["nota02"] = "Insira a nota 2.";
            }

            if ($nota03 === "" || $nota03 === null) {
                $errors["nota03"] = "Insira a nota 3.";
            }

            if (!empty($errors)) {
                return redirect()->back()->withInput()->withErrors($errors);
            }

            session()->flash("resultado_media", number_format(MediasSomasMedianasPercentuais::calcularMedia($nota01, $nota02, $nota03), 1, "."));

            return redirect()->back();
        } else if ($mediana) {

            $errors = [];

            if ($numero01 === "" || $numero01 === null) {
                $errors["numero01"] = "Insira a número 1.";
            }

            if ($numero02 === "" || $numero02 === null) {
                $errors["numero02"] = "Insira a número 2.";
            }

            if ($numero03 === "" || $numero03 === null) {
                $errors["numero03"] = "Insira a número 3.";
            }

            if ($numero04 === "" || $numero04 === null) {
                $errors["numero03"] = "Insira a número 3.";
            }

            if (!empty($errors)) {
                return redirect()->back()->withInput()->withErrors($errors);
            }

            session()->flash("resultado_mediana", number_format(MediasSomasMedianasPercentuais::calcularMediana($numero01, $numero02, $numero03, $numero04), 1, ","));

            return redirect()->back();
        }
        
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

        session()->flash("resultado_percentual", number_format(MediasSomasMedianasPercentuais::calcularPercentual($request->input("quantidade"), $request->input("total")), 2, ","));

        return redirect()->back();
    }

    public function exibirGraficosDinamicos(Request $request): RedirectResponse {
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

        session()->flash(
            [
                "permitidos" => $permitidos,
                "negados" => $negados,
                "total" => GraficosDinamicos::calcular($permitidos, $negados)
            ]
        );

        return redirect()->back();
    }

    public function calcularRelatoriosDesempenho(Request $request): RedirectResponse {
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

        session()->flash(
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

    public function calcularTaxaConversao(Request $request): RedirectResponse {
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

        session()->flash("resultado", number_format(TaxaConversao::calcular($request->input("numero_conversoes"), $request->input("numero_visitas")), 2, ","));

        return redirect()->back();
    }

    public function calcularPontuacoes(Request $request): RedirectResponse {
        $request->validate(
            [
                "acertos" => "required",
                "total_questoes" => "required"
            ],

            [
                "acertos.required" => "Insira o n/acertos.",
                "total_questoes.required" => "Insira o t/questões."
            ]
        );

        session()->flash(
            [
                "pontos" => number_format(Pontuacoes::calcularPontos($request->input("acertos")), 1, ","),
                "total" => number_format(Pontuacoes::calcularTotal($request->input("total_questoes")), 1, ",")
            ]
        );

        return redirect()->back();
    }

    public function calcularVerificacaoLimitesRegras(Request $request): RedirectResponse {
        $request->validate(
            [
                "idade" => "required",
                "renda" => "required"
            ],

            [
                "idade.required" => "Insira a idade.",
                "renda.required" => "Insira a renda."
            ]
        );

        session()->flash("resultado", VerificacaoLimitesRegras::calcular($request->input("idade"), $request->input("renda")));

        return redirect()->back();
    }

    public function calcularDistanciaGeografica(Request $request): RedirectResponse {
        $request->validate(
            [
                "latitude01" => "required",
                "longitude01" => "required",
                "latitude02" => "required",
                "longitude02" => "required"
            ],

            [
                "latitude01.required" => "Insira a latitude 1.",
                "longitude01.required" => "Insira a longitude 1.",
                "latitude02.required" => "Insira a latitude 2.",
                "longitude02.required" => "Insira a longitude 2."
            ]
        );

        session()->flash("resultado", number_format(DistanciaGeografica::calcular($request->input("latitude01"), $request->input("longitude01"), $request->input("latitude02"), $request->input("longitude02")), 2, ",", "."));

        return redirect()->back();
    }

    public function calcularFisicos(Request $request): RedirectResponse {

        $consumo = $request->boolean("consumo");
        $eficiencia = $request->boolean("eficiencia");
        $quantidade = $request->input("quantidade");
        $tempo = $request->input("tempo");
        $distancia = $request->input("distancia");
        $litros = $request->input("litros");

        if (!$consumo && !$eficiencia) {
            return redirect()->back()->withInput()->with("escolha", "Escolha um cálculo.");
        } else if ($consumo) {
            
            $errors = [];

            if ($quantidade === "" || $quantidade === null) {                
                $errors["quantidade"] = "Insira a quantidade.";            
            }

            if ($tempo === "" || $tempo === null) {                
                $errors["tempo"] = "Insira o tempo.";                
            }

            if (!empty($errors)) {
                return redirect()->back()->withErrors($errors);                
            }

            session()->flash("consumo", Fisicos::calcularConsumo($quantidade, $tempo));
        } else if ($eficiencia) {
            
            $errors = [];

            if ($distancia === "" || $distancia === null) {                
                $errors["distancia"] = "Insira a distância.";
            }
            
            if ($litros === "" || $distancia === null) {                
                $errors["litros"] = "Insira os litros.";
            }

            if (!empty($errors)) {
                return redirect()->back()->withErrors($errors);
            }

            session()->flash("eficiencia", number_format(Fisicos::calcularEficiencia($distancia, $litros), 2, ",", "."));
        }

        return redirect()->back();
    }
}
