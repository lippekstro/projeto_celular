<?php
require_once '../models/carrinho.php';
require_once '../models/itens_do_carrinho.php';
//importante nesse caso chamar a classe carrinho e itens antes do cabecalho
//pois no cabecalho esta nosso session_start() e precisamos dos dados disponiveis antes desse codigo
require_once '../templates/cabecalho.php';


// verifica se o carrinho já foi criado
//if (isset($_SESSION['carrinho'])) {
// recupera o carrinho da sessão
//    $carrinho = $_SESSION['carrinho'];
//}

// Obtém o ID do carrinho do usuário
$carrinho = Carrinho::obterPorUsuarioId($_SESSION['usuario']['id_usuario']);
if ($carrinho) {
    // Obtém os itens do carrinho
    $itens = ItensDoCarrinho::obterPorCarrinhoId($carrinho->id_carrinho);
}


?>


<div class="container-carrinho">
    <?php if (isset($itens) && count($itens)>0) : ?>

        <div class="container-tabela">
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Total</th>
                </tr>
                <?php foreach ($itens as $item) : ?>
                    <tr>
                        <td><?= $item->getProduto()->nome ?></td>
                        <td><input type="number" id="quantidade" value="<?= $item->quantidade ?>"></td>
                        <td><?= $item->preco ?></td>
                        <td class="preco"><?= $item->getTotal() ?></td>
                        <td>
                            <a href="../controllers/remove_do_carrinho_controller.php?id_item=<?= $item->id_itens_do_carrinho ?>">
                                <span class="material-symbols-outlined">delete</span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="container-total">
            <div>
                <p id="exibe_total"></p>
            </div>
            <div>
                <button type="submit" form="form-carrinho">Continuar</button>
            </div>
        </div>

        <form action="forma_pagamento.php" method="post" id="form-carrinho">
            <?php foreach ($itens as $item) : ?>
                <input type="number" name="id_produto" id="id_produto" value="<?= $item->id_produto ?>" hidden>
                <input type="number" name="quantidade" id="quantidade" value="<?= $item->quantidade ?>" hidden>
                <input type="number" name="preco" id="preco" value="<?= $item->preco ?>" hidden>
            <?php endforeach; ?>
        </form>

    <?php else : ?>
        <p>Não há itens no carrinho</p>
    <?php endif; ?>
</div>


<?php
require_once '../templates/rodape.php';
?>