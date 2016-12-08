<?php $url_site = base_url(); ?>

<div id="container" class="container text-center">

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <div id="my-chart" style="height: 400px;"></div>
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-4">
            <p class="text-center">Maiores Clientes no mês</p>
            <?php foreach ($maioresclientes as $cliente) { ?>
                <div class="row">
                    <div class="col-md-8 text-left">
                        <?php echo $cliente->nome ?>        
                    </div>
                    <div class="col-md-4 text-right">
                        R$ <?php echo number_format($cliente->soma, 2, ',', '.'); ?>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="col-md-4">
            <p class="text-center">Maiores fornecedores no mês</p>
            <?php foreach ($maioresfornecedores as $fornecedores) { ?>
                <div class="row">
                    <div class="col-md-8 text-left">
                        <?php echo $fornecedores->nome ?>        
                    </div>
                    <div class="col-md-4 text-right">
                        R$ <?php echo number_format($fornecedores->soma, 2, ',', '.'); ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-md-2"></div>

    </div>

</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        //Recupera a URL atual e complementa para que seja possível
        //obter os dados para montagem do gráfico
        var url_data = "<?php echo $url_site; ?>" + "movimentacoes/dadosgrafico";
        //Define a variável que irá receber as tarefas a serem exibidas no gráfico
        var movimentos;
        //Define a variável que irá receber as opções de configuração do gráfico
        var options;

        //Requisição AJAX ao servidor para obtenção dos dados
        $.ajax({
            type: 'GET',
            url: url_data,
            dataType: 'json',
            success: function (data) {
                movimentos = json2array(data.movimentos);
                options = data.opcoes;
            },
            error: function () {
                alert("Ocorreu um erro ao processar a solicitação.");
            }
        });

        //Define qual é o pacote de gráficos que será utilizado
        google.charts.load('current', {'packages': ['corechart']});

        //Operações executadas ao iniciar o processamento da biblioteca
        google.charts.setOnLoadCallback(function () {
            //Formata os dados para o padrão de exibição do gráfico
            data = google.visualization.arrayToDataTable(movimentos);

            var formatter = new google.visualization.NumberFormat({decimalSymbol: ',', groupingSymbol: '.', negativeColor: 'red', negativeParens: true, prefix: 'R$ '});
            formatter.format(data, 1);

            //Estrutura o gráfico para exibição
            var chart = new google.visualization.PieChart(document.getElementById('my-chart'));

            //Exibe o gráfico na tela
            chart.draw(data, options);
        });

    });

    //Função para converter o json para array no padrão da biblioteca Google Charts
    function json2array(json_data) {
        var result = [];
        for (var i in json_data)
            result.push([i, json_data[i]]);

        return result;
    }
</script>


