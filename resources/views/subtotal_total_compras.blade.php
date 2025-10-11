@extends("layouts.main_layout")

@section("content")
    <nav class="bg-secondary text-center py-5 shadow-sm position-relative">
        <a href="{{ route("Index") }}" class="btn btn-light position-absolute top-50 start-0 translate-middle-y ms-3 d-flex align-items-center gap-1 shadow-sm">
            <i class="bi bi-arrow-left-circle fs-5 mb-1"></i>
            
            <span class="d-none d-sm-inline fw-semibold">Voltar</span>
        </a>

        <h2 class="text-light mb-2 fw-light">Subtotal e</h2>

        <span class="text-white fw-bold display-5">Total de Compras</span>
    </nav>

    <div class="container my-5">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header bg-info text-white text-center py-4">
                <h3 class="fw-bold mb-1">Cálculo</h3>

                <h5 class="fw-light mb-0">Insira os valores abaixo para obter o subtotal e total</h5>
            </div>

            <div class="card-body bg-light p-5">
                <form action="{{ route("CalcularSubtotalTotalCompras") }}" method="POST" novalidate class="mx-auto" style="max-width: 600px;">
                    @csrf

                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-text"><i class="bi bi-cash-coin me-1"></i>Valor</span>

                        <input type="number" step="0.01" id="valor" name="valor" class="form-control text-end" placeholder="000,00" aria-label="Valor" value="{{ old("valor") }}">

                        <span class="input-group-text bg-white border-0 fw-bold px-3">×</span>

                        <input type="number" id="quantidade" name="quantidade" class="form-control text-end" placeholder="0" aria-label="Quantidade" value="{{ old("quantidade") }}">

                        <span class="input-group-text"><i class="bi bi-cart3 me-1"></i>Qtd.</span>
                    </div>

                    <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
                        <div class="flex-fill">
                            @error("valor")
                                <div class="alert alert-danger py-2 mb-0" role="alert">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="flex-fill">
                            @error("quantidade")
                                <div class="alert alert-danger py-2 mb-0" role="alert">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        @if(!session()->has("resultado"))
                            <h4 class="fw-normal text-secondary">Resultado: <span class="fw-bold text-dark">R$ 0,00</span></h4>
                        @else
                            <h4 class="fw-normal text-secondary">
                                Resultado: <span class="fw-bold text-success">R$ {{ session("resultado") }}</span>
                            </h4>

                            {{ session()->forget("resultado") }}
                        @endif
                    </div>

                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <button type="submit" id="calcular" class="btn btn-info text-white fw-semibold px-4 shadow-sm">
                            <i class="bi bi-calculator-fill me-2"></i> Calcular
                        </button>

                        <button type="button" id="limpar" class="btn btn-outline-secondary fw-semibold px-4" onclick="limparCampos01()">
                            <i class="bi bi-x-circle me-2"></i> Limpar
                        </button>
                    </div>
                </form>
            </div>

            <footer class="card-footer bg-info text-white text-center py-3">
                <small>© {{ date("Y") }} Cálculos Diversos - Todos os direitos reservados.</small>
            </footer>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#valor").mask("000.00");
        });
    </script>
@endsection
