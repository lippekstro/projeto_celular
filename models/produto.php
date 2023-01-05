<?php

class Produto
{
    public $id_produto;
    public $nome;
    public $descricao;
    public $preco;
    public $imagem;
    public $fabricante;
    public $estoque;


    public function __construct($id_produto = false)
    {
        if ($id_produto) {
            $this->id_produto = $id_produto;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT nome, descricao, preco, imagem, fabricante, estoque FROM produtos WHERE id_produto = :id_produto";
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
        $this->estoque = $lista['estoque'];
    }

    public function criar()
    {
        $query = "INSERT INTO produtos (nome, descricao, preco, imagem, fabricante, estoque) 
        VALUES (:nome, :descricao, :preco, :imagem, :fabricante, :estoque)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':imagem', $this->imagem);
        $stmt->bindValue(':fabricante', $this->fabricante);
        $stmt->bindValue(':estoque', $this->estoque);

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
        $query = "UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, fabricante = :fabricante, estoque = :estoque
        WHERE id_produto = :id_produto";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $this->nome);
        $stmt->bindValue(":descricao", $this->descricao);
        $stmt->bindValue(":preco", $this->preco);
        $stmt->bindValue(":fabricante", $this->fabricante);
        $stmt->bindValue(":estoque", $this->estoque);
        $stmt->bindValue(":id_produto", $this->id_produto);
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

    public static function listarPeloId($id_produto)
    {
        $query = "SELECT * FROM produtos WHERE id_produto = :id_produto";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id_produto", $id_produto);
        $stmt->execute();
        $produto = $stmt->fetchObject('Produto');
        return $produto;
    }

    public function editarImagem()
    {
        $query = "UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, fabricante = :fabricante, estoque = :estoque, imagem = :imagem
        WHERE id_produto = :id_produto";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $this->nome);
        $stmt->bindValue(":descricao", $this->descricao);
        $stmt->bindValue(":preco", $this->preco);
        $stmt->bindValue(":fabricante", $this->fabricante);
        $stmt->bindValue(":estoque", $this->estoque);
        $stmt->bindValue(":imagem", $this->imagem);
        $stmt->bindValue(":id_produto", $this->id_produto);
        $stmt->execute();
    }

    public static function listarUltimasTres()
    {
        $query = "SELECT * FROM produtos ORDER BY id_produto DESC LIMIT 3";
        $conexao = conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }
}
