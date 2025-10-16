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
        echo "Validacao";
    }

    public function imc() {
        echo "IMC";
    }

    public function conversoresDiversos() {
        echo "Conversores Diversos";
    }

    public function mediasSomasMedianasPercentuais() {
        echo "Medias Somas Medianas Percentuais";
    }

    public function graficosDinamicos() {
        echo "Graficos Dinamicos";
    }

    public function relatoriosDesempenho() {
        echo "Relatorios Desempenho";
    }

    public function TaxaConversao() {
        echo "Taxa Conversao";
    }

    public function comparacoesValores() {
        echo "Comparacoes Valores";
    }

    public function pontuacoes() {
        echo "Pontuacoes";
    }

    public function verificacaoLimitesRegras() {
        echo "Verificacao Limites Regras";
    }

    public function distanciaGeografica() {
        echo "Distancia Geografica";
    }

    public function tempoExecusaoCronometros() {
        echo "Tempo Execusao Cronometros";
    }

    public function fisicos() {
        echo "Fisicos";
    }

    public function algoritmosRecomendacaoRanqueamento() {
        echo "Algoritmos Recomendacao Ranqueamento";
    }
}
