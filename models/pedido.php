<?php

class Pedido
{
    public $id_pedido;
    public $id_cliente;
    public $id_pagamento;
    public $endereco;

    public function __construct($id_pedido = false)
    {
        if ($id_pedido) {
            $this->id_pedido = $id_pedido;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT id_cliente, id_pagamento, endereco FROM pedidos WHERE id_pedido = :id_pedido";
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_pedido', $this->id_pedido);
        $stmt->execute();

        $lista = $stmt->fetch();

        $this->id_cliente = $lista['id_cliente'];
        $this->id_pagamento = $lista['id_pagamento'];
        $this->endereco = $lista['endereco'];
    }

    public function criar()
    {
        $query = 'INSERT INTO pedidos (id_cliente, id_forma_pagamento, endereco_entrega) 
        VALUES (:id_cliente, :id_pagamento, :endereco)';
        $conexao = conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':id_cliente', $this->id_cliente);
        $stmt->bindParam(':id_pagamento', $this->id_pagamento);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->execute();
        $id = $conexao->lastInsertId();
        return $id;
    }
}
