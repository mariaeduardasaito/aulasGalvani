CREATE DATABASE IF NOT EXISTS lar_futuro;

USE lar_futuro;

CREATE TABLE IF NOT EXISTS imoveis (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(120) NOT NULL,
    tipo_imovel VARCHAR(30) NOT NULL,
    finalidade VARCHAR(15) NOT NULL,
    preco DECIMAL(12,2) NOT NULL CHECK (preco >= 0),
    endereco VARCHAR(200) NOT NULL,
    quartos INT NOT NULL DEFAULT 0 CHECK (quartos >= 0),
    banheiros INT NOT NULL DEFAULT 1 CHECK (banheiros >= 0),
    vagas_garagem INT NOT NULL DEFAULT 0 CHECK (vagas_garagem >= 0),
    area_m2 DECIMAL(8,2) NOT NULL CHECK (area_m2 > 0),
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
    quartos,
    banheiros,
    vagas_garagem,
    area_m2,
    descricao,
    status
) VALUES
(
    'Apartamento com 3 Quartos para alugar',
    'Apartamento',
    'Locação',
    2000.00,
    'Rua Rio Branco, 1 - Centro, Bauru - SP',
    3,
    2,
    1,
    140.00,
    'Apartamento à venda no Edifício Rio Branco - Bauru/SP\n140 m² | 3 quartos | Sacada | 1 vaga',
    'Disponível'
),
(
    'Casa com 4 Quartos à venda, 634m²',
    'Casa',
    'Venda',
    2600000.00,
    'Jardim Estoril III, Bauru - SP',
    4,
    5,
    4,
    634.00,
    'Sobrado com 3 pavimentos para venda no Jardim Estoril II - Bauru/SP\n634 m² de construção | 408 m² de terreno | 4 suítes | Piscina | Energia Solar',
    'Disponível'
),
(
    'Apartamento para venda',
    'Apartamento',
    'Venda',
    870000.00,
    'Rua Severino Lins, 655 - Vila Aviação, Bauru - SP',
    3,
    3,
    2,
    86.00,
    'Conheça este apartamento à venda no Duo Residence Club, localizado na Vila Aviação, em Bauru/SP. Com ambientes bem distribuídos, móveis planejados e uma estrutura completa de lazer, é uma excelente opção para quem busca conforto, praticidade e qualidade de vida.',
    'Disponível'
),
(
    'Sala comercial térrea',
    'Comercial',
    'Locação',
    1400.00,
    'Avenida Nações Unidas, 1585 - Centro, Bauru - SP',
    0,
    1,
    1,
    35.00,
    'Elevador\nAr-condicionado\nInterfone',
    'Disponível'
);
(
    'Terreno à venda',
    'Terreno',
    'Venda',
    430.000,
    'Jardim Estoril, Bauru - SP',
    0,
    0,
    0,
    385.00
    'Disponível'
);