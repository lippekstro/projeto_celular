<?php
require_once '../templates/cabecalho.php';
?>

<div>
    <form action="" method="POST" class="form-login">
        <div class="container-login">
            <div class="elemento_form_login">
                <label for="login"><span class="material-symbols-outlined">person</span></label>
                <input type="text" name="login" id="login" placeholder="Login">
            </div>

            <div class="elemento_form_login">
                <label for="senha"><span class="material-symbols-outlined">key</span></label>
                <input type="password" name="senha" id="senha" placeholder="Senha">
            </div>

            <div class="elemento_form_login">
                <a href="cadastro.php"><span>Se você não tem conta, cadastre-se aqui</span></a>
            </div>

            <div class="elemento_form_login">
                <a href=""><span>Esqueceu a senha?</span></a>
            </div>

            <div class="elemento_form_login">
                <button type="submit">Entrar</button>
            </div>

        </div>

    </form>
</div>


<?php
require_once '../templates/rodape.php';
?>