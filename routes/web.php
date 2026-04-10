<?php

use App\Http\Controllers\Calculos;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::prefix("/")->group(function () {
    Route::controller(MainController::class)->group(function() {
        Route::get("", "index")->name("index");

        Route::get("subtotal_total_compras", "subtotalTotalCompras")->name("SubtotalTotalCompras");

        Route::get("descontos_cupons", "descontosCupons")->name("DescontosCupons");

        Route::get("frete", "frete")->name("Frete");

        Route::get("impostos", "impostos")->name("Impostos");

        Route::get("parcelamento_juros", "parcelamentoJuros")->name("ParcelamentoJuros");

        Route::get("conversao_moeda", "conversaoMoeda")->name("ConversaoMoeda");

        Route::get("juros_compostos_simples", "jurosCompostosSimples")->name("JurosCompostosSimples");

        Route::get("taxas_percentuais", "taxasPercentuais")->name("TaxasPercentuais");

        Route::get("previsao_ganhos_perdas", "previsaoGanhosPerdas")->name("PrevisaoGanhosPerdas");

        Route::get("validacao", "validacao")->name("Validacao");

        Route::get("imc", "imc")->name("Imc");

        Route::get("conversores_diversos", "conversoresDiversos")->name("ConversoresDiversos");

        Route::get("medias_somas_medianas_percentuais", "mediasSomasMedianasPercentuais")->name("MediasSomasMedianasPercentuais");

        Route::get("graficos_dinamicos", "graficosDinamicos")->name("GraficosDinamicos");

        Route::get("relatorios_desempenho", "relatoriosDesempenho")->name("RelatoriosDesempenho");

        Route::get("taxa_conversao", "taxaConversao")->name("TaxaConversao");

        Route::get("pontuacoes", "pontuacoes")->name("Pontuacoes");

        Route::get("verificacao_limites_regras", "verificacaoLimitesRegras")->name("VerificacaoLimitesRegras");

        Route::get("distancia_geografica", "distanciaGeografica")->name("DistanciaGeografica");

        Route::get("fisicos", "fisicos")->name("Fisicos");
    });

    Route::controller(Calculos::class)->group(function() {
        Route::post("calcular_subtotal_total_compras", "calcularSubtotalTotalCompras")->name("CalcularSubtotalTotalCompras");

        Route::post("calcular_descontos_cupons", "calcularDescontosCupons")->name("CalcularDescontosCupons");

        Route::post("calcular_frete", "calcularFrete")->name("CalcularFrete");

        Route::post("calcular_impostos", "calcularImpostos")->name("CalcularImpostos");

        Route::post("calcular_parcelamento_juros", "calcularParcelamentoJuros")->name("CalcularParcelamentoJuros");

        Route::post("calcular_conversao_moeda", "calcularConversaoMoeda")->name("CalcularConversaoMoeda");

        Route::post("calcular_juros_compostos_simples", "calcularJurosCompostosSimples")->name("CalcularJurosCompostosSimples");

        Route::post("calcular_taxas_percentuais", "calcularTaxasPercentuais")->name("CalcularTaxasPercentuais");

        Route::post("calcular_previsao_ganhos_perdas", "calcularPrevisaoGanhosPerdas")->name("CalcularPrevisaoGanhosPerdas");

        Route::post("calcular_validacao", "calcularValidacao")->name("CalcularValidacao");

        Route::post("calcular_imc", "calcularImc")->name("CalcularImc");

        Route::post("calcular_conversores_diversos", "calcularConversoresDiversos")->name("CalcularConversoresDiversos");

        Route::post("calcular_medias_somas_medianas_percentuais", "calcularMediasSomasMedianasPercentuais")->name("CalcularMediasSomasMedianasPercentuais");

        Route::post("exibir_graficos_dinamicos", "exibirGraficosDinamicos")->name("ExibirGraficosDinamicos");

        Route::post("calcular_relatorios_desempenho", "calcularRelatoriosDesempenho")->name("CalcularRelatoriosDesempenho");

        Route::post("calcular_taxa_conversao", "calcularTaxaConversao")->name("CalcularTaxaConversao");

        Route::post("calcular_pontuacoes", "calcularPontuacoes")->name("CalcularPontuacoes");

        Route::post("calcular_verificacao_limites_regras", "calcularVerificacaoLimitesRegras")->name("CalcularVerificacaoLimitesRegras");

        Route::post("calcular_distancia_geografica", "calcularDistanciaGeografica")->name("CalcularDistanciaGeografica");

        Route::post("calcular_fisicos", "calcularFisicos")->name("CalcularFisicos");
    });
});
