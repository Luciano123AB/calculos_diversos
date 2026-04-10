<nav class="bg-secondary border-bottom text-center py-5 shadow position-relative">
    <a href="{{ route("index") }}" class="btn btn-light position-absolute top-50 start-0 translate-middle-y ms-3 d-flex align-items-center gap-1 shadow-sm">
        <i class="bi bi-arrow-left-circle fs-5 mb-1"></i>
        
        <span class="d-none d-sm-inline fw-semibold">Voltar</span>
    </a>

    <h2 class="text-light mb-2 fw-light">{{ $textos["h2"] }}</h2>

    <span class="text-white fw-bold display-5">{{ $textos["span"] }}</span>
</nav>