<?php
require_once '../models/carrinho.php';
require_once '../models/itens_do_carrinho.php';
require_once '../templates/cabecalho.php';

?>

<div class="container-finalizada">
    <p>
        Parabens, <?= $_SESSION['usuario']['nome'] ?>, seu pedido nº <?= $_SESSION['numero_pedido'] ?> foi processado.
        Uma confirmação foi enviada para o email: <?= $_SESSION['usuario']['email'] ?>.
    </p>
</div>

<?php

$_SESSION['numero_pedido'] = ""; // limpando para nao atrapalhar se o usuario for fazer outra compra em seguida

require_once '../templates/rodape.php';
?>