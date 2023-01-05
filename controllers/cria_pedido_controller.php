<?php
require_once "../models/pedido.php";
require_once "../models/conexao.php";
require_once "../models/carrinho.php";
session_start();

try {
    $id_cliente = $_SESSION['usuario']['id_usuario'];
    $id_pagamento = (int)$_POST['pagamento'];
    $endereco = $_SESSION['usuario']['endereco'];

    $pedido = new Pedido();

    $pedido->id_cliente = $id_cliente;
    $pedido->id_pagamento = $id_pagamento;
    $pedido->endereco = $endereco;

    $id_pedido = $pedido->criar();

    //enviando o id para exibir o numero do pedido na proxima pagina
    $_SESSION['numero_pedido'] = $id_pedido;

    //buscando o carrinho do usuario
    $carrinho = Carrinho::obterPorUsuarioId($_SESSION['usuario']['id_usuario']);

    $carrinho = new Carrinho($carrinho->id_carrinho);
    $carrinho->limparItens(); //removendo os itens
    $carrinho->deletar(); //apagando o carrinho

    header('Location: ../views/compra_finalizada.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}
