@extends("layouts.main_layout")

@section("content")
    @include("layouts.top")

    <form action="{{ route("CalcularVerificacaoLimitesRegras") }}" method="POST" novalidate class="mx-auto" style="max-width: 600px;">
        @csrf
        
        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text"><i class="bi bi-cash-coin me-1"></i>Idade</span>
            
            <input type="number" id="idade" name="idade" class="form-control text-end" placeholder="00" aria-label="Idade" value="{{ old("idade") }}">
            
            <input type="number" step="0.01" id="renda" name="renda" class="form-control text-end" placeholder="0.000,00" aria-label="Renda" value="{{ old("renda") }}">
            
            <span class="input-group-text"><i class="bi bi-cart3 me-1"></i>Renda</span>
        </div>
        
        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <div class="flex-fill">
                @error("idade")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="flex-fill">
                @error("renda")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        
        <div class="mt-4 text-center">
            @if(!session()->has("resultado"))
                <h4 class="fw-normal text-secondary">Resultado: <span class="fw-bold text-dark">...</span></h4>
            @else
                @if(session("resultado") == "APROVADO")
                    <h4 class="fw-normal text-secondary">
                        Resultado: <span class="fw-bold text-success">{{ session("resultado") }}!</span>
                    </h4>
                @else
                    <h4 class="fw-normal text-secondary">
                        Resultado: <span class="fw-bold text-danger">{{ session("resultado") }}!</span>
                    </h4>
                @endif
                
                {{ session()->forget("resultado") }}
            @endif
        </div>
        
        <div class="d-flex justify-content-center gap-3 mt-4">
            <button type="submit" id="calcular" class="btn btn-info text-white fw-semibold px-4 shadow-sm">
                <i class="bi bi-calculator-fill me-2"></i> Calcular
            </button>
            
            <button type="button" id="limpar" class="btn btn-outline-secondary fw-semibold px-4" onclick="limparCampos18()">
                <i class="bi bi-x-circle me-2"></i> Limpar
            </button>
        </div>
    </form>

    @include("layouts.footer")

    <script>
        $(document).ready(function() {
            $("#renda").mask("##0.00", { reverse: true });
        });
    </script>
@endsection
