<?php
require_once '../templates/cabecalho.php';
?>

<div class="container-imagem-formulario">
    <div>
        <img src="../img/logo-black-removebg-preview.png" alt="">
    </div>
    <div class="">
        <form action="" class="container-cadastro">
            <div class="elemento-form-cadastro">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">
            </div>

            <div class="elemento-form-cadastro">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>

            <div class="elemento-form-cadastro">
                <label for="telefone">Telefone</label>
                <input type="tel" name="telefone" id="telefone">

            </div>

            <div class="elemento-form-cadastro">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco">

            </div>

            <div class="elemento-form-cadastro">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha">

            </div>

            <div class="elemento-form-cadastro">
                <label for="confirma_senha">Confirmar Senha</label>
                <input type="password" name="confirma_senha" id="confirma_senha">

            </div>

            <div class="elemento-form-cadastro">
                <button type="submit">Cadastrar</button>
            </div>

        </form>
    </div>
</div>


<?php
require_once '../templates/rodape.php';
?>