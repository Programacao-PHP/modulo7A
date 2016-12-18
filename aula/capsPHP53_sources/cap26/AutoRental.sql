create table utilizador (
email                CHAR(254)            not null,
password             CHAR(254),
nome                 CHAR(254),
morada               CHAR(254),
cod_postal           CHAR(254),
localidade           CHAR(254),
telefone             CHAR(254),
cc_numero            CHAR(254),
cc_nome              CHAR(254),
cc_validade          CHAR(254),
num_c_habitual       CHAR(254),
primary key (email)
);

create table local (
cod                  INTEGER              not null,
local                CHAR(254),
morada               CHAR(254),
telefone             CHAR(254),
horario              CHAR(254),
primary key (cod)
);

create table classe (
classe               CHAR(254)            not null,
preco_semana         INT,
preco_fsemana        INT,
primary key (classe)
);

create table novidades (
novidade_txt         CHAR(254),
cod                  INT                  not null,
primary key (cod)
);

create table destaques (
destaque_txt         CHAR(254)            not null,
cod                  INT,
primary key (destaque_txt)
);

create table veiculo (
matricula            CHAR(254)            not null,
classe               CHAR(254),
cod                  INTEGER,
marca                CHAR(254),
modelo               CHAR(254),
fotografia           CHAR(254),
primary key (matricula),
foreign key (classe)
      references classe (classe),
foreign key (cod)
      references local (cod)
);

create table reserva (
email                CHAR(254),
matricula            CHAR(254),
data_reserva         CHAR(125)            not null,
data_entrega_carro   CHAR(125)            not null,
primary key (data_reserva, data_entrega_carro),
foreign key (email)
      references utilizador (email),
foreign key (matricula)
      references veiculo (matricula)
);
