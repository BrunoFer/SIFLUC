<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container text-center">
	<div class="row">
		<div class="col-md-4">
			<strong>Saldo do dia:<strong>
					<h4 class="text-info">
					<?php echo "R$ ".number_format($this->saldodia, 2, ',', '.'); ?>
					</h4>
		
		</div>
		<div class="col-md-4">
			<strong>Saldo anterior:</strong>
			<h4 class="text-info">
			<?php echo "R$ ".number_format($this->saldoanterior, 2, ',', '.'); ?>
			</h4>
		</div>
		<div class="col-md-4">
			<strong>Saldo atual:</strong>
			<h4 class="text-info">
			<?php echo "R$ ".number_format($this->saldo, 2, ',', '.'); ?>
			</h4>
		</div>
	</div>
	<div class="row col-md-12 top30">
	<?php echo form_open('movimentacoes/buscasaldo'); ?>
	<?php echo validation_errors(); ?>
		<div class="col-md-5"></div>
		<div class="col-md-2">
			<div class="form-group	row">
				<label for="data">Busca de saldo por um dia específico</label> <input
					type="data" class="form-control" name="data" id="data"
					placeholder="Data" />
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Enviar</button>
			</div>
		</div>
		<div class="col-md-5"></div>
		<?php echo form_close(); ?>
	</div>

	<div class="row col-md-12 top30">
	<?php
	if (@$retorno){ ?>
		<div class="col-md-4"></div>
		<div class="col-md-4 text-center">
			<fieldset>
				<legend>
					Saldo do dia
					<?php echo $data?>
				</legend>
				<strong><?php echo "R$ ".number_format($retorno, 2, ',', '.');?> </strong>
			</fieldset>
		</div>
		<div class="col-md-4"></div>
		<?php }
		?>
	</div>
</div>

<br>
<br>

<script
	src="<?php echo base_url('includes/bootstrap/bootstrap-datepicker.min.js')?>"></script>
<script
	src="<?php echo base_url('includes/bootstrap/bootstrap-datepicker.pt-BR.min.js')?>"></script>


<script type="text/javascript">
	$(function () {
		$('#data').datepicker({
			format: "dd/mm/yyyy",
			language: 'pt-BR',
			autoclose: true,
		});
	});
</script>
