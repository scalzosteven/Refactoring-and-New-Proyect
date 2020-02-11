create table customers
(
    id   int auto_increment
        primary key,
    name varchar(30) not null
);

create table viajes
(
    id          int auto_increment
        primary key,
    id_customer int         null,
    city        varchar(20) null,
    price       int         not null,
    constraint id_customer
        foreign key (id_customer) references customers (id)
            on update cascade on delete cascade
);

