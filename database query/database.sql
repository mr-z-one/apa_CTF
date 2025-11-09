CREATE DATABASE APA;


CREATE TABLE users
(
    id                int auto_increment PRIMARY KEY,
    username          varchar(25)  NOT NULL,
    email             varchar(255) NOT NULL,
    password          varchar(255) NOT NULL,
    name              varchar(25),
    last_name         varchar(25),
    gender            varchar(1),
    phone_number      varchar(11),
    active            tinyint(1)            DEFAULT 0,
    activation_code   varchar(255) NOT NULL,
    activation_expiry datetime     NOT NULL,
    activated_at      datetime              DEFAULT NULL,
    created_at        timestamp    NOT NULL DEFAULT current_timestamp(),
    updated_at        datetime              DEFAULT current_timestamp() ON UPDATE current_timestamp()

);