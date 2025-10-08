@extends("layouts.main_layout");

@section("content")
    <nav class="bg-secondary shadow">
        <h2 class="mb-5">
            Seja Bem Vindo ao
            <br>
            
            <span class="text-white fw-bold fs-1">Cálculos Diversos</span>
        </h2>
    </nav>

    <div class="card border-2 border-black shadow mx-5">
        <div class="card-header border-bottom py-3">
            <h3 class="card-title fw-bold">Tipos de Cálculos</h3>

            <h4 class="card-subtitle">Escolha:</h4>
        </div>

        <div class="card-body">
            <div class="row row-cols-3">
                <div class="col">
                    <h5>Comerciais:</h5>

                    <div class="d-grid gap-3">
                        <a href="{{ route("SubtotalTotalCompras") }}" class="btn btn-info border">Subtotal e Total de Compras</a>
    
                        <a href="{{ route("DescontosCupons") }}" class="btn btn-info border">Descontos e Cupons</a>
    
                        <a href="{{ route("Frete") }}" class="btn btn-info border">Frete</a>

                        <a href="{{ route("Impostos") }}" class="btn btn-info border">Impostos (ICMS|ISS|IVA)</a>

                        <a href="{{ route("ParcelamentoJuros") }}" class="btn btn-info border">Parcelamento e Juros</a>
                    </div>
                </div>
                
                <div class="col">
                    <h5>Financeiros:</h5>

                    <div class="d-grid gap-3">
                        <a href="{{ route("ConversaoMoeda") }}" class="btn btn-info border">Conversão de Moeda</a>
                        
                        <a href="{{ route("JurosCompostosSimples") }}" class="btn btn-info border">Juros Compostos/Simples</a>

                        <a href="{{ route("TaxasPercentuais") }}" class="btn btn-info border">Taxas e Percentuais</a>
        
                        <a href="{{ route("PrevisaoGanhosPerdas") }}" class="btn btn-info border">Previsão de Ganhos/Perdas</a>
                    </div>
                </div>

                <div class="col">
                    <h5>Usuário/Formulário:</h5>

                    <div class="d-grid gap-3">
                        <a href="{{ route("Validacao") }}" class="btn btn-info border">Validação de CPF/CNPJ|idade|data de nascimento</a>
                        
                        <a href="{{ route("Imc") }}" class="btn btn-info border">IMC</a>

                        <a href="{{ route("ConversoresDiversos") }}" class="btn btn-info border">Conversores Diversos</a>
                    </div>
                </div>

                <div class="col mt-4">
                    <h5>Estatísticos/Análise:</h5>

                    <div class="d-grid gap-3">
                        <a href="{{ route("MediasSomasMedianasPercentuais") }}" class="btn btn-info border">Médias|Somas|Medianas|Percentuais</a>
                        
                        <a href="{{ route("GraficosDinamicos") }}" class="btn btn-info border">Gráficos Dinâmicos</a>

                        <a href="{{ route("RelatoriosDesempenho") }}" class="btn btn-info border">Relatórios de Desempenho</a>

                        <a href="{{ route("TaxaConversao") }}" class="btn btn-info border">Taxa de Conversão</a>
                    </div>
                </div>

                <div class="col mt-4">
                    <h5>Lógicos/Condicionais:</h5>

                    <div class="d-grid gap-3">
                        <a href="{{ route("ComparacoesValores") }}" class="btn btn-info border">Comparações de Valores</a>
                        
                        <a href="{{ route("Pontuacoes") }}" class="btn btn-info border">Pontuações</a>

                        <a href="{{ route("VerificacaoLimitesRegras") }}" class="btn btn-info border">Verificação de Limites/Regras de Negócio</a>
                    </div>
                </div>

                <div class="col mt-4">
                    <h5>Técnicos:</h5>

                    <div class="d-grid gap-3">
                        <a href="{{ route("DistanciaGeografica") }}" class="btn btn-info border">Distância Geográfica</a>
                        
                        <a href="{{ route("TempoExecusaoCronometros") }}" class="btn btn-info border">Tempo de Execução|Cronômetros</a>

                        <a href="{{ route("Fisicos") }}" class="btn btn-info border">Físicos</a>

                        <a href="{{ route("AlgoritmosRecomendacaoRanqueamento") }}" class="btn btn-info border">Algoritmos de Recomendação ou Ranqueamento</a>
                    </div>
                </div>
            </div>
        </div>

        <footer class="card-footer"></footer>
    </div>
@endsection