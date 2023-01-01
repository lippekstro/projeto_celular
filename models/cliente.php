<?php

class Cliente
{
    public $id_cliente;
    public $nome;
    public $email;
    public $endereco;
    public $telefone;
    public $senha;

    public function __construct($id_cliente = false)
    {
        if ($id_cliente) {
            $this->id_cliente = $id_cliente;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT nome, email, endereco, telefone, senha FROM clientes WHERE id_cliente = :id_cliente";
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_cliente', $this->id_cliente);
        $stmt->execute();

        $lista = $stmt->fetch();

        $this->nome = $lista['nome'];
        $this->descricao = $lista['email'];
        $this->preco = $lista['endereco'];
        $this->imagem = $lista['telefone'];
        $this->fabricante = $lista['senha'];
    }

    public function criar()
    {
        $query = "INSERT INTO clientes (nome, email, endereco, telefone, senha) 
        VALUES (:nome, :email, :endereco, :telefone, :senha)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':endereco', $this->endereco);
        $stmt->bindValue(':telefone', $this->telefone);
        $stmt->bindValue(':senha', $this->senha);

        $stmt->execute();
    }

    public static function listar()
    {
        $query = "SELECT * FROM clientes";
        $conexao = conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE clientes SET nome = :nome, email = :email, endereco = :endereco, telefone = :telefone
        WHERE id_cliente = :id_cliente";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $this->nome);
        $stmt->bindValue(":email", $this->email);
        $stmt->bindValue(":endereco", $this->endereco);
        $stmt->bindValue(":telefone", $this->telefone);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM clientes WHERE id_cliente = :id_cliente";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id_cliente", $this->id_cliente);
        $stmt->execute();
    }
}
