<?php

class ItensDoCarrinho
{
    public $id_item;
    public $id_carrinho;
    public $id_produto;
    public $quantidade;
    public $preco;

    public function __construct($id_item = false)
    {
        if ($id_item) {
            $this->id_item = $id_item;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT id_carrinho, id_produto, quantidade, preco FROM itens_do_carrinho WHERE id_item = :id_item";
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_item', $this->id_item);
        $stmt->execute();

        $lista = $stmt->fetch();

        $this->id_carrinho = $lista['id_carrinho'];
        $this->id_produto = $lista['id_produto'];
        $this->quantidade = $lista['quantidade'];
        $this->preco = $lista['preco'];
    }

    public function criar()
    {
        $query = 'INSERT INTO itens_do_carrinho (id_itens_do_carrinho, id_carrinho, id_produto, quantidade, preco) 
        VALUES (:id_item, :id_carrinho, :id_produto, :quantidade, :preco)';
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id_item', $this->id_item);
        $stmt->bindParam(':id_carrinho', $this->id_carrinho);
        $stmt->bindParam(':id_produto', $this->id_produto);
        $stmt->bindParam(':quantidade', $this->quantidade);
        $stmt->bindParam(':preco', $this->preco);
        $stmt->execute();
    }

    public function pegaNomeDoItem($id_produto)
    {
        $query = 'SELECT nome FROM produtos WHERE id_produto = :id_produto';
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id_produto', $id_produto);
        $stmt->execute();

        // recupera o nome do produto
        $nome = $stmt->fetchColumn();
        return $nome;
    }
}
