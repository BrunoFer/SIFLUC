<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
	<div class="col-md-1"></div>
	<div class="col-md-10">

	<?php if (isset($listaEntrada)){ ?>
		<table id="tabelaEntrada" class="table table-striped">
			<thead>
				<tr colspan='4'>
					<th>Entradas</th>
				</tr>
				<tr>
					<th>Data</th>
					<th>Cliente</th>
					<th>Comentário</th>
					<th>Valor (R$)</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$somaEntradas = 0;
			foreach ($listaEntrada as $registroEntrada){?>
				<tr>
					<td><?php echo date('d/m/Y h:i',strtotime($registroEntrada->data));?>
					</td>
					<td><?php echo $registroEntrada->cliente;?></td>
					<td><?php echo $registroEntrada->comentario;?></td>
					<td><?php echo number_format($registroEntrada->valor, 2, ',', '.');?>
					</td>
				</tr>
				<?php
				$somaEntradas += $registroEntrada->valor;
			} ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan='4' class="text-right">Saldo entradas = R$ <?php echo number_format($somaEntradas, 2, ',', '.');?>
					</th>
				</tr>
			</tfoot>
		</table>
		<?php } ?>


		<?php if (isset($listaSaida)){ ?>
		<table id="tabelaEntrada" class="table table-striped">
			<thead>
				<tr colspan='4'>
					<th>Saídas</th>
				</tr>
				<tr>
					<th>Data</th>
					<th>Fornecedor</th>
					<th>Comentário</th>
					<th>Valor (R$)</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$somaSaidas = 0;
			foreach ($listaSaida as $registroSaida){?>
				<tr>
					<td><?php echo date('d/m/Y h:i',strtotime($registroSaida->data));?>
					</td>
					<td><?php echo $registroSaida->fornecedor;?></td>
					<td><?php echo $registroSaida->comentario;?></td>
					<td><?php echo number_format($registroSaida->valor, 2, ',', '.');?>
					</td>
				</tr>
				<?php
				$somaSaidas += $registroSaida->valor;
			} ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan='4' class="text-right">Saldo saídas = R$ <?php echo number_format($somaSaidas, 2, ',', '.');?>
					</th>
				</tr>
			</tfoot>
		</table>
		<?php

		if (isset($somaEntradas) && isset($somaSaidas)) {
			$soma = $somaEntradas - $somaSaidas;?>
		<div class="col-md-4"></div>
		<div class="col-md-4 text-center">
			<fieldset>
				<legend>Saldo total</legend>
				<strong><?php echo "R$ ".number_format($soma, 2, ',', '.');?></strong>
			</fieldset>
		</div>
		<div class="col-md-4"></div>
		<?php }
		} ?>
	</div>
	<div class="col-md-1"></div>
</div>
<br>
<br>
