<?php

use App\Http\Controllers\Calculos;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('', [MainController::class, "index"])->name("Index");

    Route::get('subtotal_total_compras', [MainController::class, "subtotalTotalCompras"])->name("SubtotalTotalCompras");
    Route::post('calcular_subtotal_total_compras', [Calculos::class, "calcularSubtotalTotalCompras"])->name("CalcularSubtotalTotalCompras");

    Route::get('descontos_cupons', [MainController::class, "descontosCupons"])->name("DescontosCupons");
    Route::post('calcular_descontos_cupons', [Calculos::class, "calcularDescontosCupons"])->name("CalcularDescontosCupons");

    Route::get('frete', [MainController::class, "frete"])->name("Frete");
    Route::post('calcular_frete', [Calculos::class, "calcularFrete"])->name("CalcularFrete");

    Route::get('impostos', [MainController::class, "impostos"])->name("Impostos");
    Route::post('calcular_impostos', [Calculos::class, "calcularImpostos"])->name("CalcularImpostos");

    Route::get('parcelamento_juros', [MainController::class, "parcelamentoJuros"])->name("ParcelamentoJuros");
    Route::post('calcular_parcelamento_juros', [Calculos::class, "calcularParcelamentoJuros"])->name("CalcularParcelamentoJuros");

    Route::get('conversao_moeda', [MainController::class, "conversaoMoeda"])->name("ConversaoMoeda");
    Route::post('calcular_conversao_moeda', [Calculos::class, "calcularConversaoMoeda"])->name("CalcularConversaoMoeda");

    Route::get('juros_compostos_simples', [MainController::class, "jurosCompostosSimples"])->name("JurosCompostosSimples");
    Route::post('calcular_juros_compostos_simples', [Calculos::class, "calcularJurosCompostosSimples"])->name("CalcularJurosCompostosSimples");

    Route::get('taxas_percentuais', [MainController::class, "taxasPercentuais"])->name("TaxasPercentuais");
    Route::post('calcular_taxas_percentuais', [Calculos::class, "calcularTaxasPercentuais"])->name("CalcularTaxasPercentuais");

    Route::get('previsao_ganhos_perdas', [MainController::class, "previsaoGanhosPerdas"])->name("PrevisaoGanhosPerdas");
    Route::post('calcular_previsao_ganhos_perdas', [Calculos::class, "calcularPrevisaoGanhosPerdas"])->name("CalcularPrevisaoGanhosPerdas");

    Route::get('validacao', [MainController::class, "validacao"])->name("Validacao");
    Route::post('calcular_validacao', [Calculos::class, "calcularValidacao"])->name("CalcularValidacao");

    Route::get('imc', [MainController::class, "imc"])->name("Imc");
    Route::post('calcular_imc', [Calculos::class, "calcularImc"])->name("CalcularImc");

    Route::get('conversores_diversos', [MainController::class, "conversoresDiversos"])->name("ConversoresDiversos");
    Route::post('calcular_conversores_diversos', [Calculos::class, "calcularConversoresDiversos"])->name("CalcularConversoresDiversos");

    Route::get('medias_somas_medianas_percentuais', [MainController::class, "mediasSomasMedianasPercentuais"])->name("MediasSomasMedianasPercentuais");
    Route::post('calcular_medias_somas_medianas_percentuais', [Calculos::class, "calcularMediasSomasMedianasPercentuais"])->name("CalcularMediasSomasMedianasPercentuais");

    Route::get('graficos_dinamicos', [MainController::class, "graficosDinamicos"])->name("GraficosDinamicos");
    Route::post('calcular_graficos_dinamicos', [Calculos::class, "calcularGraficosDinamicos"])->name("CalcularGraficosDinamicos");

    Route::get('relatorios_desempenho', [MainController::class, "relatoriosDesempenho"])->name("RelatoriosDesempenho");
    Route::post('calcular_relatorios_desempenho', [Calculos::class, "calcularRelatoriosDesempenho"])->name("CalcularRelatoriosDesempenho");

    Route::get('taxa_conversao', [MainController::class, "taxaConversao"])->name("TaxaConversao");
    Route::post('calcular_taxa_conversao', [Calculos::class, "calcularTaxaConversao"])->name("CalcularTaxaConversao");

    Route::get('comparacoes_valores', [MainController::class, "comparacoesValores"])->name("ComparacoesValores");
    Route::post('calcular_comparacoes_valores', [Calculos::class, "calcularComparacoesValores"])->name("CalcularComparacoesValores");

    Route::get('pontuacoes', [MainController::class, "pontuacoes"])->name("Pontuacoes");
    Route::post('calcular_pontuacoes', [Calculos::class, "calcularPontuacoes"])->name("CalcularPontuacoes");

    Route::get('verificacao_limites_regras', [MainController::class, "verificacaoLimitesRegras"])->name("VerificacaoLimitesRegras");
    Route::post('calcular_verificacao_limites_regras', [Calculos::class, "calcularVerificacaoLimitesRegras"])->name("CalcularVerificacaoLimitesRegras");

    Route::get('distancia_geografica', [MainController::class, "distanciaGeografica"])->name("DistanciaGeografica");
    Route::post('calcular_distancia_geografica', [Calculos::class, "calcularDistanciaGeografica"])->name("CalcularDistanciaGeografica");

    Route::get('tempo_execusao_cronometros', [MainController::class, "tempoExecusaoCronometros"])->name("TempoExecusaoCronometros");
    Route::post('calcular_tempo_execusao_cronometros', [Calculos::class, "calcularTempoExecusaoCronometros"])->name("CalcularTempoExecusaoCronometros");

    Route::get('fisicos', [MainController::class, "fisicos"])->name("Fisicos");
    Route::post('calcular_fisicos', [Calculos::class, "calcularFisicos"])->name("CalcularFisicos");

    Route::get('algoritmos_recomendacao_ranqueamento', [MainController::class, "algoritmosRecomendacaoRanqueamento"])->name("AlgoritmosRecomendacaoRanqueamento");
    Route::post('calcular_algoritmos_recomendacao_ranqueamento', [Calculos::class, "calcularAlgoritmosRecomendacaoRanqueamento"])->name("CalcularAlgoritmosRecomendacaoRanqueamento");
});
