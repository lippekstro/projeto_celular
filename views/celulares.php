<?php
require_once '../templates/cabecalho.php';


try {
    $lista = Produto::listar();
} catch (Exception $e){
    echo $e->getMessage();
}
?>

<!-- container dos cards -->
<div class="container_cards">
    <?php foreach ($lista as $celular): ?>
    <div class="card">
        <a href="produto.php?id_produto=<?= $celular['id_produto'] ?>">
        <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($celular['imagem']); ?>" style="width: 100%;"/>
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