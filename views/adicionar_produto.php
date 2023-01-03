<?php
require_once '../templates/cabecalho.php';
?>

<div>
    <form action="../controllers/criar_produto_controller.php" method="post" enctype="multipart/form-data">
        <div>
            <div>
                <input type="file" name="imagem" id="imagem">
            </div>

            <div>
                <label for="nome"><span class="material-symbols-outlined">smartphone</span></label>
                <input type="text" name="nome" id="nome">
            </div>

            <div>
                <label for="descricao"><span class="material-symbols-outlined">description</span></label>
                <textarea name="descricao" id="descricao" cols="30" rows="10"></textarea>
            </div>

            <div>
                <label for="preco"><span class="material-symbols-outlined">sell</span></label>
                <input type="number" name="preco" id="preco">
            </div>

            <div>
                <label for="fabricante"><span class="material-symbols-outlined">factory</span></label>
                <input type="text" name="fabricante" id="fabricante">
            </div>

            <div>
                <label for="estoque"><span class="material-symbols-outlined">tag</span></label>
                <input type="number" name="estoque" id="estoque">
            </div>

            <div>
                <button type="submit">Cadastrar</button>
            </div>
        </div>
    </form>
</div>

<?php
require_once '../templates/rodape.php';
?>