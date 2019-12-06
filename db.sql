-- para conectar ao MySQL: mysql --user=root --password=

-- cria a base de dados
create schema db_test default character set utf8;

-- seleciona a base de dados
use db_test

-- cria a tabela de usuarios
create table tb_usuarios (
    id int primary key auto_increment,
    nome varchar(250) not null,
    email varchar(150) unique not null,
    senha varchar(255) not null,
    tipo_user varchar(5) not null default "user"
) default character set utf8;

-- insere dois usuarios
insert into tb_usuarios(nome, email, senha, tipo_user) values ("Administrador", "admin@senac.com.br", "123456", "admin");
insert into tb_usuarios(nome, email, senha) values ("Usuario do Sistema", "usuario@senac.com.br", "123456");
insert into tb_usuarios(nome, email, senha) values ("Usuario2 do Sistema", "usuario2@senac.com.br", md5("123456"));

-- exibe todas as tabelas
show tables;

-- descreve a tabela selecionada
desc tb_usuarios;

-- lista todos os usuários com todas as colunas da tabela
select * from tb_usuarios;
