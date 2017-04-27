 -- CRIAÇÃO DAS TABELAS DO APP -
 
 -- TABELA DE BRANDS --
CREATE TABLE brands
(
 id integer primary key AUTO_INCREMENT not null,
 nome_bandeira varchar(30) not null
);
 -- INSERCAODAS BRANDS
 
INSERT INTO brands (nome_bandeira) VALUES('Visa');
INSERT INTO brands (nome_bandeira) VALUES('Mastercard');
INSERT INTO brands (nome_bandeira) VALUES('American Express');
INSERT INTO brands (nome_bandeira) VALUES('Elo');
INSERT INTO brands (nome_bandeira) VALUES('Hipercard');
INSERT INTO brands (nome_bandeira) VALUES('Ticket');
INSERT INTO brands (nome_bandeira) VALUES('VR Beneficios');
INSERT INTO brands (nome_bandeira) VALUES('Sodexo');
INSERT INTO brands (nome_bandeira) VALUES('Hiper');
INSERT INTO brands (nome_bandeira) VALUES('Diners Club');

-- TABELA DE PHONES --
CREATE TABLE phonesphonesphonesphones
(
 id bigint primary key AUTO_INCREMENT not null,
 dd varchar(2) not null,
 numero varchar(12) not null,
 updated_at VARCHAR(30) not null,
 created_at VARCHAR(30) not null
);
