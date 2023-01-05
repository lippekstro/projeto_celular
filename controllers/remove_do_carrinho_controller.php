<?php

require_once '../models/produto.php';
require_once '../models/conexao.php';
require_once '../models/itens_do_carrinho.php';

try{
    $id_item = $_GET['id_item'];

    $item = new ItensDoCarrinho($id_item);
    $item->deletar();

    header("Location: ../views/carrinho.php");

} catch (Exception $e) {
    echo $e->getMessage();
}