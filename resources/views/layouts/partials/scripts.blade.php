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
</script>