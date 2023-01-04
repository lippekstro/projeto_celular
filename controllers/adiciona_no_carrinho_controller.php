<?php
require_once '../models/cliente.php';
require_once '../models/carrinho.php';
require_once '../models/itens_do_carrinho.php';
require_once '../models/conexao.php';
session_start();

// tenta adicionar o item ao carrinho
try {
    // pega os dados do formulário
    $id_produto = $_POST['id_produto'];
    $quantidade = 1;
    $preco = $_POST['preco'];

    // verifica se o carrinho já foi criado
    if (!isset($_SESSION['carrinho'])) {
        // cria o carrinho
        $carrinho = new Carrinho();
    } else {
        // recupera o carrinho da sessão
        $carrinho = $_SESSION['carrinho'];
    }

    // cria o item do carrinho
    $item = new ItensDoCarrinho();
    $item->id_produto = $id_produto;
    $item->quantidade = $quantidade;
    $item->preco = $preco;

    // adiciona o item ao carrinho
    $carrinho->adicionarItem($item);

    // salva o carrinho na sessão
    $_SESSION['carrinho'] = $carrinho;

    // redireciona para a página do carrinho
    header("Location: ../views/carrinho.php");
} catch (Exception $e) {
    echo $e->getMessage();
}
