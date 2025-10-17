@extends("layouts.main_layout")

@section("content")
    <nav class="bg-secondary text-center py-5 shadow-sm position-relative">
        <a href="{{ route("Index") }}" class="btn btn-light position-absolute top-50 start-0 translate-middle-y ms-3 d-flex align-items-center gap-1 shadow-sm">
            <i class="bi bi-arrow-left-circle fs-5 mb-1"></i>
            
            <span class="d-none d-sm-inline fw-semibold">Voltar</span>
        </a>

        <h2 class="text-light mb-2 fw-light">{{ $textos["h2"] }}</h2>

        <span class="text-white fw-bold display-5">{{ $textos["span"] }}</span>
    </nav>

    <div class="container my-5">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header bg-info text-white text-center py-4">
                <h3 class="fw-bold mb-1">Validação</h3>

                <h5 class="fw-light mb-0">Insira os dados abaixo para obter {{ $textos["h5"] }}</h5>
            </div>

            <div class="card-body bg-light p-5">

    <form action="{{ route("CalcularValidacao") }}" method="POST" novalidate class="mx-auto" style="max-width: 600px;">
        @csrf
                    
        <div class="input-group input-group-lg mb-3">
            <span class="input-group-text"><i class="bi bi-file-earmark-medical me-1"></i>Dado</span>
                        
            <input type="text" id="dado" name="dado" class="form-control text-end" placeholder="..." aria-label="Dado" value="{{ old("dado") }}">
                    
            <select id="dados" name="dados" class="form-select" aria-label="Dados">
                <option selected>Selecione o dado</option>
                <option value="cpf" {{ old("cpf") == "CPF" ? "selected" : "" }}>CPF</option>
                <option value="cnpj" {{ old("cnpj") == "CNPJ" ? "selected" : "" }}>CNPJ</option>
                <option value="idade" {{ old("idade") == "Idade" ? "selected" : "" }}>Idade</option>
            </select>

            <span class="input-group-text"><i class="bi bi-percent me-1"></i>Juros</span>
        </div>
        
        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <div class="flex-fill">
                @error("dado")
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
                @if(session("resultado") == "CPF Inválido" || session("resultado") == "CNPJ Inválido" || session("resultado") == "Menor de idade")
                    <h4 class="fw-normal text-secondary">
                        Resultado: <span class="fw-bold text-danger">{{ session("resultado") }}</span>
                    </h4>

                    {{ session()->forget("resultado") }}
                @else
                    <h4 class="fw-normal text-secondary">
                        Resultado: <span class="fw-bold text-success">{{ session("resultado") }}</span>
                    </h4>

                    {{ session()->forget("resultado") }}
                @endif
            @endif
        </div>
                    
        <div class="d-flex justify-content-center gap-3 mt-4">
            <button type="submit" id="calcular" class="btn btn-info text-white fw-semibold px-4 shadow-sm">
                <i class="bi bi-calculator-fill me-2"></i> Validar
            </button>
                        
            <button type="button" id="limpar" class="btn btn-outline-secondary fw-semibold px-4" onclick="limparCampos01()">
                <i class="bi bi-x-circle me-2"></i> Limpar
            </button>
        </div>
    </form>

    @include("layouts.footer")

    <script>
        $(function() {

            const $dados = $("#dados");
            const $dado = $("#dado");

            function atualizarMascara() {

                const dado_escolhido = $dados.val();

                if (!dado_escolhido || dado_escolhido === "Selecione o dado") {
                    if (typeof $dado.unmask === "function") {
                        $dado.unmask();
                    }

                    $dado.prop("disabled", true).val("");

                    return;
                }

                $dado.prop("disabled", false).val("");

                if (typeof $dado.unmask === "function") {
                    $dado.unmask();
                }

                if (dado_escolhido === "cpf") {
                    if (typeof $dado.mask === "function") {
                        $dado.mask("000.000.000-00");
                    }
                } else if (dado_escolhido === "cnpj") {
                    if (typeof $dado.mask === "function") {
                        $dado.mask("00.000.000/0000-00");
                    }
                } else if (dado_escolhido === "idade") {
                    if (typeof $dado.mask === "function") {
                        $dado.mask("000");
                    }
                }
            }

            $dados.on("change", atualizarMascara);

            atualizarMascara();
        });
    </script>
@endsection
