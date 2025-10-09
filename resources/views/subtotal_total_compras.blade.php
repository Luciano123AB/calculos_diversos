@extends("layouts.main_layout")

@section("content")
    <nav class="bg-secondary text-center py-5 shadow">
        <h2 class="text-light mb-3">Subtotal e</h2>

        <span class="text-white fw-bold display-5">Total de Compras</span>
    </nav>

    <div class="container my-5">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header bg-info text-white text-center py-4">
                <h3 class="fw-bold mb-1">Cálculo</h3>

                <h5 class="fw-light mb-0">Insira os valores nos campos abaixo</h5>
            </div>

            <div class="card-body bg-light">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                            <form action="{{ route("CalcularSubtotalTotalCompras") }}" method="POST" novalidate>
                                @csrf
                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Valor 1:</span>
    
                                    <input type="number" class="form-control" name="valor01" placeholder="..." aria-label="valor01">
                                    
                                    <span class="input-group-text">X</span>
                                    
                                    <input type="number" class="form-control text-end" name="valor2" placeholder="..." aria-label="valor2">
                                    
                                    <span class="input-group-text">:2 Valor</span>
                                </div>

                                <div class="my-3">
                                    <label>Resultado: {{ session("resultado") }}</label>
                                </div>
    
                                <div class="row row-cols-2">
                                    <div class="col">
                                        <button type="submit" id="calcular" class="btn btn-info w-50">Calcular</button>
                                    </div>
    
                                    <div class="col">
                                        <button type="button" id="limpar" class="btn btn-secondary w-50" onclick="limparCampos()">Limpar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="card-footer bg-info text-white text-center py-3">
                <small>© {{ date('Y') }} Cálculos Diversos - Todos os direitos reservados.</small>
            </footer>
        </div>
    </div>
@endsection
