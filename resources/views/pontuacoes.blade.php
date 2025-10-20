@extends("layouts.main_layout")

@section("content")
    @include("layouts.top")

    <form action="{{ route("CalcularPontuacoes") }}" method="POST" novalidate class="mx-auto" style="max-width: 600px;">
        @csrf
        
        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text"><i class="bi bi-check2-circle me-1"></i>Acertos</span>
            
            <input type="number" step="0.01" id="acertos" name="acertos" class="form-control text-end" placeholder="00" aria-label="Acertos" value="{{ old("acertos") }}">
            
            <span class="input-group-text bg-white border-0 fw-bold px-3"><i class="bi bi-arrow-right me-1"></i></span>
            
            <input type="number" id="total_questoes" name="total_questoes" class="form-control text-end" placeholder="00" aria-label="TotalQuestoes" value="{{ old("total_questoes") }}">
            
            <span class="input-group-text"><i class="bi bi-check2-all me-1"></i>T/Questões.</span>
        </div>
        
        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <div class="flex-fill">
                @error("acertos")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="flex-fill">
                @error("total")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        
        <div class="mt-4 text-center">
            @if(!session()->has("pontos") && !session()->has("total"))
                <h5 class="fw-normal text-secondary">
                    Pontos máximo: <span class="fw-bold text-dark">000.0</span>
                </h5>

                <h4 class="fw-normal text-secondary">Pontos obtidos: <span class="fw-bold text-dark">00.0</span></h4>
            @else
                <h5 class="fw-normal text-secondary">
                    Pontos máximo: <span class="fw-bold text-success">{{ session("total") }}</span>
                </h5>

                <h4 class="fw-normal text-secondary">
                    Pontos obtidos: <span class="fw-bold text-success">{{ session("pontos") }}</span>
                </h4>
                
                {{ session()->forget(["pontos", "total"]) }}
            @endif
        </div>
        
        <div class="d-flex justify-content-center gap-3 mt-4">
            <button type="submit" id="calcular" class="btn btn-info text-white fw-semibold px-4 shadow-sm">
                <i class="bi bi-calculator-fill me-2"></i> Calcular
            </button>
            
            <button type="button" id="limpar" class="btn btn-outline-secondary fw-semibold px-4" onclick="limparCampos17()">
                <i class="bi bi-x-circle me-2"></i> Limpar
            </button>
        </div>
    </form>

    @include("layouts.footer")
@endsection
