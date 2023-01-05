<?php
require_once '../models/carrinho.php';
require_once '../models/itens_do_carrinho.php';
require_once '../templates/cabecalho.php';

if(!isset($_SESSION['usuario'])){
    header('Location: login.php');
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
            <form action="../controllers/cria_pedido_controller.php" method="post" id="forma-pagamento">
                <input type="radio" name="pagamento" id="boleto" value="1" checked>
                <label for="boleto">Boleto</label>
                <input type="radio" name="pagamento" id="credito" value="2">
                <label for="credito">Credito</label>
                <input type="radio" name="pagamento" id="pix" value="3">
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