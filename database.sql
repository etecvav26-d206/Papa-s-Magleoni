-- Papa's Magleoni | Banco de dados MySQL para XAMPP/phpMyAdmin
CREATE DATABASE IF NOT EXISTS papas_magleoni
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE papas_magleoni;

CREATE TABLE IF NOT EXISTS categorias (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(80) NOT NULL,
    descricao VARCHAR(255) NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS pizzas (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    categoria_id INT UNSIGNED NULL,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    badge VARCHAR(50) DEFAULT NULL,
    imagem VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_pizzas_categoria
        FOREIGN KEY (categoria_id) REFERENCES categorias(id)
        ON DELETE SET NULL
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS depoimentos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    texto TEXT NOT NULL,
    nota TINYINT UNSIGNED NOT NULL DEFAULT 5,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
INSERT INTO categorias (nome, descricao)
SELECT 'Clássicas', 'Sabores tradicionais da casa'
WHERE NOT EXISTS (SELECT 1 FROM categorias WHERE nome = 'Clássicas');

INSERT INTO categorias (nome, descricao)
SELECT 'Especiais', 'Receitas autorais Magleoni'
WHERE NOT EXISTS (SELECT 1 FROM categorias WHERE nome = 'Especiais');

INSERT INTO categorias (nome, descricao)
SELECT 'Calzones', 'Massa dobrada e recheada'
WHERE NOT EXISTS (SELECT 1 FROM categorias WHERE nome = 'Calzones');
INSERT INTO pizzas (categoria_id, nome, descricao, preco, badge, imagem)
SELECT
    (SELECT id FROM categorias WHERE nome = 'Clássicas' LIMIT 1),
    'Margherita',
    'Molho de tomate San Marzano, mussarela de búfala, manjericão fresco e azeite extra virgem.',
    42.90,
    'Clássica',
    'images/pizza-margherita.png'
WHERE NOT EXISTS (SELECT 1 FROM pizzas WHERE nome = 'Margherita');

INSERT INTO pizzas (categoria_id, nome, descricao, preco, badge, imagem)
SELECT
    (SELECT id FROM categorias WHERE nome = 'Especiais' LIMIT 1),
    'Pepperoni',
    'Generosas fatias de pepperoni artesanal, mussarela derretida e molho de tomate caseiro.',
    48.90,
    'Mais pedida',
    'images/pizza-pepperoni.png'
WHERE NOT EXISTS (SELECT 1 FROM pizzas WHERE nome = 'Pepperoni');

INSERT INTO pizzas (categoria_id, nome, descricao, preco, badge, imagem)
SELECT
    (SELECT id FROM categorias WHERE nome = 'Clássicas' LIMIT 1),
    'Quatro Queijos',
    'Mussarela, gorgonzola, parmesão e provolone — uma explosão de sabor em cada mordida.',
    52.90,
    NULL,
    'images/pizza-quatro-queijos.png'
WHERE NOT EXISTS (SELECT 1 FROM pizzas WHERE nome = 'Quatro Queijos');

INSERT INTO pizzas (categoria_id, nome, descricao, preco, badge, imagem)
SELECT
    (SELECT id FROM categorias WHERE nome = 'Clássicas' LIMIT 1),
    'Portuguesa',
    'Presunto, ovos, cebola, azeitonas, mussarela e molho de tomate caseiro.',
    46.90,
    NULL,
    'images/pizza-portuguesa.png'
WHERE NOT EXISTS (SELECT 1 FROM pizzas WHERE nome = 'Portuguesa');

INSERT INTO pizzas (categoria_id, nome, descricao, preco, badge, imagem)
SELECT
    (SELECT id FROM categorias WHERE nome = 'Especiais' LIMIT 1),
    'Especial da Casa',
    'Receita exclusiva Magleoni com ingredientes selecionados e finalização no forno a lenha.',
    58.90,
    'Especial',
    'images/pizza-especial.png'
WHERE NOT EXISTS (SELECT 1 FROM pizzas WHERE nome = 'Especial da Casa');

INSERT INTO pizzas (categoria_id, nome, descricao, preco, badge, imagem)
SELECT
    (SELECT id FROM categorias WHERE nome = 'Especiais' LIMIT 1),
    'Horta da estação',
    'Mussarela, tomate cereja, abobrinha assada, rúcula e azeite de ervas. Imagem ilustrativa.',
    54.90,
    NULL,
    'images/pizza-especial.png'
WHERE NOT EXISTS (SELECT 1 FROM pizzas WHERE nome = 'Horta da estação');

INSERT INTO pizzas (categoria_id, nome, descricao, preco, badge, imagem)
SELECT
    (SELECT id FROM categorias WHERE nome = 'Calzones' LIMIT 1),
    'Calzone Recheado',
    'Massa artesanal fechada, mussarela, presunto, tomate e orégano.',
    44.90,
    NULL,
    'images/pizza-calzone.png'
WHERE NOT EXISTS (SELECT 1 FROM pizzas WHERE nome = 'Calzone Recheado');
INSERT INTO depoimentos (nome, texto, nota)
SELECT
    'Maria S.',
    'A massa é leve, a pizza chega quentinha e a Margherita virou a minha favorita.',
    5
WHERE NOT EXISTS (SELECT 1 FROM depoimentos WHERE nome = 'Maria S.');

INSERT INTO depoimentos (nome, texto, nota)
SELECT
    'João P.',
    'Ótimo atendimento e ingredientes muito frescos. A Pepperoni é sensacional.',
    5
WHERE NOT EXISTS (SELECT 1 FROM depoimentos WHERE nome = 'João P.');
