<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="container" class="container text-center">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table id="tabela" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <td>Tipo</td>
                    <td>Nome/Razão Social</td>
                    <td>Apelido/Nome Fantasia</td>
                    <td>CPF/CNPJ</td>
                    <td>Email</td>
                    <td>Telefone</td>
                    <td>Endereço</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $registro) { ?>
                    <tr>
                        
                        <td><?php echo $registro->tipo; ?></td>
                        <td><?php echo $registro->nome; ?></td>
                        <td><?php echo $registro->apelido; ?></td>
                        <td><?php echo $registro->documento; ?></td>
                        <td><?php echo $registro->email; ?></td>
                        <td><?php echo $registro->telefone; ?></td>
                        <td><?php echo $registro->cep; ?></td>
                        <td><a href="<?php echo site_url('pessoa/cadastro/'.$registro->id);?>">Editar</a></td>
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


