<?php

namespace App\Http\Controllers;

use App\Services\Boot;

class MainController
{
    public function index() {
        if (is_dir(base_path("node_modules"))) {
            Boot::dependencias();
        }

        return view("index");
    }

    public function subtotalTotalCompras() {
        echo "Subtotal Total Compras";
    }

    public function descontosCupons() {
        echo "Descontos Cupons";
    }

    public function frete() {
        echo "Frete";
    }

    public function impostos() {
        echo "Impostos";
    }

    public function parcelamentoJuros() {
        echo "Parcelamento Juros";
    }

    public function conversaoMoeda() {
        echo "Conversao Moeda";
    }

    public function jurosCompostosSimples() {
        echo "Juros Compostos Simples";
    }

    public function taxasPercentuais() {
        echo "Taxas Percentuais";
    }

    public function previsaoGanhosPerdas() {
        echo "Previsao Ganhos Perdas";
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
