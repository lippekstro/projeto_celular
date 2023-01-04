<?php
require_once '../models/carrinho.php';
require_once '../models/itens_do_carrinho.php';
require_once '../templates/cabecalho.php';

if(!isset($_SESSION['usuario'])){
    header('Location: login.php');
}

// verifica se o carrinho já foi criado
if (isset($_SESSION['carrinho'])) {
    // recupera o carrinho da sessão
    $carrinho = $_SESSION['carrinho'];
}

?>

<div class="container-forma">
    <div class="container-endereco-forma-pagamento">
        <div>
            <p>Endereço de Entrega: </p>
            <p><?= $_SESSION['usuario']['endereco'] ?></p>
        </div>
        <div>
            <p>Total: </p>
            <p>Escolha a Forma de Pagamento: </p>
            <form action="compra_finalizada.php" id="forma-pagamento"> <!--temporario pois deve ir para um controller-->
                <input type="radio" name="pagamento" id="boleto" value="boleto">
                <label for="boleto">Boleto</label>
                <input type="radio" name="pagamento" id="credito" value="credito">
                <label for="credito">Credito</label>
                <input type="radio" name="pagamento" id="pix" value="pix">
                <label for="pix">Pix</label>
            </form>
        </div>
    </div>

    <div>
        <button type="submit" form="forma-pagamento">Finalizar Compra</button>
    </div>
</div>

<?php
require_once '../templates/rodape.php';
?>