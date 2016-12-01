<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <div class="text-center">
        <h3>Relatórios Gerais</h3>
    </div>

    <div class="text-danger text-center	">
        <?php
        if (@$erro) {
            echo $erro;
        }
        ?>
    </div>

    <br>
<?php echo form_open('movimentacoes/buscaregistros'); ?>
    <div class="form-group row">
        <label for="datainicio" class="col-md-2 col-form-label">Período de busca</label>
        <div class="col-md-3">
            <input type="text" class="form-control" name="datainicio"
                   id="datainicio" placeholder="Dia Inicial" />
        </div>
        <div class="col-md-3">
            <input type="data" class="form-control" name="datafim" id="datafim"
                   placeholder="Dia final" />
        </div>
    </div>
    <div class="form-group row">
        <label for="nome" class="col-md-2 col-form-label text-left">Cliente/Fornecedor</label>
        <div class="col-md-4">
            <input type="text" class="form-control auto" name="nome" id="nome"
                   placeholder="Cliente ou fornecedor" />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2">Tipos de movimentações: </label>
        <div class="col-sm-2">
            <div class="form-check">
                <label for="entrada" class="form-check-label"> <input
                        class="form-check-input" type="checkbox" name="entrada"
                        id="entrada"> Entradas </label>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-check">
                <label for="saida" class="form-check-label"> <input
                        class="form-check-input" type="checkbox" name="saida" id="saida">
                    Saídas </label>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>

<?php echo form_close(); ?>
</div>


<script type="text/javascript">
    $(function () {
        $('#datainicio').datepicker({
            format: "dd/mm/yyyy",
            language: 'pt-BR',
            autoclose: true,
        });
        $('#datafim').datepicker({
            format: "dd/mm/yyyy",
            language: 'pt-BR',
            autoclose: true,
        });
        $(".auto").autocomplete({
            source: "<?php echo site_url('pessoa/busca') ?>",
            minLength: 1
        });
    });
</script>
