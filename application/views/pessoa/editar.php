<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container" id="container">

    <?php echo form_open('pessoa/registra'); ?>

    <div class="col-md-12">
        <div class="text-center text-danger">
            <?php
            if (@$msgem) {
                echo $msgem;
            }
            echo validation_errors();
            ?>
        </div>
        <div class="radio text-center">
            <label><input type="radio" name="tipopessoa" value="Fisica" <?php echo $pessoa->tipo ?> checked="true">Pessoa Física</label>
            <label><input type="radio" name="tipopessoa" value="Juridica" <?php echo set_radio('tipopessoa', 'Juridica'); ?>>Pessoa Jurídica</label>
        </div>
    </div>

    <div class="col-md-2"></div>

    <div class="col-md-4">
        <input type="hidden" value="<?php echo $pessoa->id?>" name="id">
        
        <div class="form-group">
            <label for="nome">Nome / Razão Social</label> 
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?php echo $pessoa->nome ?>">
        </div>
        <div class="form-group">
            <label for="apelido">Apelido / Nome Fantasia</label> 
            <input type="text" class="form-control" id="apelido" name="apelido" placeholder="Apelido" value="<?php echo $pessoa->apelido ?>">
        </div>
        <div class="form-group" id="cpf">
            <label for="cpf">CPF</label> 
            <input type="text" data-mask="000.000.000-00" data-mask-reverse="true" class="form-control" name="cpf" placeholder="CPF" value="<?php echo $pessoa->documento; ?>">
        </div>
        <div class="form-group" id="cnpj">
            <label for="cnpj">CNPJ</label> 
            <input type="text" class="form-control" data-mask="00.000.000/0000-00" data-mask-reverse="true" name="cnpj" placeholder="CNPJ" value="<?php echo $pessoa->documento; ?>">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $pessoa->email; ?>">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" data-mask="(00)00000-0000" name="telefone" placeholder="Telefone" value="<?php echo $pessoa->telefone; ?>">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="cep">CEP</label> 
            <input type="text" class="form-control" data-mask="00.000-000" id="cep" name="cep" placeholder="CEP" value="<?php echo $pessoa->cep ?>">
        </div>
        <div class="form-group">
            <label for="rua">Rua</label> 
            <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua" value="<?php echo $pessoa->rua ?>">
        </div>
        <div class="form-group">
            <label for="num">Número</label> 
            <input type="text" class="form-control" id="num" name="num" placeholder="Número" value="<?php echo $pessoa->numero ?>">
        </div>
        <div class="form-group">
            <label for="bairro">Bairro</label> 
            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="<?php echo $pessoa->bairro ?>">
        </div>
        <div class="form-group">
            <label for="cidade">Cidade</label> 
            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="<?php echo $pessoa->cidade ?>">
        </div>
        <div class="form-group">
            <label for="uf">Estado</label> 
            <input type="text" class="form-control" id="uf" name="uf" placeholder="Estado" value="<?php echo $pessoa->estado ?>">
        </div>

    </div>

    <div class="col-md-2"></div>
    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Alterar</button>
    </div>

    <?php echo form_close(); ?>
</div>

<script src="<?php echo base_url('includes/jquery/jquery.mask.min.js') ?>"></script>
