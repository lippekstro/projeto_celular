<?php

require_once '../models/produto.php';
require_once '../models/conexao.php';

try{
    $id_produto = $_GET['id_produto'];

    $produto = new Produto($id_produto);
    $produto->deletar();

    header("Location: ../views/gerenciar_produto.php");

} catch (Exception $e) {
    echo $e->getMessage();
}