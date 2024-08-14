DROP DATABASE IF EXISTS dbCasaNegocios;
CREATE DATABASE dbCasaNegocios;
USE dbCasaNegocios;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    localizacao VARCHAR(255),
    cpf	 		CHAR(11),
    rg			CHAR(9),
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id) ON DELETE CASCADE
);
 
CREATE TABLE profissional (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    localizacao VARCHAR(255),
    cpf	 		CHAR(11),
    rg			CHAR(9),
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id) ON DELETE CASCADE
);


CREATE TABLE habilidade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT
);

CREATE TABLE profissional_habilidade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_profissional INT NOT NULL,
    id_habilidade INT NOT NULL,
    FOREIGN KEY (id_profissional) REFERENCES Profissional(id) ON DELETE CASCADE,
    FOREIGN KEY (id_habilidade) REFERENCES Habilidade(id) ON DELETE CASCADE
);

CREATE TABLE contrato (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_empregado INT NOT NULL,
    data_inicio DATETIME NOT NULL,
    data_fim DATETIME,
    valor DECIMAL(10, 2),
    status_servico ENUM('ativo', 'inativo') NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES Cliente(id) ON DELETE CASCADE,
    FOREIGN KEY (id_empregado) REFERENCES Empregado(id) ON DELETE CASCADE
);

CREATE TABLE servico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_contrato INT NOT NULL,
    data_hora DATETIME NOT NULL,
    status_servico ENUM('solicitado', 'aceito', 'em_andamento', 'finalizado') NOT NULL,
    FOREIGN KEY (id_contrato) REFERENCES Contrato(id) ON DELETE CASCADE
);

CREATE TABLE avaliacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_servico INT NOT NULL,
    nota TINYINT NOT NULL CHECK (nota BETWEEN 1 AND 5),
    comentário TEXT,
    FOREIGN KEY (id_servico) REFERENCES Servico(id) ON DELETE CASCADE
);

CREATE TABLE pagamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_contrato INT NOT NULL,
    data_pagamento DATE NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    status_pagamento ENUM('pendente', 'pago', 'cancelado') NOT NULL,
    FOREIGN KEY (id_contrato) REFERENCES Contrato(id) ON DELETE CASCADE
);

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descrição TEXT
);

CREATE TABLE Profissional_Categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_profissional INT NOT NULL,
    id_categoria INT NOT NULL,
    FOREIGN KEY (id_profissional) REFERENCES Profissional(id) ON DELETE CASCADE,
    FOREIGN KEY (id_categoria) REFERENCES Categorias(id) ON DELETE CASCADE
);

INSERT INTO usuario (nome, email, senha) VALUES 
('Ana Silva', 'ana.silva@example.com', 'senha123'),
('Pedro Costa', 'pedro.costa@example.com', 'senha456'),
('Maria Oliveira', 'maria.oliveira@example.com', 'senha789');

INSERT INTO cliente (id_usuario, localizacao, cpf, rg) VALUES 
(1, 'Rua das Flores, 123', '39802202830', '124382832'),
(2, 'Av. Paulista, 456', '33478247390', '520488492');

INSERT INTO profissional (id_usuario, localizacao, cpf, rg) VALUES 
(3, 'Rua dos Pinheiros, 789', '84323854382', '788237234');

INSERT INTO habilidade (nome, descricao) VALUES 
('Jardinagem', 'Cuidados e manutenção de jardins'),
('Limpeza', 'Serviços de limpeza residencial e comercial');

INSERT INTO profissional_habilidade (id_profissional, id_habilidade) VALUES 
(1, 1),
(1, 2);

INSERT INTO contrato (id_cliente, id_empregado, data_inicio, data_fim, valor, status_servico) VALUES 
(1, 1, '2024-07-01', '2024-12-31', 1200.00, 'ativo');

INSERT INTO servico (id_contrato, data_hora, status_servico) VALUES 
(1, '2024-07-05 09:00:00', 'solicitado'),
(1, '2024-07-10 09:00:00', 'em_andamento');

INSERT INTO avaliacao (id_servico, nota, comentário) VALUES 
(1, 5, 'Excelente serviço, muito satisfeito!'),
(2, 4, 'Bom serviço, mas poderia melhorar a pontualidade.');

INSERT INTO pagamentos (id_contrato, data_pagamento, valor, status_pagamento) VALUES 
(1, '2024-07-01', 1200.00, 'pago');

INSERT INTO categorias (nome, descrição) VALUES 
('Jardinagem', 'Serviços relacionados ao cuidado e manutenção de jardins'),
('Limpeza', 'Serviços de limpeza residencial e comercial');

INSERT INTO profissional_categoria (id_profissional, id_categoria) VALUES 
(1, 1),
(1, 2);

SELECT * FROM usuario;
SELECT * FROM cliente;
