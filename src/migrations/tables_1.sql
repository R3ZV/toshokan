CREATE DATABASE toshokan CHARACTER SET=utf8mb4;

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'jsonderulo';

GRANT ALL ON toshokan.* TO 'admin'@'localhost';

USE toshokan;

CREATE TABLE users (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(128),
    email VARCHAR(128) UNIQUE,
    password VARCHAR(128),
    role VARCHAR(10),
    pass_status BOOLEAN
)ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE books (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(64),
    author VARCHAR(64),
    description VARCHAR(128),
    genre VARCHAR(128),
    stock INTEGER NOT NULL,
    published INTEGER
)ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE barrows (
    id_book INTEGER,
    id_user INTEGER,
    status BOOLEAN,
    PRIMARY KEY (id_book, id_user),
    FOREIGN KEY (id_book) REFERENCES books(id),
    FOREIGN KEY (id_user) REFERENCES users(id)
)ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE migrations (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(128),
    date DATE
)ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO migrations (name, date)
VALUES ('tables_1', '2024/12/20');
