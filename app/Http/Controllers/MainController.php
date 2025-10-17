<?php

namespace App\Http\Controllers;

use App\Services\Boot;

class MainController
{
    public function index() {
        if (!is_dir(base_path("node_modules"))) {
            Boot::dependencias();
        }

        return view("index");
    }

    public function subtotalTotalCompras() {
        return view("subtotal_total_compras")->with("textos",
            [
                "h2" => "Subtotal e Total",
                "span" => "de Compras",
                "h5" => "o total"
            ]
        );
    }

    public function descontosCupons() {
        return view("descontos_cupons")->with("textos",
            [
                "h2" => "Descontos e",
                "span" => "Cupons",
                "h5" => "o desconto"
            ]
        );
    }

    public function frete() {
        return view("frete")->with("textos",
            [
                "h2" => "Descobrir",
                "span" => "Frete",
                "h5" => "o frete"
            ]
        );
    }

    public function impostos() {
        return view("impostos")->with("textos",
            [
                "h2" => "Calcular",
                "span" => "Impostos",
                "h5" => "o imposto"
            ]
        );
    }

    public function parcelamentoJuros() {
        return view("parcelamento_juros")->with("textos",
            [
                "h2" => "Parcelamento e",
                "span" => "Juros",
                "h5" => "a parcela"
            ]
        );
    }

    public function conversaoMoeda() {
        return view("conversao_moeda")->with("textos",
            [
                "h2" => "Conversão de",
                "span" => "Moeda",
                "h5" => "o valor"
            ]
        );
    }

    public function jurosCompostosSimples() {
        return view("juros_compostos_simples")->with("textos",
            [
                "h2" => "Juros",
                "span" => "Compostos e Simples",
                "h5" => "o total"
            ]
        );
    }

    public function taxasPercentuais() {
        return view("taxas_Percentuais")->with("textos",
            [
                "h2" => "Taxas e",
                "span" => "Percentuais",
                "h5" => "o total"
            ]
        );
    }

    public function previsaoGanhosPerdas() {
        return view("previsao_ganhos_perdas")->with("textos",
            [
                "h2" => "Previsão de",
                "span" => "Ganhos e Perdas",
                "h5" => "o total"
            ]
        );
    }

    public function validacao() {
        return view("validacao")->with("textos",
            [
                "h2" => "Aplicar a",
                "span" => "Validação",
                "h5" => "a validação"
            ]
        );
    }

    public function imc() {
        return view("imc")->with("textos",
            [
                "h2" => "Descobrir o",
                "span" => "IMC",
                "h5" => "o imc"
            ]
        );
    }

    public function conversoresDiversos() {
        return view("conversores_diversos")->with("textos",
            [
                "h2" => "Conversores",
                "span" => "Diversos",
                "h5" => "o valor"
            ]
        );
    }

    public function mediasSomasMedianasPercentuais() {
        return view("medias_somas_medianas_percentuais")->with("textos",
            [
                "h2" => "Medias | Somas",
                "span" => "Medianas | Percentuais",
                "h5" => "o total"
            ]
        );
    }

    public function graficosDinamicos() {
        return view("graficos_dinamicos")->with("textos",
            [
                "h2" => "Gráficos",
                "span" => "Dinâmicos",
                "h5" => "o resultado"
            ]
        );
    }

    public function relatoriosDesempenho() {
        return view("relatorios_desempenho")->with("textos",
            [
                "h2" => "Relatórios e",
                "span" => "Desempenho",
                "h5" => "o resultado"
            ]
        );
    }

    public function TaxaConversao() {
        return view("taxa_conversao")->with("textos",
            [
                "h2" => "Taxa de",
                "span" => "Conversão",
                "h5" => "o total"
            ]
        );
    }

    public function comparacoesValores() {
        return view("comparacoes_valores")->with("textos",
            [
                "h2" => "Comparações de",
                "span" => "Valores",
                "h5" => "o resultado"
            ]
        );
    }

    public function pontuacoes() {
        return view("pontuacoes")->with("textos",
            [
                "h2" => "Obter a",
                "span" => "Pontuação",
                "h5" => "o total"
            ]
        );
    }

    public function verificacaoLimitesRegras() {
        return view("verificacao_limites_regras")->with("textos",
            [
                "h2" => "Verificação de",
                "span" => "Limites e Regras",
                "h5" => "o resultado"
            ]
        );
    }

    public function distanciaGeografica() {
        return view("distancia_geografica")->with("textos",
            [
                "h2" => "Distância",
                "span" => "Geográfica",
                "h5" => "o resultado"
            ]
        );
    }

    public function tempoExecusaoCronometros() {
        return view("tempo_execusao_cronometros")->with("textos",
            [
                "h2" => "Tempo de Execução",
                "span" => "e Cronômetros",
                "h5" => "o tempo"
            ]
        );
    }

    public function fisicos() {
        return view("fisicos")->with("textos",
            [
                "h2" => "Cálculos",
                "span" => "Físicos",
                "h5" => "o consumo"
            ]
        );
    }

    public function algoritmosRecomendacaoRanqueamento() {
        return view("algoritmos_recomendacao_ranqueamento")->with("textos",
            [
                "h2" => "Algoritmos de Recomendação",
                "span" => "e Ranqueamento",
                "h5" => "o resultado"
            ]
        );
    }
}
