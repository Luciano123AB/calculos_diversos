@extends("layouts.main_layout")

@section("content")
    @include("layouts.header")

    <form action="{{ route("calcular.taxa.conversao") }}" method="POST" novalidate class="mx-auto" style="max-width: 600px;">
        @csrf
        
        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text"><i class="bi bi-arrow-repeat me-1"></i>Nº Conversões</span>
            
            <input type="number" id="numero_conversoes" name="numero_conversoes" class="form-control text-end" placeholder="000" aria-label="NumeroConversoes" value="{{ old("numero_conversoes") }}">
    
            <input type="number" id="numero_visitas" name="numero_visitas" class="form-control text-end" placeholder="000" aria-label="NumeroVisitas" value="{{ old("numero_visitas") }}">
            
            <span class="input-group-text"><i class="bi bi-door-open me-1"></i>Nº Visitas</span>
        </div>
        
        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <div class="flex-fill">
                @error("numero_conversoes")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="flex-fill">
                @error("numero_visitas")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        
        <div class="mt-4 text-center">
            @if(!session()->has("resultado"))
                <h4 class="fw-normal text-secondary">Resultado: <span class="fw-bold text-dark">0,00%</span></h4>
            @else
                <h4 class="fw-normal text-secondary">
                    Resultado: <span class="fw-bold text-success">{{ session("resultado") }}%</span>
                </h4>
                
                {{ session()->forget("resultado") }}
            @endif
        </div>
        
        <div class="d-flex justify-content-center gap-3 mt-4">
            <button type="submit" id="calcular" class="btn btn-info text-white fw-semibold px-4 shadow-sm">
                <i class="bi bi-calculator-fill me-2"></i> Calcular
            </button>
            
            <button type="button" id="limpar" class="btn btn-outline-secondary fw-semibold px-4" onclick="limparCampos16()">
                <i class="bi bi-x-circle me-2"></i> Limpar
            </button>
        </div>
    </form>

    @include("layouts.footer")
@endsection
