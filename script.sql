CREATE DATABASE hack;

CREATE TABLE utilisateur
(
    id INT PRIMARY KEY NOT NULL,
    avatar VARCHAR (255),
    pseudo VARCHAR(100),
    password VARCHAR(56),
)

CREATE TABLE goldenPage
(
    id INT PRIMARY KEY NOT NULL,
    titre VARCHAR (255),
    pseudo TEXT,
    CONSTRAINT fk_client_numero
        FOREIGN KEY (userId)
        REFERENCES utilisateur(id)
)