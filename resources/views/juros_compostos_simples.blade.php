@extends("layouts.main_layout")

@section("content")
    @include("layouts.top")
                
    <form action="{{ route("CalcularJurosCompostosSimples") }}" method="POST" novalidate class="mx-auto" style="max-width: 600px;">
        @csrf
        
        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text"><i class="bi bi-cash-coin me-1"></i>Valor</span>
            
            <input type="number" step="0.01" id="valor" name="valor" class="form-control text-end" placeholder="000.000,00" aria-label="Valor" value="{{ old("valor") }}">
            
            <span class="input-group-text bg-white border-0 fw-bold px-3">×</span>
            
            <select id="juros" name="juros" class="form-select" aria-label="Juros">
                <option selected>Selecione o juros</option>
                <option value="Composto" {{ old("juros") == "Composto" ? "selected" : "" }}>Composto</option>
                <option value="Simples" {{ old("juros") == "Simples" ? "selected" : "" }}>Simples</option>
            </select>

            <span class="input-group-text"><i class="bi bi-percent me-1"></i>Juros</span>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <div class="flex-fill">
                @error("valor")
                    <div class="alert alert-danger py-2 mb-3" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="flex-fill">
                @if(session("juros"))
                    <div class="alert alert-danger py-2 mb-3" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ session("juros") }}
                    </div>
                @endif
            </div>
        </div>

        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text"><i class="bi bi-coin me-1"></i>Taxa</span>
            
            <input type="number" id="taxa" name="taxa" class="form-control text-end" placeholder="00,0" aria-label="Taxa" value="{{ old("taxa") }}">
            
            <input type="number" id="tempo" name="tempo" class="form-control text-end" placeholder="00" aria-label="Tempo" min="0" max="99" value="{{ old("tempo") }}">

            <span class="input-group-text"><i class="bi bi-stopwatch me-1"></i>Tempo(Meses)</span>
        </div>
        
        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <div class="flex-fill">
                @error("taxa")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="flex-fill">
                @error("tempo")
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
            
            <button type="button" id="limpar" class="btn btn-outline-secondary fw-semibold px-4" onclick="limparCampos03()">
                <i class="bi bi-x-circle me-2"></i> Limpar
            </button>
        </div>
    </form>

    @include("layouts.footer")

    <script>
        $(document).ready(function() {
            $("#valor").mask("##0.00", { reverse: true });
            $("#taxa").mask("##0.0", { reverse: true });
        });
    </script>
@endsection
