<?php
require_once '../templates/cabecalho.php';

try {
    $id_produto = $_GET['id_produto'];
    $smartphone = Produto::listarPeloId($id_produto);
} catch (Exception $e) {
    echo $e->getMessage();
}

?>

<div class="container_produto">
    <div class="container-imagem-produto">
    <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($smartphone->imagem); ?>" style="width: 100%;"/>
    </div>
    <div class="container_infos_produto">

        <div class="container-preco-descricao">
            <h1><?= $smartphone->preco ?> R$</h1>
            <h2><?= $smartphone->descricao ?></h2>
        </div>

        <div class="container-botoes-produto">
            <button type="submit" class="botao-info" title="adicionar ao carrinho" form="form-produto">
                <span class="material-symbols-outlined">add_shopping_cart</span>
            </button>
        </div>

    </div>
</div>

<form action="../controllers/adiciona_no_carrinho_controller.php" method="post" id="form-produto">
    <input type="number" name="id_produto" id="id_produto" value="<?= $smartphone->id_produto ?>" hidden>
    <input type="number" name="preco" id="preco" value="<?= $smartphone->preco ?>" hidden>
</form>

<?php
require_once '../templates/rodape.php';
?>