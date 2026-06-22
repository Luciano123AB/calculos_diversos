<?php

use App\Http\Controllers\Calculos;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::prefix("/")->group(function () {
    Route::controller(MainController::class)->group(function() {
        Route::get("", "home")->name("home");

        Route::get("subtotal-total-compras", "subtotalTotalCompras")->name("subtotal.total.compras");

        Route::get("descontos-cupons", "descontosCupons")->name("descontos.cupons");

        Route::get("frete", "frete")->name("frete");

        Route::get("impostos", "impostos")->name("impostos");

        Route::get("parcelamento-juros", "parcelamentoJuros")->name("parcelamento.juros");

        Route::get("conversao-moeda", "conversaoMoeda")->name("conversao.moeda");

        Route::get("juros-compostos-simples", "jurosCompostosSimples")->name("juros.compostos.simples");

        Route::get("taxas-percentuais", "taxasPercentuais")->name("taxas.percentuais");

        Route::get("previsao-ganhos-perdas", "previsaoGanhosPerdas")->name("previsao.ganhos.perdas");

        Route::get("validacao", "validacao")->name("validacao");

        Route::get("imc", "imc")->name("imc");

        Route::get("conversores-diversos", "conversoresDiversos")->name("conversores.diversos");

        Route::get("medias-somas-medianas-percentuais", "mediasSomasMedianasPercentuais")->name("medias.somas.medianas.percentuais");

        Route::get("graficos-dinamicos", "graficosDinamicos")->name("graficos.dinamicos");

        Route::get("relatorios-desempenho", "relatoriosDesempenho")->name("relatorios.desempenho");

        Route::get("taxa-conversao", "taxaConversao")->name("taxa.conversao");

        Route::get("pontuacoes", "pontuacoes")->name("pontuacoes");

        Route::get("verificacao-limites-regras", "verificacaoLimitesRegras")->name("verificacao.limites.regras");

        Route::get("distancia-geografica", "distanciaGeografica")->name("distancia.geografica");

        Route::get("fisicos", "fisicos")->name("fisicos");
    });

    Route::controller(Calculos::class)->group(function() {
        Route::post("calcular-subtotal-total-compras", "calcularSubtotalTotalCompras")->name("calcular.subtotal.total.compras");

        Route::post("calcular-descontos-cupons", "calcularDescontosCupons")->name("calcular.descontos.cupons");

        Route::post("calcular-frete", "calcularFrete")->name("calcular.frete");

        Route::post("calcular-impostos", "calcularImpostos")->name("calcular.impostos");

        Route::post("calcular-parcelamento-juros", "calcularParcelamentoJuros")->name("calcular.parcelamento.juros");

        Route::post("calcular-conversao-moeda", "calcularConversaoMoeda")->name("calcular.conversao.moeda");

        Route::post("calcular-juros-compostos-simples", "calcularJurosCompostosSimples")->name("calcular.juros.compostos.simples");

        Route::post("calcular-taxas-percentuais", "calcularTaxasPercentuais")->name("calcular.taxas.percentuais");

        Route::post("calcular-previsao-ganhos-perdas", "calcularPrevisaoGanhosPerdas")->name("calcular.previsao.ganhos.perdas");

        Route::post("calcular-validacao", "calcularValidacao")->name("calcular.validacao");

        Route::post("calcular-imc", "calcularImc")->name("calcular.imc");

        Route::post("calcular-conversores-diversos", "calcularConversoresDiversos")->name("calcular.conversores.diversos");

        Route::post("calcular-medias-somas-medianas-percentuais", "calcularMediasSomasMedianasPercentuais")->name("calcular.medias.somas.medianas.percentuais");

        Route::post("exibir-graficos-dinamicos", "exibirGraficosDinamicos")->name("exibir.graficos.dinamicos");

        Route::post("calcular-relatorios-desempenho", "calcularRelatoriosDesempenho")->name("calcular.relatorios.desempenho");

        Route::post("calcular-taxa-conversao", "calcularTaxaConversao")->name("calcular.taxa.conversao");

        Route::post("calcular-pontuacoes", "calcularPontuacoes")->name("calcular.pontuacoes");

        Route::post("calcular-verificacao-limites-regras", "calcularVerificacaoLimitesRegras")->name("calcular.verificacao.limites.regras");

        Route::post("calcular-distancia-geografica", "calcularDistanciaGeografica")->name("calcular.distancia.geografica");

        Route::post("calcular-fisicos", "calcularFisicos")->name("calcular.fisicos");
    });

    Route::fallback(function() {
        return view("home");
    });
});
