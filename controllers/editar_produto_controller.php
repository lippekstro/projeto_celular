<?php

require_once '../models/produto.php';
require_once '../models/conexao.php';

try {
    $id_produto = $_POST['id_produto'];
    $nome = htmlspecialchars($_POST['nome']);
    $descricao = htmlspecialchars($_POST['descricao']);
    $preco = htmlspecialchars($_POST['preco']);
    $fabricante = htmlspecialchars($_POST['fabricante']);
    $estoque = htmlspecialchars($_POST['estoque']);

    $produto = new Produto($id_produto);

    $produto->nome = $nome;
    $produto->descricao = $descricao;
    $produto->preco = $preco;
    $produto->fabricante = $fabricante;
    $produto->estoque = $estoque;

    $produto->editar();

    header("Location: ../views/gerenciar_produto.php");

} catch (Exception $e) {
    echo $e->getMessage();
}