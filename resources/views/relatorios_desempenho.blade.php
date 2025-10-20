@extends("layouts.main_layout")

@section("content")
    @include("layouts.top")

    <form action="{{ route("CalcularRelatoriosDesempenho") }}" method="POST" novalidate class="mx-auto" style="max-width: 700px;">
        @csrf
        
        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text"><i class="bi bi-cash-coin me-1"></i>Vendas</span>
            
            <input type="number" step="0.01" id="venda01" name="venda01" class="form-control text-end" placeholder="000.000,00" aria-label="Venda01" value="{{ old("venda01") }}">
            
            <input type="number" step="0.01" id="venda02" name="venda02" class="form-control text-end" placeholder="000.000,00" aria-label="Venda02" value="{{ old("venda02") }}">
        
            <input type="number" step="0.01" id="venda03" name="venda03" class="form-control text-end" placeholder="000.000,00" aria-label="Venda03" value="{{ old("venda03") }}">
        
            <input type="number" step="0.01" id="venda04" name="venda04" class="form-control text-end" placeholder="000.000,00" aria-label="Venda04" value="{{ old("venda04") }}">
        </div>
        
        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <div class="flex-fill">
                @error("venda01")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="flex-fill">
                @error("venda02")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex-fill">
                @error("venda03")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex-fill">
                @error("venda04")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        
        <div class="mt-4 text-center">
            @if(!session()->has("total") && !session()->has("media") && !session()->has("melhor") && !session()->has("pior") && !session()->has("taxa"))
                <h5 class="fw-normal text-secondary">
                    Total vendido: <span class="fw-bold text-dark">R$ 0,00</span>
                </h5>

                <h5 class="fw-normal text-secondary">
                    Média mensal: <span class="fw-bold text-dark">R$ 0,00</span>
                </h5>

                <h5 class="fw-normal text-secondary">
                    Melhor mês: <span class="fw-bold text-dark">R$ 0,00</span>
                </h5>

                <h5 class="fw-normal text-secondary">
                    Pior mês: <span class="fw-bold text-dark">R$ 0,00</span>
                </h5>

                <h4 class="fw-normal text-secondary">Taxa de crescimento: <span class="fw-bold text-dark">R$ 0,00</span></h4>
            @else
                <h5 class="fw-normal text-secondary">
                    Total vendido: <span class="fw-bold text-success">R$ {{ session("total") }}</span>
                </h5>

                <h5 class="fw-normal text-secondary">
                    Média mensal: <span class="fw-bold text-success">R$ {{ session("media") }}</span>
                </h5>

                <h5 class="fw-normal text-secondary">
                    Melhor mês: <span class="fw-bold text-success">R$ {{ session("melhor") }}</span>
                </h5>

                <h5 class="fw-normal text-secondary">
                    Pior mês: <span class="fw-bold text-success">R$ {{ session("pior") }}</span>
                </h5>

                @if(session("taxa") > 0.00)
                    <h4 class="fw-normal text-secondary">Taxa de crescimento: <span class="fw-bold text-success">R$ {{ session("taxa") }}</span></h4>
                @else
                    <h4 class="fw-normal text-secondary">Taxa de crescimento: <span class="fw-bold text-danger">R$ {{ session("taxa") }}</span></h4>
                @endif
                
                {{ session()->forget(["total", "media", "melhor", "pior", "taxa"]) }}
            @endif
        </div>
        
        <div class="d-flex justify-content-center gap-3 mt-4">
            <button type="submit" id="calcular" class="btn btn-info text-white fw-semibold px-4 shadow-sm">
                <i class="bi bi-calculator-fill me-2"></i> Calcular
            </button>
            
            <button type="button" id="limpar" class="btn btn-outline-secondary fw-semibold px-4" onclick="limparCampos15()">
                <i class="bi bi-x-circle me-2"></i> Limpar
            </button>
        </div>
    </form>

    @include("layouts.footer")

    <script>
        $(document).ready(function() {
            $("#venda01").mask("##0.00", { reverse: true });
            $("#venda02").mask("##0.00", { reverse: true });
            $("#venda03").mask("##0.00", { reverse: true });
            $("#venda04").mask("##0.00", { reverse: true });
        });
    </script>
@endsection
