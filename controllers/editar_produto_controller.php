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

    // se a variavel files nao estiver vazia, ou seja, se um imagem foi enviada entao a variavel imagem sera preenchida com essa imagem
    // e a variavel imagem SO existe nesse caso, senao ela nao existe
    if (!empty($_FILES['imagem']['tmp_name'])){
        $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
    }

    $produto = new Produto($id_produto);

    $produto->nome = $nome;
    $produto->descricao = $descricao;
    $produto->preco = $preco;
    $produto->fabricante = $fabricante;
    $produto->estoque = $estoque;
    
    // se a variavel imagem existe significa q tem uma imagem nova para substituir a antiga entao definimos a nova imagem 
    // e usamos o outro Editar que é o editarImagem
    // senao significa q nenhuma nova imagem foi enviada entao chama o editar normal que nao atualiza a imagem
    if($imagem){
        $produto->imagem = $imagem;
        $produto->editarImagem();
    } else {
        $produto->editar();
    }

    header("Location: ../views/gerenciar_produto.php");

} catch (Exception $e) {
    echo $e->getMessage();
}