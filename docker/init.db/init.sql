--
-- SQL Script
-- See .env to accord database name, user_name and password
--

CREATE DATABASE IF NOT EXISTS dev_cyber_repository;

USE dev_cyber_repository;

CREATE TABLE dev_cyber_repository.user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(45) NOT NULL,
    password VARCHAR(64) NOT NULL
);

CREATE TABLE dev_cyber_repository.account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(45) NOT NULL,
    firstname VARCHAR(30),
    gender SMALLINT NOT NULL default 0,
    user_id INT NOT NULL,
    UNIQUE user_id,
    FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE dev_cyber_repository.role (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(20) NOT NULL,
    UNIQUE role
);

CREATE TABLE dev_cyber_repository.user_has_role (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    role_id INT NOT NULL,
    UNIQUE (user_id, role_id)
);

INSERT INTO dev_cyber_repository.user (name) VALUES 
    ('admin', 'super_admin'),
    ('a.dupont', 'DuP0nT!');

INSERT INTO dev_cyber_repository.account (lastname, firstname, gender, user_id) VALUES
    ('Xavier', 'Lebausse', 1, 1),
    ('Dupont', 'Antoine', 1, 2);

INSERT INTO dev_cyber_repository.role (role) VALUES 
    ('Administrateur'),
    ('Utilisateur');

INSERT INTO dev_cyber_repository.user_has_role (user_id, role) VALUES 
    (1, 1),
    (1, 2),
    (2, 2);

CREATE USER 'dev_db_admin'@localhost IDENTIFIED BY 'dev_secret_password';
CREATE USER 'dev_db_admin'@'%' IDENTIFIED BY 'dev_secret_password';

GRANT ALL PRIVILEGES ON `dev_cyber_repository`.* TO 'dev_db_admin'@'localhost';
GRANT ALL PRIVILEGES ON `dev_cyber_repository`.* TO 'dev_db_admin'@'%';

FLUSH PRIVILEGES;