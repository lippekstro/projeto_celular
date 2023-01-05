<?php
require_once '../models/cliente.php';
require_once '../models/carrinho.php';
require_once '../models/itens_do_carrinho.php';
require_once '../models/conexao.php';
session_start();

try {
    // Obtém o ID do carrinho do usuário
    $carrinho = Carrinho::obterPorUsuarioId($_SESSION['usuario']['id_usuario']);
    $carrinho_id = $carrinho->id_carrinho;

    if (!$carrinho) {
        // Cria um novo carrinho para o usuário
        $carrinho = new Carrinho();
        $carrinho->id_cliente = $_SESSION['usuario']['id_usuario'];
        $carrinho_id = $carrinho->criar();
    }
    

    // Verifica se o produto já está no carrinho
    $item = ItensDoCarrinho::obterPorCarrinhoIdProdutoId($carrinho_id, $_POST['id_produto']);
   
    
    if ($item) {
        // Atualiza a quantidade do item
        $item = new ItensDoCarrinho($item->id_itens_do_carrinho);
        $item->id_carrinho = $carrinho_id;
        $item->id_produto = $_POST['id_produto'];
        $item->quantidade++;
        $item->preco = $_POST['preco'];
        $item->editar();
    } else {
        // Adiciona um novo item ao carrinho
        $item = new ItensDoCarrinho();
        $item->id_carrinho = $carrinho_id;
        $item->id_produto = $_POST['id_produto'];
        $item->quantidade = 1;
        $item->preco = $_POST['preco'];
        $item->criar();
    }


    // redireciona para a página do carrinho
    header("Location: ../views/carrinho.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}
