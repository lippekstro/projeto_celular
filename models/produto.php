<?php

class Produto
{
    public $id_produto;
    public $nome;
    public $descricao;
    public $preco;
    public $imagem;
    public $fabricante;

    public function __construct($id_produto = false)
    {
        if ($id_produto) {
            $this->id_produto = $id_produto;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT nome, descricao, preco, imagem, fabricante FROM produtos WHERE id_produto = :id_produto";
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_produto', $this->id_produto);
        $stmt->execute();

        $lista = $stmt->fetch();

        $this->nome = $lista['nome'];
        $this->descricao = $lista['descricao'];
        $this->preco = $lista['preco'];
        $this->imagem = $lista['imagem'];
        $this->fabricante = $lista['fabricante'];
    }

    public function criar()
    {
        $query = "INSERT INTO produtos (nome, descricao, preco, imagem, fabricante) 
        VALUES (:nome, :descricao, :preco, :imagem, :fabricante)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':imagem', $this->imagem);
        $stmt->bindValue(':fabricante', $this->fabricante);

        $stmt->execute();
    }

    public static function listar()
    {
        $query = "SELECT * FROM produtos";
        $conexao = conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, imagem = :imagem, fabricante = :fabricante
        WHERE id_produto = :id_produto";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $this->nome);
        $stmt->bindValue(":descricao", $this->descricao);
        $stmt->bindValue(":preco", $this->preco);
        $stmt->bindValue(":imagem", $this->imagem);
        $stmt->bindValue(":fabricante", $this->fabricante);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM produtos WHERE id_produto=:id_produto";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id_produto", $this->id_produto);
        $stmt->execute();
    }
}
