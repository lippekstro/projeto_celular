<?php
require_once '../templates/cabecalho.php';

try {
    $id_produto = $_GET['id_produto'];
    $celular = Produto::listarPeloId($id_produto);
} catch (Exception $e) {
    echo $e->getMessage();
}


?>

<div>
    <form action="../controllers/editar_produto_controller.php" method="post" enctype="multipart/form-data" class="container-cadastro">
            <div>
                <input type="number" name="id_produto" id="id_produto" value="<?= $celular->id_produto ?>" hidden>
            </div>

            <div class="elemento-form-cadastro">
                <label for="imagem"><span class="material-symbols-outlined">image</span></label>
                <input type="file" name="imagem" id="imagem">
            </div>

            <div class="elemento-form-cadastro">
                <label for="nome"><span class="material-symbols-outlined">smartphone</span></label>
                <input type="text" name="nome" id="nome" value="<?= $celular->nome ?>">
            </div>

            <div class="elemento-form-cadastro">
                <label for="descricao"><span class="material-symbols-outlined">description</span></label>
                <textarea name="descricao" id="descricao" cols="30" rows="10"><?= $celular->descricao ?></textarea>
            </div>

            <div class="elemento-form-cadastro">
                <label for="preco"><span class="material-symbols-outlined">sell</span></label>
                <input type="number" name="preco" id="preco" value="<?= $celular->preco ?>">
            </div>

            <div class="elemento-form-cadastro">
                <label for="fabricante"><span class="material-symbols-outlined">factory</span></label>
                <input type="text" name="fabricante" id="fabricante" value="<?= $celular->fabricante ?>">
            </div>

            <div class="elemento-form-cadastro">
                <label for="estoque"><span class="material-symbols-outlined">tag</span></label>
                <input type="number" name="estoque" id="estoque" value="<?= $celular->estoque ?>">
            </div>

            <div class="elemento-form-cadastro">
                <button type="submit">Atualizar</button>
            </div>
    </form>
</div>

<?php
require_once '../templates/rodape.php';
?>