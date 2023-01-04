<?php
require_once '../models/carrinho.php';
require_once '../models/itens_do_carrinho.php';
//importante nesse caso chamar a classe carrinho e itens antes do cabecalho
//pois no cabecalho esta nosso session_start() e precisamos dos dados disponiveis antes desse codigo
require_once '../templates/cabecalho.php';


// verifica se o carrinho já foi criado
if (isset($_SESSION['carrinho'])) {
    // recupera o carrinho da sessão
    $carrinho = $_SESSION['carrinho'];
}

?>


<div class="container-carrinho">
    <?php if (isset($_SESSION['carrinho'])) : ?>
        <div class="container-tabela">
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                </tr>
                <?php foreach ($carrinho->itens as $item) : ?>
                    <tr>
                        <td><?= $item->pegaNomeDoItem($item->id_produto) ?></td>
                        <td><input type="number" value="<?= $item->quantidade ?>"></td>
                        <td class="preco"><?= $item->preco ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="container-total">
            <p id="exibe_total"></p>
        </div>
    <?php else : ?>
        <p>Não há itens no carrinho</p>
    <?php endif; ?>
</div>


<?php
require_once '../templates/rodape.php';
?>