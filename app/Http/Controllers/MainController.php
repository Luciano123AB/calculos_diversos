<?php

namespace App\Http\Controllers;

use App\Services\Boot;

class MainController
{
    public function index(): View {
        if (!is_dir(base_path("node_modules"))) {
            Boot::dependencias();
        }

        return view("index");
    }

    public function subtotalTotalCompras(): View {
        return view("subtotal_total_compras")->with("textos",
            [
                "h2" => "Subtotal e Total",
                "span" => "de Compras",
                "h5" => "o total"
            ]
        );
    }

    public function descontosCupons(): View {
        return view("descontos_cupons")->with("textos",
            [
                "h2" => "Descontos e",
                "span" => "Cupons",
                "h5" => "o desconto"
            ]
        );
    }

    public function frete(): View {
        return view("frete")->with("textos",
            [
                "h2" => "Descobrir",
                "span" => "Frete",
                "h5" => "o frete"
            ]
        );
    }

    public function impostos(): View {
        return view("impostos")->with("textos",
            [
                "h2" => "Calcular",
                "span" => "Impostos",
                "h5" => "o imposto"
            ]
        );
    }

    public function parcelamentoJuros(): View {
        return view("parcelamento_juros")->with("textos",
            [
                "h2" => "Parcelamento e",
                "span" => "Juros",
                "h5" => "a parcela"
            ]
        );
    }

    public function conversaoMoeda(): View {
        return view("conversao_moeda")->with("textos",
            [
                "h2" => "Conversão de",
                "span" => "Moeda",
                "h5" => "o valor"
            ]
        );
    }

    public function jurosCompostosSimples(): View {
        return view("juros_compostos_simples")->with("textos",
            [
                "h2" => "Juros",
                "span" => "Compostos e Simples",
                "h5" => "o total"
            ]
        );
    }

    public function taxasPercentuais(): View {
        return view("taxas_Percentuais")->with("textos",
            [
                "h2" => "Taxas e",
                "span" => "Percentuais",
                "h5" => "o total"
            ]
        );
    }

    public function previsaoGanhosPerdas(): View {
        return view("previsao_ganhos_perdas")->with("textos",
            [
                "h2" => "Previsão de",
                "span" => "Ganhos e Perdas",
                "h5" => "o total"
            ]
        );
    }

    public function validacao(): View {
        return view("validacao")->with("textos",
            [
                "h2" => "Validar",
                "span" => "Dados",
                "h5" => "o resultado"
            ]
        );
    }

    public function imc(): View {
        return view("imc")->with("textos",
            [
                "h2" => "Descobrir o",
                "span" => "IMC",
                "h5" => "o imc"
            ]
        );
    }

    public function conversoresDiversos(): View {
        return view("conversores_diversos")->with("textos",
            [
                "h2" => "Conversores",
                "span" => "Diversos",
                "h5" => "o valor"
            ]
        );
    }

    public function mediasSomasMedianasPercentuais(): View {
        return view("medias_somas_medianas_percentuais")->with("textos",
            [
                "h2" => "Medias | Somas",
                "span" => "Medianas | Percentuais",
                "h5" => "o resultado"
            ]
        );
    }

    public function graficosDinamicos(): View {
        return view("graficos_dinamicos")->with("textos",
            [
                "h2" => "Gráficos",
                "span" => "Dinâmicos",
                "h5" => "o resultado"
            ]
        );
    }

    public function relatoriosDesempenho(): View {
        return view("relatorios_desempenho")->with("textos",
            [
                "h2" => "Relatórios e",
                "span" => "Desempenho",
                "h5" => "o resultado"
            ]
        );
    }

    public function TaxaConversao(): View {
        return view("taxa_conversao")->with("textos",
            [
                "h2" => "Taxa de",
                "span" => "Conversão",
                "h5" => "o resultado"
            ]
        );
    }

    public function pontuacoes(): View {
        return view("pontuacoes")->with("textos",
            [
                "h2" => "Obter a",
                "span" => "Pontuação",
                "h5" => "o total"
            ]
        );
    }

    public function verificacaoLimitesRegras(): View {
        return view("verificacao_limites_regras")->with("textos",
            [
                "h2" => "Verificação de",
                "span" => "Limites e Regras",
                "h5" => "o resultado"
            ]
        );
    }

    public function distanciaGeografica(): View {
        return view("distancia_geografica")->with("textos",
            [
                "h2" => "Distância",
                "span" => "Geográfica",
                "h5" => "o resultado"
            ]
        );
    }

    public function fisicos(): View {
        return view("fisicos")->with("textos",
            [
                "h2" => "Cálculos",
                "span" => "Físicos",
                "h5" => "o consumo"
            ]
        );
    }
}
