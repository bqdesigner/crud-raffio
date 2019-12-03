create database db_pi;

use db_pi;	

/* Tabela criação usuários */
CREATE TABLE usuarios (
  id_usuario INT NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(200) NOT NULL,
  senha VARCHAR(32) NOT NULL,
  nome VARCHAR(100) NOT NULL,
  email varchar(100) unique not null,
  data_cadastro DATETIME NULL,
  data_modificado DATETIME NULL,
  first_login TINYINT NOT NULL,
  PRIMARY KEY (id_usuario)
);

select * from usuarios;
drop table usuarios;
desc usuarios;
truncate usuarios;

alter table usuarios add data_modificado DATETIME NOT NULL;
alter table usuarios change data_modificado data_modificado DATETIME NULL;

update usuarios set data_modificado = "";

/* Inserindo dados manualmente */
insert into usuarios (usuario, senha) values ('brunoque', md5('12345'));
select id_usuario from usuario where usuario = 'brunoque' and senha = md5('12345');

/* Tabela e infos para criação do Raff */
create table novo_raff (
	id_raff int not null auto_increment,
    id_usuario int not null,
    nome_projeto varchar(300) not null,
    categ_projeto varchar(300) not null,
    ideia varchar(800) not null,
    ref varchar(300) not null,
    upload varchar(300) not null,
    consideracao varchar(800) not null,
    finalizar_raff varchar(800) not null,
    data_criacao DATETIME not null,
    primary key (id_raff),
    constraint fk_usuarios foreign key (id_usuario) references usuarios (id_usuario) 
);

INSERT INTO novo_raff (id_usuario, nome_projeto, categ_projeto, ideia, ref, upload, consideracao, finalizar_raff, data_criacao) VALUES (1, '1212','1212', 'asaas', 'asasa', 'asas', 'asas', 'asas@asas', '2006-06-13 18:00');

select * from novo_raff;
desc novo_raff;
drop table novo_raff;
truncate novo_raff;

/* Tabela para reportar erro */
create table report (
	id_erro int not null auto_increment,
    id_usuario int not null,
    report varchar(1000) not null,
    primary key (id_erro)
);

select * from report;
desc report;
drop table report;
truncate report;


