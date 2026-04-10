@extends("layouts.main_layout")

@section("content")
    <nav class="bg-secondary border-bottom text-center py-5 shadow position-relative">
        <a href="{{ route("index") }}" class="btn btn-light position-absolute top-50 start-0 translate-middle-y ms-3 d-flex align-items-center gap-1 shadow-sm">
            <i class="bi bi-arrow-left-circle fs-5 mb-1"></i>
            
            <span class="d-none d-sm-inline fw-semibold">Voltar</span>
        </a>

        <h2 class="text-light mb-2 fw-light">{{ $textos["h2"] }}</h2>

        <span class="text-white fw-bold display-5">{{ $textos["span"] }}</span>
    </nav>

    <div class="container my-5">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header bg-info text-white text-center py-4">
                <h3 class="fw-bold mb-1">Dados</h3>

                <h5 class="fw-light mb-0">Insira os valores abaixo para obter {{ $textos["h5"] }}</h5>
            </div>

            <div class="card-body bg-light p-5">
                <div class="mx-auto" style="max-width: 600px;">
                    <form action="{{ route("ExibirGraficosDinamicos") }}" method="POST" novalidate class="mx-auto" style="max-width: 600px;">
                        @csrf

                        <div class="input-group input-group-lg mb-3">
                            <span class="input-group-text"><i class="bi bi-hand-thumbs-up me-1"></i>Permitidos</span>
                            
                            <input type="number" id="permitidos" name="permitidos" class="form-control text-end" placeholder="000" aria-label="Permitidos">
                            
                            <span class="input-group-text"><i class="bi bi-hand-thumbs-down me-1"></i>Negados</span>

                            <input type="number" id="negados" name="negados" class="form-control text-end" placeholder="000" aria-label="Negados">
                        </div>
                        
                        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
                            <div class="flex-fill">
                                @error("permitidos")
                                    <div class="alert alert-danger py-2 mb-0" role="alert">
                                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="flex-fill">
                                @error("negados")
                                    <div class="alert alert-danger py-2 mb-0" role="alert">
                                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-center gap-3 mt-4">
                            <button type="submit" id="executar" class="btn btn-info text-white fw-semibold px-4 shadow-sm">
                                <i class="bi bi-calculator-fill me-2"></i> Executar
                            </button>
                            
                            <button type="button" id="limpar" class="btn btn-outline-secondary fw-semibold px-4" onclick="limparCampos14()">
                                <i class="bi bi-x-circle me-2"></i> Limpar
                            </button>
                        </div>
                    </form>

                    <div class="col-12 col-md-12 pt-3 mt-2">
                        <div class="bg-light border border-black p-3 shadow rounded-3">
                            <div class="card bg-primary-subtle text-primary p-3 mb-3 shadow-sm rounded-3">
                                <div class="d-flex align-items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                    </svg>
                                        
                                    <div class="fs-5 fw-bold">Total de Usuários: 
                                        @if (session()->has("total")) 
                                            {{ session("total") }}

                                            {{ session()->forget("total") }}
                                        @else 
                                            0 
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <div class="card bg-success-subtle text-success p-3 shadow-sm rounded-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                                    
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                            </svg>
                                                
                                            <div class="fs-5 fw-bold">Permitidos: 
                                                @if (session()->has("permitidos")) 
                                                    {{ session("permitidos") }}
                                                @else 
                                                    0 
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="card bg-danger-subtle text-danger p-3 shadow-sm rounded-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708"/>
                                            </svg>
                                                
                                            <div class="fs-5 fw-bold">Negados: 
                                                @if (session()->has("negados")) 
                                                    {{ session("negados") }}
                                                @else 
                                                    0 
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card bg-secondary-subtle mt-3 p-3 shadow-sm rounded-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-success fw-bold">Permitidos 
                                        @if (session()->has("permitidos")) 
                                            {{ session("permitidos") }}%
                                        @else 
                                            0%
                                        @endif
                                    </span>
                                        
                                    <span class="text-danger fw-bold">Negados 
                                        @if (session()->has("negados")) 
                                            {{ session("negados") }}%
                                        @else 
                                            0%
                                        @endif
                                    </span>
                                </div>

                                <div class="progress-stacked border border-black rounded-3">
                                    <div class="progress" role="progressbar" style="width: 
                                        @if (session()->has("permitidos")) 
                                            {{ session("permitidos") }}%
                                        @else 
                                            0%
                                        @endif;">

                                        <div class="progress-bar progress-bar-striped bg-success"></div>
                                    </div>

                                    <div class="progress" role="progressbar" style="width: 
                                        @if (session()->has("negados")) 
                                            {{ session("negados") }}%
                                        @else 
                                            0%
                                        @endif;">

                                        <div class="progress-bar progress-bar-striped bg-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-light border border-black p-3 mt-3 shadow rounded-3">
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <div class="card bg-secondary-subtle text-center p-3 shadow-sm rounded-3">
                                        <canvas id="grafico01"></canvas>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="card bg-secondary-subtle text-center p-3 shadow-sm rounded-3">
                                        <canvas id="grafico02"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    @include("layouts.footer")

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const ctx01 = document.getElementById("grafico01").getContext("2d");
            const permitidos = Number(@json(session('permitidos', 0)));
            const negados = Number(@json(session('negados', 0)));
            const colorPermitidos = '#28a745';
            const colorNegados = '#dc3545';

            new Chart(ctx01, {
                type: "bar",
                data: {
                    labels: ["Usuários"],
                    datasets: [
                        { label: "Permitidos", data: [permitidos], backgroundColor: colorPermitidos, borderColor: "black", borderWidth: 2 },
                        { label: "Negados", data: [negados], backgroundColor: colorNegados, borderColor: "black", borderWidth: 2 }
                    ]
                },
                
                options: { responsive: true, scales: { y: { beginAtZero: true } } }
            });

            const ctx02 = document.getElementById("grafico02").getContext("2d");

            new Chart(ctx02, {
                type: "pie",
                data: {
                    labels: ["Permitidos", "Negados"],
                    datasets: [{ data: [permitidos, negados], backgroundColor: [colorPermitidos, colorNegados], borderColor: "black", borderWidth: 2 }]
                },

                options: { responsive: true }
            });
        });
    </script>

    {{ session()->forget(["permitidos", "negados"]) }}
@endsection
