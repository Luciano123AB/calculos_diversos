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

    function limparCampos11() {
        document.getElementById("peso").value = "";
        document.getElementById("altura").value = "";
    }

    function limparCampos12() {

        var valor = document.getElementById("valor");
        var escolha = document.getElementById("escolha");

        valor.value = "";
        valor.disabled = true;
        
        if (escolha) {

            escolha.selectedIndex = 0;
            
        }
    }

    function limparCampos13() {

        var nota01 = document.getElementById("nota01");
        var nota02 = document.getElementById("nota02");
        var nota03 = document.getElementById("nota03");
        var numero01 = document.getElementById("numero01");
        var numero2 = document.getElementById("numero02");
        var numero3 = document.getElementById("numero03");
        var numero4 = document.getElementById("numero04");
        var media = document.getElementById("media");
        var mediana = document.getElementById("mediana");
        var percentual = document.getElementById("percentual");

        if (media) {

            nota01.value = "";
            nota01.disabled = true;
            nota02.value = "";
            nota02.disabled = true;
            nota03.value = "";
            nota03.disabled = true;
            media.checked = false;

        }

        if (mediana) {

            numero01.value = "";
            numero01.disabled = true;
            numero2.value = "";
            numero2.disabled = true;
            numero3.value = "";
            numero3.disabled = true;
            numero4.value = "";
            numero4.disabled = true;
            mediana.checked = false;

        }

        if (percentual) {

            quantidade.value = "";
            quantidade.disabled = true;
            total.value = "";
            total.disabled = true;
            percentual.checked = false;

        }
    }

    function limparCampos14() {
        document.getElementById("permitidos").value = "";
        document.getElementById("negados").value = "";
    }

    function limparCampos15() {
        document.getElementById("venda01").value = "";
        document.getElementById("venda02").value = "";
        document.getElementById("venda03").value = "";
        document.getElementById("venda04").value = "";
    }
</script>