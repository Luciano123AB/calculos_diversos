@extends("layouts.main_layout")

@section("content")
    @include("layouts.top")

    <form action="{{ route("CalcularDistanciaGeografica") }}" method="POST" novalidate class="mx-auto" style="max-width: 600px;">
        @csrf
        
        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text"><i class="bi bi-house me-1"></i>Início</span>
            
            <span class="input-group-text bg-white border fw-bold px-3"><i class="bi bi-arrow-right"></i></span>
            
            <input type="number" step="0.01" id="latitude01" name="latitude01" class="form-control text-end" placeholder="-00.000000" aria-label="Latitude01" value="{{ old("latitude01") }}">
        
            <span class="input-group-text bg-white border fw-bold px-3"><i class="bi bi-arrow-up"></i></span>
            
            <input type="number" step="0.01" id="longitude01" name="longitude01" class="form-control text-end" placeholder="-00.000000" aria-label="Longitude01" value="{{ old("longitude01") }}">
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <div class="flex-fill">
                @error("latitude01")
                    <div class="alert alert-danger py-2 mb-3" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="flex-fill">
                @error("longitude01")
                    <div class="alert alert-danger py-2 mb-3" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text"><i class="bi bi-flag me-1"></i>Destino</span>
            
            <span class="input-group-text bg-white border fw-bold px-3"><i class="bi bi-arrow-right"></i></span>
            
            <input type="number" step="0.01" id="latitude02" name="latitude02" class="form-control text-end" placeholder="-00.000000" aria-label="Latitude02" value="{{ old("latitude02") }}">
        
            <span class="input-group-text bg-white border fw-bold px-3"><i class="bi bi-arrow-up"></i></span>
            
            <input type="number" step="0.01" id="longitude02" name="longitude02" class="form-control text-end" placeholder="-00.000000" aria-label="Longitude02" value="{{ old("longitude02") }}">
        </div>
        
        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <div class="flex-fill">
                @error("latitude02")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="flex-fill">
                @error("longitude02")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        
        <div class="mt-4 text-center">
            @if(!session()->has("resultado"))
                <h4 class="fw-normal text-secondary">Resultado: <span class="fw-bold text-dark">0.0 Km</span></h4>
            @else
                <h4 class="fw-normal text-secondary">
                    Resultado: <span class="fw-bold text-success">{{ session("resultado") }} Km</span>
                </h4>
                
                {{ session()->forget("resultado") }}
            @endif
        </div>
        
        <div class="d-flex justify-content-center gap-3 mt-4">
            <button type="submit" id="calcular" class="btn btn-info text-white fw-semibold px-4 shadow-sm">
                <i class="bi bi-calculator-fill me-2"></i> Calcular
            </button>
            
            <button type="button" id="limpar" class="btn btn-outline-secondary fw-semibold px-4" onclick="limparCampos19()">
                <i class="bi bi-x-circle me-2"></i> Limpar
            </button>
        </div>
    </form>

    @include("layouts.footer")

    <script>
        $(document).ready(function() {
            $("#latitude01").mask("00.000000");
            $("#longitude01").mask("00.000000");
            $("#latitude02").mask("00.000000");
            $("#longitude02").mask("00.000000");
        });
    </script>
@endsection
