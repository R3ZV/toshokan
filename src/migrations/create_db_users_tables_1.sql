CREATE DATABASE biblioteca CHARACTER SET=utf8mb4;

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'jsonderulo';

GRANT ALL ON biblioteca.* TO 'admin'@'localhost';

USE biblioteca;


CREATE TABLE migrations (
  id INTEGER AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(128),
  date DATE
)ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE users (
  id INTEGER AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(128),
  email VARCHAR(128) UNIQUE,
  password VARCHAR(128),
  role VARCHAR(10)
)ENGINE=InnoDB CHARSET=utf8mb4;

-- add users
-- only for localhost
INSERT INTO users (username, email, password, role)
VALUES ('rzv', 'rzv@gmail.com', '2868679ac92cfae71c58312b9b6913375583b6ec7cef9b0285d1204f7a3be5b3', 'admin');

INSERT INTO migrations (name, date)
VALUES ('create_db_users_tables_1', '21/10/2024');
