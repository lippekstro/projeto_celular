<?php
require_once '../templates/cabecalho.php';
?>

<div class="container-imagem-formulario">
    <div>
        <img src="../img/logo-black-removebg-preview.png" alt="">
    </div>
    <div class="">
        <form action="" class="container-cadastro" method="POST">
            <div class="elemento-form-cadastro">
                <label for="nome"><span class="material-symbols-outlined">person</span></label>
                <input type="text" name="nome" id="nome" placeholder="Nome">
            </div>

            <div class="elemento-form-cadastro">
                <label for="email"><span class="material-symbols-outlined">mail</span></label>
                <input type="email" name="email" id="email" placeholder="E-mail">
            </div>

            <div class="elemento-form-cadastro">
                <label for="telefone"><span class="material-symbols-outlined">call</span></label>
                <input type="tel" name="telefone" id="telefone" placeholder="Telefone">
            </div>

            <div class="elemento-form-cadastro">
                <label for="endereco"><span class="material-symbols-outlined">home</span></label>
                <input type="text" name="endereco" id="endereco" placeholder="Endereço">
            </div>

            <div class="elemento-form-cadastro">
                <label for="senha"><span class="material-symbols-outlined">key</span></label>
                <input type="password" name="senha" id="senha" placeholder="Senha">
            </div>

            <div class="elemento-form-cadastro">
                <label for="confirma_senha"><span class="material-symbols-outlined">key</span></label>
                <input type="password" name="confirma_senha" id="confirma_senha" placeholder="Confirmar Senha">
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