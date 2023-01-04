<?php

class Carrinho
{
    public $id_carrinho;
    public $id_cliente;
    public $itens = array(); // array para armazenar os itens do carrinho


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
        $query = 'INSERT INTO carrinho (id_cliente) VALUES (:id_cliente)';
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->execute();
    }

    public static function buscaCarrinhoDoUsuario($id_cliente){
        $query = 'SELECT * FROM carrinho WHERE id_cliente = :id_cliente';
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->execute();
        $lista = $stmt->fetch();
        return $lista;
    }

    public function adicionarItem(ItensDoCarrinho $item)
    {
       
        // adiciona o item ao array de itens do carrinho
        $this->itens[] = $item;
    }
}
