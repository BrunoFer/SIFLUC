<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="container" class="container">
	<h2>Bem-vindo ao SIFLUC (Sistema de Fluxo de Caixa)</h2>

	<p>
		Esse sistema foi desenvolvido como atividade do curso online
		Desenvolvimento Ágil de Software (curso baseado em projetos e
		problemas) oferecido pelo Instituto Federal do Sul de MG através da
		plataforma <a href="https://mooc.ifsuldeminas.edu.br/">
			https://mooc.ifsuldeminas.edu.br.</a>
	</p>

	<p>Foi desenvolvido um simples programa de entradas e saídas em um
		caixa. Para atender a primeira parte do curso e o "cenário de 7 dias" 
                foi requisitado que:</p>
	<ul>
		<li>O sistema permitisse o cadastro de entradas com os campos data,
			valor, cliente e comentário;</li>
		<li>O sistema permitisse o cadastro de saídas com os campos data,
			valor, fornecedor e comentário;</li>
		<li>Deveria ser possível o controle do saldo atual, diário e anterior;</li>
		<li>Também deveria ser possível pesquisas com relação a registros de
			entradas e saídas;</li>
		<li>E, finalmente, o sistema deveria permitir capturar relatórios
			agrupados por datas e clientes/fornecedores.</li>
	</ul>
        
        <p>Após essa primeira parte, o curso seguiu outra dinâmica. A partir de então continuamos
        com o mesmo sistema mas fazendo funções novas e em tempo menor, chamados de sprints.</p>
        
        <p>No primeiro sprint foi requisitado: </p>
        <ul>
		<li>O sistema permitisse o cadastro de pessoas que incluia nome, apelido, telefone, email,
                endereco completo, cnpj/cpf em caso de pessoa jurídica ou física.</li>
		<li>As funções de relatório e criação de novos registros de entrada e saída teriam que buscar 
                pessoa inserida no banco, por meio de pesquisa ou autocomplete;</li>
	</ul>
        
        <p>Funções solicitadas no segundo sprint: </p>
        <ul>
		<li>O sistema mostrasse um gráfico das movimentações mensais;</li>
		<li>O sistema exibisse os três maiores fornecedores e os três maiores clientes;</li>
	</ul>

</div>
