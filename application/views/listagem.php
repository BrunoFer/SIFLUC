<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="container" class="container text-center">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table id="tabela" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <td>Data</td>
                    <?php if (@$lista[0]->cliente) { ?>
                        <td>Cliente</td>
                    <?php } else { ?>
                        <td>Fornecedor</td>
                    <?php } ?>
                    <td>Comentário</td>
                    <td>Valor (R$)</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $registro) { ?>
                    <tr>
                        <td><?php echo date('d/m/Y h:i', strtotime($registro->data)); ?></td>
                        <td><?php echo $registro->nome; ?></td>
                        <td><?php echo $registro->comentario; ?></td>
                        <td><?php echo number_format($registro->valor, 2, ',', '.'); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-1"></div>
</div>

<script type="text/javascript">
    $(function () {
        $('#tabela').DataTable({
            "oLanguage": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ Resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });
    });
</script>
