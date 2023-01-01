<?php
require_once '../templates/cabecalho.php';
?>

<div class="container-imagem-formulario">
    <div>
        <img src="../img/logo-black-removebg-preview.png" alt="">
    </div>
    <div class="">
        <form action="../controllers/cria_cliente_controller.php" id="form_cadastro" class="container-cadastro" method="POST">
            <div class="elemento-form-cadastro">
                <label for="nome"><span class="material-symbols-outlined">person</span></label>
                <input type="text" name="nome" id="nome" placeholder="Nome" required>
            </div>

            <div class="elemento-form-cadastro">
                <label for="email"><span class="material-symbols-outlined">mail</span></label>
                <input type="email" name="email" id="email" placeholder="E-mail" required>
            </div>

            <div class="elemento-form-cadastro">
                <label for="telefone"><span class="material-symbols-outlined">call</span></label>
                <input type="tel" name="telefone" id="telefone" placeholder="Telefone" required>
            </div>

            <div class="elemento-form-cadastro">
                <label for="endereco"><span class="material-symbols-outlined">home</span></label>
                <input type="text" name="endereco" id="endereco" placeholder="Endereço" required>
            </div>

            <div class="elemento-form-cadastro">
                <label for="senha"><span class="material-symbols-outlined">key</span></label>
                <input type="password" name="senha" id="senha" placeholder="Senha" required>
            </div>

            <div class="elemento-form-cadastro">
                <div style="display: flex; flex-direction:column; align-items:center;">
                    <div style="display: flex; align-items:center">
                        <label for="confirma_senha"><span class="material-symbols-outlined">key</span></label>
                        <input type="password" name="confirma_senha" id="confirma_senha" placeholder="Confirmar Senha" required>
                    </div>
                    <div>
                        <span id="erro_senha" style="color: red;"></span>
                    </div>
                </div>
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