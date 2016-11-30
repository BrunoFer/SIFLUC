<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container" id="container">

<?php echo form_open('movimentacoes/enviaentrada'); ?>

	<div class="col-md-4"></div>
	<div class="col-md-4">
		<h3 class="text-center">Registrar uma entrada</h3>
		<div class="text-center text-danger">
		<?php echo validation_errors(); ?>
		</div>
		<div class="form-group">
			<label for="data">Data</label> <input type="data"
				class="form-control" name="data" id="data"
				placeholder="Data do registro"> <small id="dataAjuda"
				class="form-text text-muted">Se a data não for inserida, a data
				atual será registrada.</small>
		</div>
		<div class="form-group">
			<label for="valor">Valor da entrada</label> <input type="number"
				class="form-control" id="valor" name="valor" step="0.01" placeholder="Valor">
		</div>
		<div class="form-group">
			<label for="cliente">Cliente</label> <input type="text"
				class="form-control" name="cliente" id="cliente"
				placeholder="Fornecedor">
		</div>
		<div class="form-group">
			<label for="comentario">Comentário</label>
			<textarea class="form-control" name="comentario" id="comentario"
				rows="2"></textarea>
		</div>

		<div class="text-center">
			<button type="submit" class="btn btn-primary">Enviar</button>
		</div>

		<?php echo form_close(); ?>

	</div>
	<div class="col-md-4"></div>
</div>
<br><br>

<script
	src="<?php echo base_url('includes/bootstrap/bootstrap-datetimepicker.min.js')?>"></script>
<script
	src="<?php echo base_url('includes/bootstrap/bootstrap-datetimepicker.pt-BR.js')?>"></script>


<script type="text/javascript">
	$(function () {
		$('#data').datetimepicker({
			format: "dd/mm/yyyy hh:ii",
			language: 'pt-BR',
			autoclose: true,
			todayBtn: true
		});
	});
</script>

