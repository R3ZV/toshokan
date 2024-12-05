CREATE DATABASE biblioteca CHARACTER SET=utf8mb4;

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'jsonderulo';

GRANT ALL ON biblioteca.* TO 'admin'@'localhost';

USE biblioteca;

CREATE TABLE user_roles (
  id INTEGER AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(128)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE users (
  id INTEGER AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(128),
  email VARCHAR(128),
  password VARCHAR(128),
  role_id INTEGER NOT NULL,
  FOREIGN KEY(role_id) REFERENCES user_roles(id) ON DELETE RESTRICT
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE migrations (
  id INTEGER AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(128),
  date DATE
)ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- roles
INSERT INTO user_roles (name)
VALUES('admin');

INSERT INTO user_roles (name)
VALUES('user');

-- add users
INSERT INTO users (first_name, last_name, password, role_id)
VALUES ('maracine', 'razvan', 'pass1', 1);

INSERT INTO users (first_name, last_name, password, role_id)
VALUES ('maracine', 'razvan', 'pass1', 2);

INSERT INTO migrations (name, date)
VALUES ('create_db_users_tables_1', '21/10/2024');
