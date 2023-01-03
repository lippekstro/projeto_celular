<?php

require_once '../models/produto.php';
require_once '../models/conexao.php';

try {
    $nome = htmlspecialchars($_POST['nome']);
    $descricao = htmlspecialchars($_POST['descricao']);
    $preco = htmlspecialchars($_POST['preco']);
    $fabricante = htmlspecialchars($_POST['fabricante']);
    $estoque = htmlspecialchars($_POST['estoque']);
    if (!empty($_FILES['imagem']['tmp_name'])){
        $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
    }
    
    $produto = new Produto();
    $produto->nome = $nome;
    $produto->descricao = $descricao;
    $produto->preco = $preco;
    $produto->fabricante = $fabricante;
    $produto->estoque = $estoque;
    $produto->imagem = $imagem;

    $produto->criar();

    header("Location: ../views/gerenciar_produto.php");

} catch (Exception $e) {
    echo $e->getMessage();
}