@extends("layouts.main_layout")

@section("content")
    @include("layouts.top")

    <form action="{{ route("CalcularParcelamentoJuros") }}" method="POST" novalidate class="mx-auto" style="max-width: 900px;">
        @csrf
        
        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text"><i class="bi bi-cash-coin me-1"></i>Valor</span>
            
            <input type="number" step="0.01" id="valor" name="valor" class="form-control text-end" placeholder="000.000,00" aria-label="Valor" value="{{ old("valor") }}">
            
            <span class="input-group-text bg-white border-0 fw-bold px-3">×</span>
            
            <input type="number" id="taxa" name="taxa" class="form-control text-end" placeholder="00,0" aria-label="Taxa" value="{{ old("taxa") }}">
            
            <span class="input-group-text"><i class="bi bi-coin me-1"></i>Taxa</span>
            
            <div class="input-group-text">
                <input type="checkbox" class="form-check-input me-1" id="sem_juros">
                
                <label class="form-check-label" for="checkSemJuros">
                    S/Juros
                </label>
            </div>
            
            <span class="input-group-text bg-white border-0 border-start fw-bold px-3">÷</span>
            
            <input type="number" id="numero_meses" name="numero_meses" class="form-control text-end" placeholder="00" aria-label="NumeroMeses" value="{{ old("numero_meses") }}">
            
            <span class="input-group-text"><i class="bi bi-calendar2-date me-1"></i>Nº Meses</span>
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
                @if(session("taxa"))
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ session("taxa") }}
                    </div>
                @endif
            </div>
            
            <div class="flex-fill">
                @error("numero_meses")
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
            
            <button type="button" id="limpar" class="btn btn-outline-secondary fw-semibold px-4" onclick="limparCampos05()">
                <i class="bi bi-x-circle me-2"></i> Limpar
            </button>
        </div>
    </form>

    @include("layouts.footer")

    <script>
        $(document).ready(function() {
            $("#valor").mask("##0.00", { reverse: true });
            $("#taxa").mask("##0.0", { reverse: true });
            $("#numero_meses").mask("00");

            const sem_juros = $("#sem_juros");
            const taxa = $("#taxa");

            function aplicarMascara() {
                if (sem_juros.is(":checked")) {
                    taxa.val("");
                    taxa.prop("disabled", true);
                } else {
                    taxa.prop("disabled", false);
                }
            }

            sem_juros.change(function() {
                aplicarMascara();
            });

            aplicarMascara();
        });
    </script>
@endsection
