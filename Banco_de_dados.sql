create database setimaArte;

use setimaArte;

create table Cinema(
cod_cinema int not null primary key auto_increment,
nome_cinema varchar(50) not null,
shopping_cinema varchar(50),
email_cinema varchar(50)
);


create table Filmes(
cod_filme int not null primary key auto_increment,
nome_filme varchar(50) not null,
preco_sessao float not null,
classificacao char(2) not null,
nota_filme int,
horario_filme datetime,
fk_cod_cinema int not null,
foto_filme varchar(150)
);



insert into cinema (nome_cinema, shopping_cinema) values ('Cinepolis', 'Shopping Estação');
insert into cinema (nome_cinema, shopping_cinema) values ('CineArt', 'Minas Shopping');
insert into cinema (nome_cinema, shopping_cinema) values ('CineTJ', 'Pampula Mall');



insert into filmes values (null,'Vingadores Guerra Infinita',27.00, '12', 10, '2018-05-15 17:30', 1, 'vingadores.jpg', '3D');

insert into filmes values (null,'Vingadores Guerra Infinita',28.00, '12', 10, '2018-05-15 18:10', 2, 'vingadores.jpg', '3D');

insert into filmes values (null,'Vingadores Guerra Infinita',13.44, '12', 10, '2018-05-16 15:25', 3, 'vingadores.jpg', '3D');

insert into filmes values (null,'DeadPool',13.44, '12', 10, '2018-05-16 15:25', 3, 'deadpool.jpg.jpg', '3D');


insert into filmes values (null,'DeadPool',28.44, '16', 10, '2018-05-16 15:25', 1, 'deadpool.jpg.jpg', '3D');

insert into filmes values (null,'DeadPool',27.50, '16', 10, '2018-05-16 15:25', 2, 'deadpool.jpg.jpg', '3D');

delete from filmes where cod_filme = 9;

select * from filmes;


select f.foto_filme, f.nome_filme, f.classificacao, c.nome_cinema, f.preco_sessao, f.opcao
from cinema c JOIN filmes f ON (c.cod_cinema = f.fk_cod_cinema)
where cod_cinema = fk_cod_cinema
AND nome_filme = 'Vingadores Guerra Infinita'
order by preco_sessao desc;


SELECT f.foto_filme, f.nome_filme, f.classificacao, c.nome_cinema, f.preco_sessao, f.opcao
FROM cinema c JOIN filmes f ON (c.cod_cinema = f.fk_cod_cinema)
WHERE cod_cinema = fk_cod_cinema
AND nome_filme LIKE '%A%' 
ORDER BY preco_sessao desc;



/**************************************************setima arte acima******************************************************* */

create database bd_cliente;

use bd_cliente;

create table clientes(
id int auto_increment not null primary key,
cpf char(14),
nome varchar(80),
endereco varchar(100),
numero int,
cep char(10),
bairro varchar(50),
cidade varchar(50),
uf char(2),
telefone char(15),
dt_Nasc date);x



















