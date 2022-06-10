-- para criar um banco de dados --
CREATE DATABASE db_escola;

-- selecionar o banco de dados --
USE db_escola;

CREATE TABLE tb_professor(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL

);
CREATE TABLE tb_aluno(
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    email VARCHAR(255) NOT NULL,
    matricula VARCHAR(10) NOT NULL

);

-- insert dados --
INSERT INTO tb_professor (nome,email,cpf) 
VALUES ('franciel','teste@teste.com','12312312312');

INSERT INTO tb_professor (nome,email,cpf) 
VALUES ('pedro','teste@teste.com','12312312312');

-- EXCLUIR TABELA --
DROP TABLE tb_professor;

-- SElecionar dados da tabela --
SELECT * FROM tb_professor;

-- SElecionar dados especifico --
SELECT * FROM tb_professor WHERE id='6';

-- inserir 1 registro --
INSERT INTO tb_professor (nome,email,cpf) VALUES('chiquim da tapiocas','chiquim@email.com','12345678912');

-- inserir mais de 1 registro --
INSERT INTO tb_professor (nome,email,cpf) 
VALUES
('joao da tapiocas','joao@email.com','12345678911');
('ze da tapiocas','ze@email.com','12345678913');
('maria da tapiocas','maria@email.com','12345678912');

-- deletar todos --

DELETE FROM tb_professor;

-- editar dados de 1 registro --
UPDATE tb_professor SET nome='Luiza da caucaia' WHERE cpf= '12345636734';