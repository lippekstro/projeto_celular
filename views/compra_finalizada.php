<?php
require_once '../models/carrinho.php';
require_once '../models/itens_do_carrinho.php';
require_once '../templates/cabecalho.php';


// verifica se o carrinho já foi criado
if (isset($_SESSION['carrinho'])) {
    // recupera o carrinho da sessão
    $carrinho = $_SESSION['carrinho'];
}

?>

<div class="container-finalizada">
    <p>
        Parabens, <?= $_SESSION['usuario']['nome'] ?>, seu pedido nº xxx foi processado. 
        Uma confirmação foi enviada para o email: <?= $_SESSION['usuario']['email'] ?>.
    </p>
</div>

<?php
require_once '../templates/rodape.php';
?>