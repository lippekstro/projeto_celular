<?php
require_once '../templates/cabecalho.php';
require_once '../models/cliente.php';

try {
    $id_usuario = $_SESSION['usuario']['id_usuario'];
    $lista = Cliente::listarPeloId($id_usuario);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<div class="container-imagem-formulario">
    <div class="">
        <?php foreach ($lista as $usuario) : ?>
            <form action="../controllers/editar_cliente_controller.php" id="form_cadastro" class="container-cadastro" method="POST">
                <div>
                    <input type="number" name="id_cliente" id="id_cliente" value="<?= $usuario['id_cliente'] ?>" hidden>
                </div>    

                <div class="elemento-form-cadastro">
                    <label for="nome"><span class="material-symbols-outlined">person</span></label>
                    <input type="text" name="nome" id="nome" placeholder="Nome" value="<?= $usuario['nome'] ?>" required>
                </div>

                <div class="elemento-form-cadastro">
                    <label for="email"><span class="material-symbols-outlined">mail</span></label>
                    <input type="email" name="email" id="email" placeholder="E-mail" value="<?= $usuario['email'] ?>" required>
                </div>

                <div class="elemento-form-cadastro">
                    <label for="telefone"><span class="material-symbols-outlined">call</span></label>
                    <input type="tel" name="telefone" id="telefone" placeholder="Telefone" value="<?= $usuario['telefone'] ?>" required>
                </div>

                <div class="elemento-form-cadastro">
                    <label for="endereco"><span class="material-symbols-outlined">home</span></label>
                    <input type="text" name="endereco" id="endereco" placeholder="Endereço" value="<?= $usuario['endereco'] ?>" required>
                </div>

                <div class="elemento-form-cadastro">
                    <button type="submit">Atualizar</button>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
</div>

<?php
require_once '../templates/rodape.php';
?>