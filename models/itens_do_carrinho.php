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
        $query = "SELECT id_carrinho, id_produto, quantidade, preco FROM itens_do_carrinho WHERE id_itens_do_carrinho = :id_item";
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
        $query = 'INSERT INTO itens_do_carrinho (id_carrinho, id_produto, quantidade, preco) 
        VALUES (:id_carrinho, :id_produto, :quantidade, :preco)';
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id_carrinho', $this->id_carrinho);
        $stmt->bindParam(':id_produto', $this->id_produto);
        $stmt->bindParam(':quantidade', $this->quantidade);
        $stmt->bindParam(':preco', $this->preco);
        $stmt->execute();
    }

    public function editar()
    {
        $query = 'UPDATE itens_do_carrinho SET id_carrinho = :id_carrinho, id_produto = :id_produto, quantidade = :quantiade, preco = :preco 
        WHERE id_itens_do_carrinho = :id_item';
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_carrinho', $this->id_carrinho);
        $stmt->bindValue(':id_produto', $this->id_produto);
        $stmt->bindValue(':quantidade', $this->quantidade);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':id_item', $this->id_item);
        $stmt->execute();
    }

    // Método para obter o produto do item
    public function getProduto()
    {
        return Produto::listarPeloId($this->id_produto);
    }

    // Método para obter o total do item
    public function getTotal()
    {
        return $this->quantidade * $this->preco;
    }

    public function deletar()
    {
        $query = "DELETE FROM itens_do_carrinho WHERE id_itens_do_carrinho = :id_item";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id_item", $this->id_item);
        $stmt->execute();
    }

    public static function obterPorCarrinhoIdProdutoId($id_carrinho, $id_produto)
    {
        $query = 'SELECT * FROM itens_do_carrinho WHERE id_carrinho = :id_carrinho AND id_produto = :id_produto';
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id_carrinho', $id_carrinho);
        $stmt->bindParam(':id_produto', $id_produto);
        $stmt->execute();
        $item = $stmt->fetchObject('ItensDoCarrinho');
        return $item;
    }

    public static function obterPorCarrinhoId($id_carrinho)
    {
        $query = 'SELECT * FROM itens_do_carrinho WHERE id_carrinho = :id_carrinho';
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id_carrinho', $id_carrinho);
        $stmt->execute();
        $itens = $stmt->fetchAll(PDO::FETCH_CLASS, 'ItensDoCarrinho');
        return $itens;
    }
}
