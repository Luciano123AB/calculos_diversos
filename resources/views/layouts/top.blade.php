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
                <h3 class="fw-bold mb-1">Cálculo</h3>

                <h5 class="fw-light mb-0">Insira os valores abaixo para obter {{ $textos["h5"] }}</h5>
            </div>

            <div class="card-body bg-light p-5">