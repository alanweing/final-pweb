create database trabalho_alan;

create table trabalho_alan.products
(
	id int auto_increment
		primary key,
	name varchar(50) not null,
	price float not null,
	description varchar(200) null
)
;

create table trabalho_alan.shopping_cart
(
	id int auto_increment
		primary key,
	user_id int not null,
	product_id int not null,
	constraint shopping_cart_products_id_fk
		foreign key (product_id) references trabalho_alan.products (id)
)
;

create index shopping_cart_products_id_fk
	on shopping_cart (product_id)
;

create index shopping_cart_users_id_fk
	on shopping_cart (user_id)
;

create table trabalho_alan.user_type
(
	id int auto_increment
		primary key,
	description varchar(50) not null
)
;

create table trabalho_alan.users
(
	id int auto_increment
		primary key,
	username varchar(50) not null,
	password varchar(255) not null,
	phone varchar(50) not null,
	user_type int not null,
	constraint user_username_uindex
		unique (username),
	constraint user_user_type_id_fk
		foreign key (user_type) references trabalho_alan.user_type (id)
)
;

create index user_user_type_id_fk
	on users (user_type)
;

alter table shopping_cart
	add constraint shopping_cart_users_id_fk
		foreign key (user_id) references trabalho_alan.users (id)
;

INSERT INTO trabalho_alan.user_type (description) VALUES ('master');
INSERT INTO trabalho_alan.user_type (description) VALUES ('seller');
INSERT INTO trabalho_alan.user_type (description) VALUES ('client');

INSERT INTO trabalho_alan.products (name, price, description) VALUES ('Pistão do bom', 0, 'Faz o motor ficar louco');
INSERT INTO trabalho_alan.products (name, price, description) VALUES ('Amortecedor', 2, 'o carro não faz blam');
INSERT INTO trabalho_alan.products (name, price, description) VALUES ('Pneu', 234, 'Não faz shhhh no asfalto');
INSERT INTO trabalho_alan.products (name, price, description) VALUES ('Parabrisa', 8888, 'Protege o motorista de pegar gripe');
INSERT INTO trabalho_alan.products (name, price, description) VALUES ('Volante', 234, 'Faz o carro desviar do buraco');
INSERT INTO trabalho_alan.products (name, price, description) VALUES ('Farol', 465, 'Atrai animais no escuro');
INSERT INTO trabalho_alan.products (name, price, description) VALUES ('Trocador de marcha', 76, 'Faz o carro gritar mais baixo');
INSERT INTO trabalho_alan.products (name, price, description) VALUES ('Lanterna', 2234, 'Afasta os Dementadores de Hogwarts');
INSERT INTO trabalho_alan.products (name, price, description) VALUES ('Rebimboca da Parafuseta', 666, 'É um mito (o cachorro sabe)');
INSERT INTO trabalho_alan.products (name, price, description) VALUES ('teste', 99, 'teste teste');

INSERT INTO trabalho_alan.users (username, password, phone, user_type) VALUES ('alan', '$2y$10$OGNV896URYgep9uzpSSleOCsW7K4UX.Fg4uP3yqnMr6UZwSEIrgIS', '54999006794', 1);
INSERT INTO trabalho_alan.users (username, password, phone, user_type) VALUES ('usuario', '$2y$10$KlBCZPBhmUUGMigJw8IFdudzlU1QehDiFcc2Xtj4C/jOquN9lElWa', '99999999999', 3);
INSERT INTO trabalho_alan.users (username, password, phone, user_type) VALUES ('funcionario', '$2y$10$Q5p8azs/iCYJUVbZXCVfOO..CXv109JY0PlDRpP26PjtxmPJ78TGu', '77777777777', 2);
INSERT INTO trabalho_alan.users (username, password, phone, user_type) VALUES ('usuario teste', '$2y$10$1wnv5jNy8br0SmZUG7J/SOzoSMB6OIwDSSVNN0PAEEBCRlWxdBHWa', '11111111111', 3);
INSERT INTO trabalho_alan.users (username, password, phone, user_type) VALUES ('usuario teste2', '$2y$10$7qp4a54KD5Q1VoZpi39ZZeMSp0AH1u.twbxuJ15dHRn619yO4KmSq', '123', 3);
INSERT INTO trabalho_alan.users (username, password, phone, user_type) VALUES ('usuarioteste1', '$2y$10$P9EWdG09OkRlRDYIWCmJs.5X6e7iQETsxwFKyvwDm8ycNhb2cYu9G', '213123213312', 3);
INSERT INTO trabalho_alan.users (username, password, phone, user_type) VALUES ('usuarioaloha', '$2y$10$rhs/phcGk.BpFjEI9IPBb./FQt4.wEr5AQMqrKYKaA8TMTtKWJCw6', '123', 3);
INSERT INTO trabalho_alan.users (username, password, phone, user_type) VALUES ('kaka', '$2y$10$bO7otX8aLhIUQCdPYMOi3u5wRVx0VGOU.fnso4Ia6gS6UPJEY6JgW', '123', 3);
INSERT INTO trabalho_alan.users (username, password, phone, user_type) VALUES ('kakas', '$2y$10$NLF6Wy6/6LGq7La3Q3VfOOnatPNycWhHXzfyWfdNOlnYnw3QaATy6', '123', 3);
INSERT INTO trabalho_alan.users (username, password, phone, user_type) VALUES ('uno', '$2y$10$cNRMVADS34cOD0Nsuxyz/eHmDYb4Vyf5aO.gLwtvm/D3reE/s3dGG', '123', 3);
INSERT INTO trabalho_alan.users (username, password, phone, user_type) VALUES ('unoh', '$2y$10$b9O0W1Or2Opby.59NSQ49OaFOjvuAn.AKg2lAynX9ypagpQO38Bsi', '123', 3);
INSERT INTO trabalho_alan.users (username, password, phone, user_type) VALUES ('usuario123', '$2y$10$M8wQ9DmiEiUmo4r3w0nozu5nYrmskHqqX/zC4dTyA/pTsnF92M5fe', '123', 3);
INSERT INTO trabalho_alan.users (username, password, phone, user_type) VALUES ('teste de usuario duzentos mil', '$2y$10$SKoi0nLOJebRZCi/hs7VZu0D8l1hCSdxfADogeiAFD1r1hIc2HeJK', '23123123123', 3);
INSERT INTO trabalho_alan.users (username, password, phone, user_type) VALUES ('usuario2', '$2y$10$DjfXUhNuwMTVzp2uwmKC/.Gsdjb0VAq/js3gb/G.rxXHty4rEeoS.', '123', 3);