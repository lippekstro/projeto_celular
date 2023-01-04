CREATE TABLE carrinho (
  id_carrinho INTEGER AUTO_INCREMENT PRIMARY KEY,
  id_cliente INTEGER NOT NULL,
  data_criacao timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
  data_atualizacao timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
  FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
);

CREATE TABLE itens_do_carrinho (
  id_itens_do_carrinho INTEGER AUTO_INCREMENT PRIMARY KEY,
  id_carrinho INTEGER NOT NULL,
  id_produto INTEGER NOT NULL,
  quantidade INTEGER NOT NULL,
  preco DECIMAL (10, 2) NOT NULL,
  FOREIGN KEY (id_carrinho) REFERENCES carrinho(id_carrinho),
  FOREIGN KEY (id_produto) REFERENCES produtos(id_produto)
);
