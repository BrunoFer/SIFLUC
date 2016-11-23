<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>SIFLUC</title>
<link rel="stylesheet"
	href="<?php echo base_url('includes/bootstrap/bootstrap.min.css');?>">
<link rel="stylesheet"
	href="<?php echo base_url('includes/css/meuestilo.css');?>">
<link rel="stylesheet"
	href="<?php echo base_url('includes/bootstrap/bootstrap-datetimepicker.min.css');?>">
<link rel="stylesheet"
	href="<?php echo base_url('includes/datatable/datatables.min.css');?>">
</head>
<body>

	<script type="text/javascript"
		src="<?php echo base_url('includes/jquery/jquery.min.js')?>"></script>
	<script
		src="<?php echo base_url('includes/bootstrap/bootstrap.min.js')?>"></script>

	<nav class="navbar navbar-default">
		<div class="container">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
					aria-expanded="false">
					<span class="sr-only"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span> <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url()?>">SIFLUC</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Entradas <span class="caret"></span> </a>
						<ul class="dropdown-menu">
							<li><a
								href="<?php echo base_url('index.php/movimentacoes/cadastroentrada')?>">Cadastrar</a>
							</li>
							<li><a
								href="<?php echo base_url('index.php/movimentacoes/entradas')?>">Listar</a>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Saídas <span class="caret"></span> </a>
						<ul class="dropdown-menu">
							<li><a
								href="<?php echo base_url('index.php/movimentacoes/cadastrosaida')?>">Cadastrar</a>
							</li>
							<li><a
								href="<?php echo base_url('index.php/movimentacoes/saidas')?>">Listar</a>
							</li>
						</ul>
					</li>
					<li><a
						href="<?php echo base_url('index.php/movimentacoes/saldos')?>">Saldos</a>
					</li>
					<li><a
						href="<?php echo base_url('index.php/movimentacoes/relatorios')?>">Relatórios</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false"> <?php echo $user_profile['nome']?><img
							class="icone-menor img-thumbnail"
							src="<?php echo $user_profile['icone']?>"> <span class="caret"></span>
					</a>
						<ul class="dropdown-menu">
							<li><a href="#">Perfil</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="<?php echo $user_profile['logout']?>">Sair</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>