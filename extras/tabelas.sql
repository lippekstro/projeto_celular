CREATE TABLE produtos (
  id_produto INTEGER PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  descricao TEXT NOT NULL,
  preco DECIMAL NOT NULL,
  imagem BLOB NOT NULL,
  fabricante VARCHAR(255) NOT NULL
);

CREATE TABLE clientes (
  id_cliente INTEGER PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  endereco TEXT NOT NULL,
  telefone VARCHAR(255) NOT NULL,
  senha VARCHAR(255) NOT NULL
);

CREATE TABLE formas_de_pagamento (
  id_forma_de_pagamento INTEGER PRIMARY KEY,
  cartao_de_credito BOOLEAN NOT NULL,
  boleto BOOLEAN NOT NULL,
  pix BOOLEAN NOT NULL
);

CREATE TABLE pedidos (
  id_pedido INTEGER PRIMARY KEY,
  id_cliente INTEGER NOT NULL,
  id_forma_pagamento INTEGER NOT NULL,
  data_pedido DATETIME NOT NULL,
  data_entrega DATETIME NOT NULL,
  endereco_entrega TEXT NOT NULL,
  FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
  FOREIGN KEY (id_forma_pagamento) REFERENCES formas_de_pagamento(id_forma_de_pagamento)
);

CREATE TABLE itens_do_pedido (
  id_itens_do_pedido INTEGER PRIMARY KEY,
  id_pedido INTEGER NOT NULL,
  id_produto INTEGER NOT NULL,
  quantidade INTEGER NOT NULL,
  preco DECIMAL NOT NULL,
  FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido),
  FOREIGN KEY (id_produto) REFERENCES produtos(id_produto)
);
