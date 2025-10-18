@extends("layouts.main_layout")

@section("content")
    @include("layouts.top")

    <form action="{{ route("CalcularImc") }}" method="POST" novalidate class="mx-auto" style="max-width: 600px;">
        @csrf
        
        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text"><i class="bi bi-universal-access me-1"></i>Peso</span>
            
            <input type="number" id="peso" name="peso" class="form-control text-end" placeholder="000.0" aria-label="Peso" value="{{ old("peso") }}">
            
            <span class="input-group-text bg-white border-0 fw-bold px-3">÷</span>
            
            <input type="number" id="altura" name="altura" class="form-control text-end" placeholder="0.00" aria-label="Altura" value="{{ old("altura") }}">
            
            <span class="input-group-text"><i class="bi bi-arrow-up me-1"></i>Altura</span>
        </div>
        
        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <div class="flex-fill">
                @error("peso")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="flex-fill">
                @error("altura")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        
        <div class="mt-4 text-center">
            @if(!session()->has("resultado"))
                <h5 class="fw-normal text-secondary">Classificação: <span class="fw-bold text-dark">...</span></h5>

                <h4 class="fw-normal text-secondary">Resultado: <span class="fw-bold text-dark">00.00</span></h4>
            @else
                @php

                    $resultado = session("resultado");
                    $classificacao = session("classificacao");

                @endphp

                @if($resultado < 18.5)
                    <h5 class="fw-normal text-secondary">
                        Classificação: <span class="fw-bold text-info">{{ $classificacao }}</span>
                    </h5>

                    <h4 class="fw-normal text-secondary">
                        Resultado: <span class="fw-bold text-info">{{ $resultado }}</span>
                    </h4>
                @elseif($resultado < 24.9)
                    <h5 class="fw-normal text-secondary">
                        Classificação: <span class="fw-bold text-success">{{ $classificacao }}</span>
                    </h5>

                    <h4 class="fw-normal text-secondary">
                        Resultado: <span class="fw-bold text-success">{{ $resultado }}</span>
                    </h4>
                @elseif($resultado < 29.9)
                    <h5 class="fw-normal text-secondary">
                        Classificação: <span class="fw-bold text-warning">{{ $classificacao }}</span>
                    </h5>

                    <h4 class="fw-normal text-secondary">
                        Resultado: <span class="fw-bold text-warning">{{ $resultado }}</span>
                    </h4>
                @elseif($resultado < 34.9)
                    <h5 class="fw-normal text-secondary">
                        Classificação: <span class="fw-bold text-orange">{{ $classificacao }}</span>
                    </h5>

                    <h4 class="fw-normal text-secondary">
                        Resultado: <span class="fw-bold text-orange">{{ $resultado }}</span>
                    </h4>
                @elseif($resultado < 39.9)
                    <h5 class="fw-normal text-secondary">
                        Classificação: <span class="fw-bold text-danger">{{ $classificacao }}</span>
                    </h5>

                    <h4 class="fw-normal text-secondary">
                        Resultado: <span class="fw-bold text-danger">{{ $resultado }}</span>
                    </h4>
                @else
                    <h5 class="fw-normal text-secondary">
                        Classificação: <span class="fw-bold text-danger">{{ $classificacao }}</span>
                    </h5>

                    <h4 class="fw-normal text-secondary">
                        Resultado: <span class="fw-bold text-danger">{{ $resultado }}</span>
                    </h4>
                @endif
                
                {{ session()->forget(["resultado", "classificacao"]) }}
            @endif
        </div>
        
        <div class="d-flex justify-content-center gap-3 mt-4">
            <button type="submit" id="calcular" class="btn btn-info text-white fw-semibold px-4 shadow-sm">
                <i class="bi bi-calculator-fill me-2"></i> Calcular
            </button>
            
            <button type="button" id="limpar" class="btn btn-outline-secondary fw-semibold px-4" onclick="limparCampos11()">
                <i class="bi bi-x-circle me-2"></i> Limpar
            </button>
        </div>
    </form>

    @include("layouts.footer")

    <script>
        $(document).ready(function() {
            $("#peso").mask("##0.0", { reverse: true });
            $("#altura").mask("##0.00", { reverse: true });
        });
    </script>
@endsection
