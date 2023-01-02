<?php

class Carrinho
{
    public $id_carrinho;
    public $id_cliente;
    public $itens = array();


    public function __construct($id_carrinho = false)
    {
        if ($id_carrinho) {
            $this->id_carrinho = $id_carrinho;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT id_cliente FROM carrinho WHERE id_carrinho = :id_carrinho";
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_carrinho', $this->id_carrinho);
        $stmt->execute();

        $lista = $stmt->fetch();

        $this->id_cliente = $lista['id_cliente'];
    }

    public function criar()
    {
        $query = 'INSERT INTO carrinho (id_carrinho, id_cliente) VALUES (:id_carrinho, :id_cliente)';
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id_carrinho', $this->id_carrinho);
        $stmt->bindParam(':id_cliente', $this->id_cliente);
        $stmt->execute();
    }

    public function adicionaProduto(ItensDoCarrinho $item)
    {
        array_push($this->itens, $item);
    }

    public static function verificaCarrinho($id_carrinho, $id_cliente)
    {
        $query = 'SELECT COUNT(*) FROM carrinhos WHERE id_carrinho = :id_carrinho';
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id_carrinho', $id_carrinho);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            // O carrinho existe no banco de dados
            $carrinho = new Carrinho($id_carrinho, $id_cliente);
        } else {
            // O carrinho não existe no banco de dados
            $carrinho = new Carrinho(null, $id_cliente);
            $carrinho->criar();
        }

        return $carrinho;
    }

    /*public function adicionaProduto($id_produto, $id_cliente)
    {
        //verifica se o produto ja esta no carrinho
        $query = "SELECT * FROM itens_do_carrinho WHERE id_cliente = :id_cliente AND id_produto = :id_produto";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_cliente', $id_cliente);
        $stmt->bindValue(':id_produto', $id_produto);
        $stmt->execute();
        $resultado = $stmt->fetch();

        //se ja houver o produto, incrementa a quantidade
        if ($resultado) {
            $query = 'UPDATE carrinho SET quantidade = quantidade + 1 WHERE id_cliente = :id_cliente AND id_produto = :id_produto';
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(':id_cliente', $id_cliente);
            $stmt->bindValue(':id_produto', $id_produto);
            $stmt->execute();
        } else { //senao, adiciona o item com quantidade 1
            $query = 'INSERT INTO carrinho (id_cliente, id_produto, quantidade) VALUES (:id_cliente, :id_produto, 1)';
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(':id_cliente', $id_cliente);
            $stmt->bindValue(':id_produto', $id_produto);
            $stmt->execute();
        }
    }*/
}
