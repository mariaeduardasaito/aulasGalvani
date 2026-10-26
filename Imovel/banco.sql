CREATE DATABASE IF NOT EXISTS lar_futuro;

USE lar_futuro;

CREATE TABLE IF NOT EXISTS imoveis (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(120) NOT NULL,
    tipo_imovel VARCHAR(30) NOT NULL,
    finalidade VARCHAR(15) NOT NULL,
    preco DECIMAL(12,2) NOT NULL,
    endereco VARCHAR(200) NOT NULL,
    cidade VARCHAR(60) NOT NULL,
    quartos INT NOT NULL DEFAULT 0,
    banheiros INT NOT NULL DEFAULT 1,
    vagas_garagem INT NOT NULL DEFAULT 0,
    area_m2 DECIMAL(8,2) NOT NULL,
    descricao TEXT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'Disponível',
    data_cadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

INSERT INTO imoveis (
    titulo,
    tipo_imovel,
    finalidade,
    preco,
    endereco,
    cidade,
    quartos,
    banheiros,
    vagas_garagem,
    area_m2,
    descricao
) VALUES
(
    'Apartamento compacto no centro',
    'Apartamento',
    'Locação',
    1800.00,
    'Rua das Flores, 120, apto 31',
    'Serra Negra',
    1,
    1,
    0,
    42.50,
    'Perto do comércio e do transporte.'
),
(
    'Casa ampla com quintal',
    'Casa',
    'Venda',
    650000.00,
    'Av. Brasil, 845',
    'Serra Negra',
    3,
    2,
    2,
    180.00,
    'Quintal gramado e churrasqueira.'
),
(
    'Terreno plano em condomínio',
    'Terreno',
    'Venda',
    220000.00,
    'Rua dos Ipês, lote 14',
    'Amparo',
    0,
    0,
    0,
    360.00,
    'Pronto para construir.'
),
(
    'Sala comercial térrea',
    'Comercial',
    'Locação',
    3200.00,
    'Rua XV de Novembro, 300',
    'Amparo',
    0,
    1,
    1,
    65.00,
    'Vitrine para a rua principal.'
);

-- Consultar os imóveis cadastrados
SELECT * FROM imoveis;