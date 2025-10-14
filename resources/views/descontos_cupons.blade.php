@extends("layouts.main_layout")

@section("content")
    @include("layouts.top")
    
    <form action="{{ route("CalcularDescontosCupons") }}" method="POST" novalidate class="mx-auto" style="max-width: 600px;">
        @csrf

        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text"><i class="bi bi-cash-coin me-1"></i>Valor</span>

            <input type="number" step="0.01" id="valor" name="valor" class="form-control text-end" placeholder="0.000,00" aria-label="Valor" value="{{ old("valor") }}">

            <span class="input-group-text bg-white border-0 fw-bold px-3">-</span>

            <input type="number" id="desconto" name="desconto" class="form-control text-end" placeholder="000.0" aria-label="Desconto" min="0" max="100" step="0.1" value="{{ old("desconto") }}">

            <span class="input-group-text"><i class="bi bi-percent me-1"></i>Desconto</span>

            <div class="input-group-text">
                <input type="checkbox" class="form-check-input me-1" id="fixo">
                            
                <label class="form-check-label" for="checkFixo">
                    Fixo
                </label>
            </div>
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
                @error("desconto")
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

            <button type="button" id="limpar" class="btn btn-outline-secondary fw-semibold px-4" onclick="limparCampos02()">
                <i class="bi bi-x-circle me-2"></i> Limpar
            </button>
        </div>
    </form>

    @include("layouts.footer")

    <script>
        $(document).ready(function() {
            $("#valor").mask("##0.00", { reverse: true });

            const fixo = $("#fixo");
            const desconto = $("#desconto");

            aplicarMascara();

            fixo.change(function() {
                aplicarMascara();
            });

            function aplicarMascara() {
                desconto.unmask();

                if (fixo.is(":checked")) {
                    desconto.mask("000");
                } else {
                    desconto.mask("##0.0", { reverse: true });
                }
            }        
        });
    </script>
@endsection
