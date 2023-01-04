<?php
require_once '../templates/cabecalho.php';
?>

<div>
    <form action="../controllers/criar_produto_controller.php" method="post" enctype="multipart/form-data" class="container-cadastro">
        <div class="elemento-form-cadastro">
        <label for="imagem"><span class="material-symbols-outlined">image</span></label>
        <input type="file" name="imagem" id="imagem">
        </div>

        <div class="elemento-form-cadastro">
            <label for="nome"><span class="material-symbols-outlined">smartphone</span></label>
            <input type="text" name="nome" id="nome" placeholder="Nome do Produto">
        </div>

        <div class="elemento-form-cadastro">
            <label for="descricao"><span class="material-symbols-outlined">description</span></label>
            <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Descrição"></textarea>
        </div>

        <div class="elemento-form-cadastro">
            <label for="preco"><span class="material-symbols-outlined">sell</span></label>
            <input type="number" name="preco" id="preco" placeholder="Preço">
        </div>

        <div class="elemento-form-cadastro">
            <label for="fabricante"><span class="material-symbols-outlined">factory</span></label>
            <input type="text" name="fabricante" id="fabricante" placeholder="Fabricante">
        </div>

        <div class="elemento-form-cadastro">
            <label for="estoque"><span class="material-symbols-outlined">tag</span></label>
            <input type="number" name="estoque" id="estoque" placeholder="Estoque">
        </div>

        <div class="elemento-form-cadastro">
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</div>

<?php
require_once '../templates/rodape.php';
?>