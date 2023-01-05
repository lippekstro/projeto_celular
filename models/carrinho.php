<?php

class Carrinho
{
    public $id_carrinho;
    public $id_cliente;
    //public $itens = array(); // array para armazenar os itens do carrinho


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
        $stmt->bindParam(':id_cliente', $this->id_cliente);
        $stmt->execute();
    }

    public static function listar()
    {
        $query = "SELECT * FROM carrinho";
        $conexao = conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function deletar()
    {
        $query = "DELETE FROM carrinho WHERE id_cliente=:id_cliente";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id_cliente", $this->id_cliente);
        $stmt->execute();
    }

    public static function obterPorUsuarioId($id_cliente)
    {
        $query = 'SELECT * FROM carrinho WHERE id_cliente = :id_cliente';
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id_cliente", $id_cliente);
        $stmt->execute();
        $carrinho = $stmt->fetchObject('Carrinho');
        return $carrinho;
    }

    // Método para limpar todos os itens do carrinho
    public function limparItens()
    {
        $query = 'DELETE FROM itens_do_carrinho WHERE id_carrinho = :id_carrinho';
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id_carrinho", $this->id_carrinho);
        $stmt->execute();
    }
}
