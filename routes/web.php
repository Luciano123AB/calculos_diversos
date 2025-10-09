<?php

use App\Http\Controllers\Calculos;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get("/", [MainController::class, "index"])->name("Index");

Route::get("/subtotal_total_compras", [MainController::class, "subtotalTotalCompras"])->name("SubtotalTotalCompras");

Route::post("/calcular_subtotal_total_compras", [Calculos::class, "calcularSubtotalTotalCompras"])->name("CalcularSubtotalTotalCompras");

Route::get("/descontos_cupons", [MainController::class, "descontosCupons"])->name("DescontosCupons");

Route::post("/calcular_descontos_cupons", [Calculos::class, "calcularDescontosCupons"])->name("CalcularDescontosCupons");

Route::get("/frete", [MainController::class, "frete"])->name("Frete");

Route::post("/calcular_frete", [Calculos::class, "calcularFrete"])->name("CalcularFrete");

Route::get("/impostos", [MainController::class, "impostos"])->name("Impostos");

Route::post("/calcular_impostos", [Calculos::class, "calcularImpostos"])->name("CalcularImpostos");

Route::get("/parcelamento_juros", [MainController::class, "parcelamentoJuros"])->name("ParcelamentoJuros");

Route::post("/calcular_parcelamento_juros", [Calculos::class, "calcularParcelamentoJuros"])->name("CalcularParcelamentoJuros");

Route::get("/conversao_moeda", [MainController::class, "conversaoMoeda"])->name("ConversaoMoeda");

Route::get("/juros_compostos_simples", [MainController::class, "jurosCompostosSimples"])->name("JurosCompostosSimples");

Route::get("/taxas_percentuais", [MainController::class, "taxasPercentuais"])->name("TaxasPercentuais");

Route::get("/previsao_ganhos_perdas", [MainController::class, "previsaoGanhosPerdas"])->name("PrevisaoGanhosPerdas");

Route::get("/validacao", [MainController::class, "validacao"])->name("Validacao");

Route::get("/imc", [MainController::class, "imc"])->name("Imc");

Route::get("/conversores_diversos", [MainController::class, "conversoresDiversos"])->name("ConversoresDiversos");

Route::get("/medias_somas_medianas_percentuais", [MainController::class, "mediasSomasMedianasPercentuais"])->name("MediasSomasMedianasPercentuais");

Route::get("/graficos_dinamicos", [MainController::class, "graficosDinamicos"])->name("GraficosDinamicos");

Route::get("/relatorios_desempenho", [MainController::class, "relatoriosDesempenho"])->name("RelatoriosDesempenho");

Route::get("/taxa_conversao", [MainController::class, "taxaConversao"])->name("TaxaConversao");

Route::get("/comparacoes_valores", [MainController::class, "comparacoesValores"])->name("ComparacoesValores");

Route::get("/pontuacoes", [MainController::class, "pontuacoes"])->name("Pontuacoes");

Route::get("/verificacao_limites_regras", [MainController::class, "verificacaoLimitesRegras"])->name("VerificacaoLimitesRegras");

Route::get("/distancia_geografica", [MainController::class, "distanciaGeografica"])->name("DistanciaGeografica");

Route::get("/tempo_execusao_cronometros", [MainController::class, "tempoExecusaoCronometros"])->name("TempoExecusaoCronometros");

Route::get("/fisicos", [MainController::class, "fisicos"])->name("Fisicos");

Route::get("/algoritmos_recomendacao_ranqueamento", [MainController::class, "algoritmosRecomendacaoRanqueamento"])->name("AlgoritmosRecomendacaoRanqueamento");