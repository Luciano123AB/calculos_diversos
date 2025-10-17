<script>
    function limparCampos01() {
        document.getElementById("valor").value = "";
        document.getElementById("quantidade").value = "";
    }

    function limparCampos02() {
        document.getElementById("valor").value = "";
        document.getElementById("desconto").value = "";
    }

    function limparCampos03() {
        document.getElementById("valor_km").value = "";
        document.getElementById("distancia").value = "";
    }

    function limparCampos04() {
        document.getElementById("valor").value = "";
        document.getElementById("taxa").value = "";
    }

    function limparCampos05() {
        document.getElementById("valor").value = "";
        document.getElementById("taxa").value = "";
        document.getElementById("numero_meses").value = "";
    }

    function limparCampos06() {
        document.getElementById("valor").value = "";

        var moeda = document.getElementById("moeda");

        if (moeda) {

            moeda.selectedIndex = 0;
            
        }
    }

    function limparCampos07() {
        document.getElementById("valor").value = "";

        var juros = document.getElementById("juros");

        if (juros) {

            juros.selectedIndex = 0;
            
        }

        document.getElementById("taxa").value = "";
        document.getElementById("tempo").value = "";
    }

    function limparCampos08() {
        document.getElementById("valor").value = "";
        document.getElementById("taxa").value = "";
    }

    function limparCampos09() {
        document.getElementById("receita").value = "";
        document.getElementById("despesa").value = "";
    }

    function limparCampos10() {

        var dado = document.getElementById("dado");
        var dados = document.getElementById("dados");
        
        dado.value = "";
        dado.disabled = true;

        if (dados) {

            dados.selectedIndex = 0;
            
        }
    }
</script>