<?php

require_once '../models/cliente.php';
require_once '../models/carrinho.php';
require_once '../models/conexao.php';
session_start();

try {
    $id_carrinho = 0;
    $id_cliente = $_SESSION['usuario']['id_usuario'];
    $id_produto = $_POST['id_produto'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];

    $carrinho = Carrinho::verificaCarrinho($id_carrinho, $id_cliente);

    $item = new ItensDoCarrinho();
    $item->id_produto = $id_produto;
    $item->quantidade = $quantidade;
    $item->preco = $preco;
    $item->criar();

    $carrinho->adicionaProduto($item);



    header("Location: ../views/carrinho.php");
} catch (Exception $e) {
    echo $e->getMessage();
}
