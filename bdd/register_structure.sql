/* Création de la base de données */

CREATE DATABASE mind_map CHARACTER SET utf8 COLLATE utf8_general_ci;

/* Création des tables */

CREATE TABLE ligue
(
    id_ligue BIGINT(11) Auto_Increment,
    lib_ligue VARCHAR(255),
    CONSTRAINT PK_ID_LIGUE PRIMARY KEY (id_ligue)
)ENGINE=InnoDb;

CREATE TABLE usertype
(
    id_usertype BIGINT(11) Auto_Increment,
    lib_usertype VARCHAR(255),
    description VARCHAR(255),
    CONSTRAINT PK_ID_USERTYPE PRIMARY KEY (id_usertype)
)ENGINE=InnoDb;

CREATE TABLE `users`
(
    id_user BIGINT(11) Auto_Increment,
    username VARCHAR(255),
    mdp VARCHAR(255),
    email VARCHAR(255),
    id_usertype BIGINT(11),
    id_ligue BIGINT(11),
    CONSTRAINT PK_ID_USER PRIMARY KEY (id_user),
    CONSTRAINT FK_ID_USERTYPE FOREIGN KEY (id_usertype) REFERENCES usertype (id_usertype),
    CONSTRAINT FK_ID_LIGUE FOREIGN KEY (id_ligue) REFERENCES ligue (id_ligue)
)ENGINE=InnoDb;

CREATE TABLE faq
(
    id_faq BIGINT(11) Auto_Increment,
    question TEXT,
    reponse TEXT,
    dat_question DATETIME,
    dat_reponse DATETIME,
    id_user BIGINT(11),
    CONSTRAINT PK_ID_FAQ PRIMARY KEY (id_faq),
    CONSTRAINT FK_ID_USER FOREIGN KEY (id_user) REFERENCES users (id_user)
)ENGINE=InnoDb;