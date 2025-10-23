@extends("layouts.main_layout")

@section("content")
    @include("layouts.top")

    <form action="{{ route("CalcularFisicos") }}" method="POST" novalidate class="mx-auto" style="max-width: 600px;">
        @csrf
        
        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text"><i class="bi bi-123 me-1"></i>Qtd.</span>
            
            <input type="number" id="quantidade" name="quantidade" class="form-control text-end" placeholder="000" aria-label="Quantidade" value="{{ old("quantidade") }}">
            
            <span class="input-group-text bg-white border-0 fw-bold px-3">÷</span>
            
            <input type="number" id="tempo" name="tempo" class="form-control text-end" placeholder="00" aria-label="Tempo" value="{{ old("tempo") }}">
            
            <span class="input-group-text"><i class="bi bi-clock me-1"></i>Tempo(Hr)</span>

            <div class="input-group-text">
                <input type="checkbox" class="form-check-input me-1" id="consumo" name="consumo">
                            
                <label class="form-check-label" for="consumo">
                    Consumo
                </label>
            </div>
        </div>
        
        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <div class="flex-fill">
                @error("quantidade")
                    <div class="alert alert-danger py-2 mb-3" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="flex-fill">
                @error("tempo")
                    <div class="alert alert-danger py-2 mb-3" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text"><i class="bi bi-rulers me-1"></i>Distância</span>
            
            <input type="number" step="0.1" id="distancia" name="distancia" class="form-control text-end" placeholder="0000.0" aria-label="Distancia" value="{{ old("distancia") }}">
            
            <span class="input-group-text bg-white border-0 fw-bold px-3">÷</span>
            
            <input type="number" id="litros" name="litros" class="form-control text-end" placeholder="00" aria-label="Litros" value="{{ old("litros") }}">
            
            <span class="input-group-text"><i class="bi bi-fuel-pump me-1"></i>Litros</span>

            <div class="input-group-text">
                <input type="checkbox" class="form-check-input me-1" id="eficiencia" name="eficiencia">
                            
                <label class="form-check-label" for="eficiencia">
                    Eficiência
                </label>
            </div>
        </div>
        
        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <div class="flex-fill">
                @error("distancia")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="flex-fill">
                @error("litros")
                    <div class="alert alert-danger py-2 mb-0" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="flex-fill">
            @if(session("escolha"))
                <div class="alert alert-danger py-2 mb-3" role="alert">
                    <i class="bi bi-exclamation-circle-fill me-1"></i> {{ session("escolha") }}
                </div>
            @endif
        </div>
        
        <div class="mt-4 text-center">
            @if(!session()->has("consumo") && !session()->has("eficiencia"))
                <h4 class="fw-normal text-secondary">Resultado: <span class="fw-bold text-dark">0,00</span></h4>
            @else
                @if(session("consumo"))
                    <h4 class="fw-normal text-secondary">
                        Resultado: <span class="fw-bold text-success">{{ session("consumo") }} unidades/hora</span>
                    </h4>
                    
                    {{ session()->forget("consumo") }}
                @elseif(session("eficiencia"))
                    <h4 class="fw-normal text-secondary">
                        Resultado: <span class="fw-bold text-success">{{ session("eficiencia") }} km/L</span>
                    </h4>
                    
                    {{ session()->forget("eficiencia") }}
                @endif
            @endif
        </div>
        
        <div class="d-flex justify-content-center gap-3 mt-4">
            <button type="submit" id="calcular" class="btn btn-info text-white fw-semibold px-4 shadow-sm">
                <i class="bi bi-calculator-fill me-2"></i> Calcular
            </button>
            
            <button type="button" id="limpar" class="btn btn-outline-secondary fw-semibold px-4" onclick="limparCampos20()">
                <i class="bi bi-x-circle me-2"></i> Limpar
            </button>
        </div>
    </form>

    @include("layouts.footer")

    <script>
        $(document).ready(function() {
            
            const consumo = $("#consumo");
            const eficiencia = $("#eficiencia");
            const quantidade = $("#quantidade");
            const tempo = $("#tempo");
            const distancia = $("#distancia");
            const litros = $("#litros");
            
            function aplicarMascaraConsumo() {
                if (consumo.is(":checked")) {
                    if (eficiencia.is(":checked")) {
                        eficiencia.prop("checked", false);
                        distancia.val("");
                        distancia.prop("disabled", true);
                        try { distancia.unmask(); } catch(e) {}
                        litros.val("");
                        litros.prop("disabled", true);
                        try { litros.unmask(); } catch(e) {}
                    }

                    quantidade.prop("disabled", false);
                    quantidade.mask("##0", { reverse: true });
                    tempo.prop("disabled", false);
                    tempo.mask("##0", { reverse: true });
                } else {
                    quantidade.val("");
                    quantidade.prop("disabled", true);
                    try { quantidade.unmask(); } catch(e) {}
                    tempo.val("");
                    tempo.prop("disabled", true);
                    try { tempo.unmask(); } catch(e) {}
                }
            }

            function aplicarMascaraEficiencia() {
                if (eficiencia.is(":checked")) {
                    if (consumo.is(":checked")) {
                        consumo.prop("checked", false);
                        quantidade.val("");
                        quantidade.prop("disabled", true);
                        try { quantidade.unmask(); } catch(e) {}
                        tempo.val("");
                        tempo.prop("disabled", true);
                        try { tempo.unmask(); } catch(e) {}
                    }

                    distancia.prop("disabled", false);
                    distancia.mask("##0.0", { reverse: true });
                    litros.prop("disabled", false);
                    litros.mask("##0", { reverse: true });
                } else {
                    distancia.val("");
                    distancia.prop("disabled", true);
                    try { distancia.unmask(); } catch(e) {}
                    litros.val("");
                    litros.prop("disabled", true);
                    try { litros.unmask(); } catch(e) {}
                }
            }

            consumo.change(function() {
                aplicarMascaraConsumo();
            });

            eficiencia.change(function() {
                aplicarMascaraEficiencia();
            });

            aplicarMascaraConsumo();
            aplicarMascaraEficiencia();
        });
    </script>
@endsection
