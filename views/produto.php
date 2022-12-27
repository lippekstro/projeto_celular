<?php
require_once '../templates/cabecalho.php';
?>

<div class="container_produto">
    <div>
        <img src="../img/grito.png" alt="">
    </div>
    <div class="container_infos_produto">

        <div class="container-preco-descricao">
            <h1>999,90 R$</h1>
            <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta fugiat, perferendis repellendus eos error saepe placeat inventore consequuntur sint? Dolore nesciunt dicta dolor necessitatibus nostrum omnis recusandae, aperiam hic ratione!</h2>
        </div>

        <div class="container-botoes-produto">
            <button class="botao-info" title="adicionar ao carrinho"><span class="material-symbols-outlined">add_shopping_cart</span></button>
            <button class="botao-info">Comprar</button>
            <button class="botao-info" title="favoritar"><span class="material-symbols-outlined">favorite</span></button>
            <button class="botao-info">Comparar</button>
        </div>

    </div>
</div>

<?php
require_once '../templates/rodape.php';
?>