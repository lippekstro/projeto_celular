<?php
require_once '../templates/cabecalho.php';

try {
    $listaParaCarrossel = Produto::listarUltimasTres();
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    $lista = Produto::listar();
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
<!-- container do carrossel -->
<div class="container-carrossel">
    <!-- container dos slides -->
    <div class="slideshow-container">
        <?php foreach ($listaParaCarrossel as $imagem) : ?>
            <!-- imagens com largura maxima com numero e texto de legenda -->
            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($imagem['imagem']); ?>" style="width: 100%;" />
                <div class="text">Caption Text</div>
            </div>
        <?php endforeach; ?>

        <!-- botoes "proximo" e "anterior" -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- os circulos -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</div>

<!-- container dos cards -->
<div class="container_cards">
    <?php foreach ($lista as $celular) : ?>
        <div class="card">
            <a href="produto.php?id_produto=<?= $celular['id_produto'] ?>">
                <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($celular['imagem']); ?>" style="width: 100%;" />
                <h1><?= $celular['nome'] ?></h1>
                <p class="price"><?= $celular['preco'] ?> R$</p>
                <p><?= $celular['descricao'] ?></p>
                <p><button>Confira</button></p>
            </a>
        </div>
    <?php endforeach; ?>
</div>


<?php
require_once '../templates/rodape.php';
?>