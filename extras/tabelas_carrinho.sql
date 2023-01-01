CREATE TABLE carrinho (
  id_carrinho INTEGER PRIMARY KEY,
  id_cliente INTEGER NOT NULL,
  data_criacao DATETIME NOT NULL,
  data_atualizacao DATETIME NOT NULL,
  FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
);

CREATE TABLE itens_do_carrinho (
  id_itens_do_carrinho INTEGER PRIMARY KEY,
  id_carrinho INTEGER NOT NULL,
  id_produto INTEGER NOT NULL,
  quantidade INTEGER NOT NULL,
  preco DECIMAL NOT NULL,
  FOREIGN KEY (id_carrinho) REFERENCES carrinho(id_carrinho),
  FOREIGN KEY (id_produto) REFERENCES produtos(id_produto)
);