create table users (
    id int auto_increment primary key,
    username varchar(64),
    email varchar(128),
    senha varchar(100)
);

/* REVER ESSA TABELA */
create table agendamentos (
    id int auto_increment primary key,
    user_id int,
    telefone varchar(19),
    data varchar(255),
    hora varchar(255),
    quadra varchar(255),

    foreign key (user_id) references users(id)
);
