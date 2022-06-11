CREATE DATABASE db_store;

-- selecionar comando --
USE db_store;

-- criar tabela de categorias --
CREATE TABLE tb_category(
    id INT(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (30) NOT NULL,
    description VARCHAR(100) NOT NULL
);

-- preencher categorias --
INSERT INTO tb_category (name,description) 
VALUES
('informatica','Produtos de Informatica e acessorios para computador'),
('escritorio','Canetas, cadernos, folhas'),
('eletronico','TVs, Radios, Caixa de som');

-- TABELA DE PRODUTOS--
CREATE TABLE tb_product(
    id INT(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (30) NOT NULL,
    description VARCHAR(100) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    valor FLOAT(5,2) NOT NULL,
    categoria_id INT(11) NOT NULL ,
    quantity INT(5) NOT NULL,
    created_at DATETIME NOT NULL
);

-- preencher product --
INSERT INTO tb_product (name,description,photo,valor,categoria_id,quantity,created_at) 
VALUES
('Cadeira gammer','Cadeira gammer','https://m.media-amazon.com/images/I/51H0BZa6SmL._AC_SX679_.jpg','200','1','12','2022-03-12'),
('Monitor 8000','Mouse gammer','https://m.media-amazon.com/images/I/61QJlo+D8pL._AC_SX522_.jpg','1500','1','2','2012-04-22'),
('Teclado LTX','Teclado gammer','https://m.media-amazon.com/images/I/71sFaDtowqL._AC_SX679_.jpg','160','1','8','2020-09-12'),
('Mousepad','Mousepad gammer','https://m.media-amazon.com/images/I/31AVfnlYKYL._AC_.jpg','80','1','43','2021-07-17');
