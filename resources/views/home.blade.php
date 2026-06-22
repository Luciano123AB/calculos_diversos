@extends("layouts.main_layout")

@section("content")
    <nav class="bg-secondary border-bottom text-center py-5 shadow">
        <h2 class="text-light mb-3">Seja Bem-Vindo ao</h2>

        <span class="text-white fw-bold display-5">Cálculos Diversos</span>
    </nav>

    <div class="container my-5">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header bg-info text-white text-center py-4">
                <h3 class="fw-bold mb-1">Tipos de Cálculos</h3>

                <h5 class="fw-light mb-0">Escolha uma categoria para começar</h5>
            </div>

            <div class="card-body bg-light">
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                            <h5 class="fw-bold mb-3 text-center text-secondary">Comerciais</h5>
                            
                            <div class="d-grid gap-3">
                                <a href="{{ route('subtotal.total.compras') }}" class="btn btn-outline-info fw-semibold">Subtotal e Total de Compras</a>
                                
                                <a href="{{ route('descontos.cupons') }}" class="btn btn-outline-info fw-semibold">Descontos e Cupons</a>
                                
                                <a href="{{ route('frete') }}" class="btn btn-outline-info fw-semibold">Descobrir Frete</a>
                                
                                <a href="{{ route('impostos') }}" class="btn btn-outline-info fw-semibold">Calcular Impostos (ICMS | ISS | IVA)</a>
                                
                                <a href="{{ route('parcelamento.juros') }}" class="btn btn-outline-info fw-semibold">Parcelamento e Juros</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                            <h5 class="fw-bold mb-3 text-center text-secondary">Financeiros</h5>
                            
                            <div class="d-grid gap-3">
                                <a href="{{ route('conversao.moeda') }}" class="btn btn-outline-info fw-semibold">Conversão de Moeda</a>

                                <a href="{{ route('juros.compostos.simples') }}" class="btn btn-outline-info fw-semibold">Juros Compostos / Simples</a>

                                <a href="{{ route('taxas.percentuais') }}" class="btn btn-outline-info fw-semibold">Taxas e Percentuais</a>

                                <a href="{{ route('previsao.ganhos.perdas') }}" class="btn btn-outline-info fw-semibold">Previsão de Ganhos / Perdas</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                            <h5 class="fw-bold mb-3 text-center text-secondary">Usuário / Formulário</h5>

                            <div class="d-grid gap-3">
                                <a href="{{ route('validacao') }}" class="btn btn-outline-info fw-semibold">Validação de CPF / CNPJ / Idade / Data</a>

                                <a href="{{ route('imc') }}" class="btn btn-outline-info fw-semibold">IMC</a>

                                <a href="{{ route('conversores.diversos') }}" class="btn btn-outline-info fw-semibold">Conversores Diversos</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                            <h5 class="fw-bold mb-3 text-center text-secondary">Estatísticos / Análise</h5>

                            <div class="d-grid gap-3">
                                <a href="{{ route('medias.somas.medianas.percentuais') }}" class="btn btn-outline-info fw-semibold">Médias / Somas / Medianas / Percentuais</a>
                                
                                <a href="{{ route('graficos.dinamicos') }}" class="btn btn-outline-info fw-semibold">Gráficos Dinâmicos</a>
                                
                                <a href="{{ route('relatorios.desempenho') }}" class="btn btn-outline-info fw-semibold">Relatórios de Desempenho</a>
                                
                                <a href="{{ route('taxa.conversao') }}" class="btn btn-outline-info fw-semibold">Taxa de Conversão</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                            <h5 class="fw-bold mb-3 text-center text-secondary">Lógicos / Condicionais</h5>
                            
                            <div class="d-grid gap-3">
                                <a href="{{ route('pontuacoes') }}" class="btn btn-outline-info fw-semibold">Pontuações</a>
                                
                                <a href="{{ route('verificacao.limites.regras') }}" class="btn btn-outline-info fw-semibold">Verificação de Limites / Regras</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                            <h5 class="fw-bold mb-3 text-center text-secondary">Técnicos</h5>
                            
                            <div class="d-grid gap-3">
                                <a href="{{ route('distancia.geografica') }}" class="btn btn-outline-info fw-semibold">Distância Geográfica</a>
                                                                
                                <a href="{{ route('fisicos') }}" class="btn btn-outline-info fw-semibold">Físicos</a>
                            </div>
                        </div>
                    </div>
                </div>
                
    @include("layouts.footer")
@endsection
