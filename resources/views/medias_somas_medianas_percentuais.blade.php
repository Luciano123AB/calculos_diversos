@extends("layouts.main_layout")

@section("content")
    @include("layouts.header")

    <form action="{{ route("calcular.medias.somas.medianas.percentuais") }}" method="POST" novalidate class="mx-auto" style="max-width: 600px;">
        @csrf
        
        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text"><i class="bi bi-pen me-1"></i>Notas</span>
            
            <input type="number" step="0.1" id="nota01" name="nota01" class="form-control text-end" placeholder="0.0" aria-label="Nota01" value="{{ old("nota01") }}">
            
            <input type="number" step="0.1" id="nota02" name="nota02" class="form-control text-end" placeholder="0.0" aria-label="Nota02" value="{{ old("nota02") }}">

            <input type="number" step="0.1" id="nota03" name="nota03" class="form-control text-end" placeholder="0.0" aria-label="Nota03" value="{{ old("nota03") }}">
        
            <div class="input-group-text">
                <input type="checkbox" class="form-check-input me-1" id="media" name="media">
                            
                <label class="form-check-label" for="media">
                    Média
                </label>
            </div>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <div class="flex-fill">
                @error("nota01")
                    <div class="alert alert-danger py-2 mb-3" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="flex-fill">
                @error("nota02")
                    <div class="alert alert-danger py-2 mb-3" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex-fill">
                @error("nota03")
                    <div class="alert alert-danger py-2 mb-3" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="input-group input-group-lg">
            <span class="input-group-text"><i class="bi bi-1-circle me-1"></i>Números</span>
            
            <input type="number" id="numero01" name="numero01" class="form-control text-end" placeholder="000" aria-label="Numero01" value="{{ old("numero01") }}">
            
            <input type="number" id="numero02" name="numero02" class="form-control text-end" placeholder="000" aria-label="Numero02" value="{{ old("numero02") }}">

            <input type="number" id="numero03" name="numero03" class="form-control text-end" placeholder="000" aria-label="Numero03" value="{{ old("numero03") }}">
        
            <input type="number" id="numero04" name="numero04" class="form-control text-end" placeholder="000" aria-label="Numero04" value="{{ old("numero04") }}">
            
            <div class="input-group-text">
                <input type="checkbox" class="form-check-input me-1" id="mediana" name="mediana">
                            
                <label class="form-check-label" for="mediana">
                    Mediana
                </label>
            </div>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between gap-2 mb-3">
            <div class="flex-fill">
                @error("numero01")
                    <div class="alert alert-danger py-2 my-3" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="flex-fill">
                @error("numero02")
                    <div class="alert alert-danger py-2 my-3" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex-fill">
                @error("numero03")
                    <div class="alert alert-danger py-2 my-3" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex-fill">
                @error("numero04")
                    <div class="alert alert-danger py-2 my-3" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text"><i class="bi bi-person-standing me-1"></i>Presentes/T</span>
            
            <input type="number" id="quantidade" name="quantidade" class="form-control text-end" placeholder="0" aria-label="Quantidade" value="{{ old("quantidade") }}">
            
            <input type="number" id="total" name="total" class="form-control text-end" placeholder="0" aria-label="Total" value="{{ old("total") }}">
        
            <div class="input-group-text">
                <input type="checkbox" class="form-check-input me-1" id="percentual" name="percentual">
                            
                <label class="form-check-label" for="percentual">
                    Percentual
                </label>
            </div>
        </div>
        
        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <div class="flex-fill">
                @error("quantidade")
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


        <div class="flex-fill">
            @if(session("escolha"))
                <div class="alert alert-danger py-2 mb-0" role="alert">
                    <i class="bi bi-exclamation-circle-fill me-1"></i> {{ session("escolha") }}
                </div>
            @endif
        </div>
        
        <div class="mt-4 text-center">
            @if(session()->has("resultado_media"))
                @php

                    $media = session("resultado_media");

                @endphp

                @if($media <= 6.0)
                    <h5 class="fw-normal text-secondary">Situação: <span class="fw-bold text-danger">REPROVADO!</span></h5>
                    
                    <h4 class="fw-normal text-secondary">
                        Resultado: <span class="fw-bold text-danger">{{ $media }}</span>
                    </h4>
                    
                    {{ session()->forget("resultado_media") }}
                @elseif($media > 6.0 && $media < 7.0)
                    <h5 class="fw-normal text-secondary">Situação: <span class="fw-bold text-warning">EM EXAME!</span></h5>
                    
                    <h4 class="fw-normal text-secondary">
                        Resultado: <span class="fw-bold text-warning">{{ $media }}</span>
                    </h4>
                    
                    {{ session()->forget("resultado_media") }}
                @else
                    <h5 class="fw-normal text-secondary">Situação: <span class="fw-bold text-success">APROVADO!</span></h5>
                    
                    <h4 class="fw-normal text-secondary">
                        Resultado: <span class="fw-bold text-success">{{ $media }}</span>
                    </h4>
                    
                    {{ session()->forget("resultado_media") }}
                @endif
            @elseif(session("resultado_mediana"))
                @php

                    $mediana = session("resultado_mediana");

                @endphp

                <h4 class="fw-normal text-secondary">
                    Resultado: <span class="fw-bold text-success">{{ $mediana }}</span>
                </h4>
                    
                {{ session()->forget("resultado_mediana") }}
            @elseif(session()->has("resultado_percentual"))
                @php

                    $percentual = session("resultado_percentual");

                @endphp

                <h4 class="fw-normal text-secondary">
                    Resultado: <span class="fw-bold text-success">{{ $percentual }}%</span>
                </h4>
                    
                {{ session()->forget("resultado_percentual") }}
            @else
                <h5 class="fw-normal text-secondary">Situação: <span class="fw-bold text-dark">...</span></h5>

                <h4 class="fw-normal text-secondary">Resultado: <span class="fw-bold text-dark">0.0</span></h4>
            @endif
        </div>
        
        <div class="d-flex justify-content-center gap-3 mt-4">
            <button type="submit" id="calcular" class="btn btn-info text-white fw-semibold px-4 shadow-sm">
                <i class="bi bi-calculator-fill me-2"></i> Calcular
            </button>
            
            <button type="button" id="limpar" class="btn btn-outline-secondary fw-semibold px-4" onclick="limparCampos13()">
                <i class="bi bi-x-circle me-2"></i> Limpar
            </button>
        </div>
    </form>

    @include("layouts.footer")

    <script>
        $(document).ready(function() {
            
            const media = $("#media");
            const percentual = $("#percentual");
            const mediana = $("#mediana");
            const nota01 = $("#nota01");
            const nota02 = $("#nota02");
            const nota03 = $("#nota03");
            const quantidade = $("#quantidade");
            const total = $("#total");
            const numero01 = $("#numero01");
            const numero02 = $("#numero02");
            const numero03 = $("#numero03");
            const numero04 = $("#numero04");
            
            function aplicarMascaraMedia() {
                if (media.is(":checked")) {
                    if (percentual.is(":checked")) {
                        percentual.prop("checked", false);
                        quantidade.val("");
                        quantidade.prop("disabled", true);
                        total.val("");
                        total.prop("disabled", true);
                    }

                    if (mediana.is(":checked")) {
                        mediana.prop("checked", false);
                        numero01.val("");
                        numero01.prop("disabled", true);
                        try { numero01.unmask(); } catch(e) {}
                        numero02.val("");
                        numero02.prop("disabled", true);
                        try { numero02.unmask(); } catch(e) {}
                        numero03.val("");
                        numero03.prop("disabled", true);
                        try { numero03.unmask(); } catch(e) {}
                        numero04.val("");
                        numero04.prop("disabled", true);
                        try { numero04.unmask(); } catch(e) {}
                    }

                    nota01.prop("disabled", false);
                    nota01.mask("##0.0", { reverse: true });
                    nota02.prop("disabled", false);
                    nota02.mask("##0.0", { reverse: true });
                    nota03.prop("disabled", false);
                    nota03.mask("##0.0", { reverse: true });
                } else {
                    nota01.val("");
                    nota01.prop("disabled", true);
                    try { nota01.unmask(); } catch(e) {}
                    nota02.val("");
                    nota02.prop("disabled", true);
                    try { nota02.unmask(); } catch(e) {}
                    nota03.val("");
                    nota03.prop("disabled", true);
                    try { nota03.unmask(); } catch(e) {}
                }
            }

            function aplicarMascaraMediana() {
                if (mediana.is(":checked")) {
                    if (media.is(":checked")) {
                        media.prop("checked", false);
                        nota01.val("");
                        nota01.prop("disabled", true);
                        try { nota01.unmask(); } catch(e) {}
                        nota02.val("");
                        nota02.prop("disabled", true);
                        try { nota02.unmask(); } catch(e) {}
                        nota03.val("");
                        nota03.prop("disabled", true);
                        try { nota03.unmask(); } catch(e) {}
                    }

                    if (percentual.is(":checked")) {
                        percentual.prop("checked", false);
                        quantidade.val("");
                        quantidade.prop("disabled", true);
                        total.val("");
                        total.prop("disabled", true);
                    }

                    numero01.prop("disabled", false);
                    numero01.mask("##0", { reverse: true });
                    numero02.prop("disabled", false);
                    numero02.mask("##0", { reverse: true });
                    numero03.prop("disabled", false);
                    numero03.mask("##0", { reverse: true });
                    numero04.prop("disabled", false);
                    numero04.mask("##0", { reverse: true });
                } else {
                    numero01.val("");
                    numero01.prop("disabled", true);
                    try { numero01.unmask(); } catch(e) {}
                    numero02.val("");
                    numero02.prop("disabled", true);
                    try { numero02.unmask(); } catch(e) {}
                    numero03.val("");
                    numero03.prop("disabled", true);
                    try { numero03.unmask(); } catch(e) {}
                    numero04.val("");
                    numero04.prop("disabled", true);
                    try { numero04.unmask(); } catch(e) {}
                }
            }
            
            function aplicarMascaraPercentual() {
                if (percentual.is(":checked")) {
                    if (media.is(":checked")) {
                        media.prop("checked", false);
                        nota01.val("");
                        nota01.prop("disabled", true);
                        try { nota01.unmask(); } catch(e) {}
                        nota02.val("");
                        nota02.prop("disabled", true);
                        try { nota02.unmask(); } catch(e) {}
                        nota03.val("");
                        nota03.prop("disabled", true);
                        try { nota03.unmask(); } catch(e) {}
                    }

                    if (mediana.is(":checked")) {
                        mediana.prop("checked", false);
                        numero01.val("");
                        numero01.prop("disabled", true);
                        try { numero01.unmask(); } catch(e) {}
                        numero02.val("");
                        numero02.prop("disabled", true);
                        try { numero02.unmask(); } catch(e) {}
                        numero03.val("");
                        numero03.prop("disabled", true);
                        try { numero03.unmask(); } catch(e) {}
                        numero04.val("");
                        numero04.prop("disabled", true);
                        try { numero04.unmask(); } catch(e) {}
                    }

                    quantidade.prop("disabled", false);
                    total.prop("disabled", false);
                } else {
                    quantidade.val("");
                    quantidade.prop("disabled", true);
                    total.val("");
                    total.prop("disabled", true);
                }
            }            

            media.change(function() {
                aplicarMascaraMedia();
            });

            mediana.change(function() {
                aplicarMascaraMediana();
            });

            percentual.change(function() {
                aplicarMascaraPercentual();
            });

            aplicarMascaraMedia();
            aplicarMascaraMediana();
            aplicarMascaraPercentual();
        });
    </script>
@endsection
