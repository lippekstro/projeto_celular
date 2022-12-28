<?php
require_once '../templates/cabecalho.php';
?>

<div>
    <form action="" method="POST" class="form-login">
        <div class="container-login">
            <div class="elemento_form_login">
                <label for="login">Login</label>
                <input type="text" name="login" id="login">
            </div>

            <div class="elemento_form_login">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha">
            </div>

            <div class="elemento_form_login">
                <a href=""><span>Se você não tem conta, cadastre-se aqui</span></a>
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