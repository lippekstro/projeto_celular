<?php
require_once '../templates/cabecalho.php';
require_once '../models/conexao.php';

if (isset($_SESSION['usuario'])) {
    header('location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_REQUEST['email'];
    $senha = $_REQUEST['senha'];

    try {
        $query = "select * from clientes where email = :email LIMIT 1";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            if (password_verify($senha, $registro['senha'])) {
                $_SESSION['usuario']['nome'] = $registro['nome'];
                $_SESSION['usuario']['email'] = $registro['email'];
                $_SESSION['usuario']['endereco'] = $registro['endereco'];
                $_SESSION['usuario']['id_usuario'] = $registro['id_cliente'];
                $_SESSION['usuario']['nivel_acesso'] = $registro['nivel_acesso'];

                header('location: index.php');
            } else {
                $erroMsg[] = "Email ou Senha errado";
            }
        } else {
            $erroMsg[] = "Email ou Senha errado";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>

<div class="container-form-login">
    <form action="" method="POST" class="form-login">
        <div class="container-login">
            <div class="elemento_form_login">
                <label for="email"><span class="material-symbols-outlined">mail</span></label>
                <input type="text" name="email" id="email" placeholder="Email">
            </div>

            <div class="elemento_form_login">
                <label for="senha"><span class="material-symbols-outlined">key</span></label>
                <input type="password" name="senha" id="senha" placeholder="Senha">
            </div>

            <div class="elemento_form_login">
                <a href="cadastro.php">Se você não tem conta, cadastre-se aqui</a>
            </div>

            <div class="elemento_form_login">
                <a href="">Esqueceu a senha?</a>
            </div>

            <div class="elemento_form_login">
                <button type="submit">Entrar</button>
            </div>

        </div>

    </form>
</div>


<?php
//aqui eu to passando as variaveis que definem os estilos para essa pagina em especifico
$fixa = 'position: fixed;';
$bottom = 'bottom: 0;';
$largura = 'width: 100%;';
require_once '../templates/rodape.php';
?>