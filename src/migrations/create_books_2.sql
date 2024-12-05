CREATE TABLE books (
  id INTEGER AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(64),
  author VARCHAR(64),
  description VARCHAR(128),
  genre VARCHAR(128),
  stock INTEGER NOT NULL,
  published INTEGER
)ENGINE=InnoDB CHARSET=utf8mb4;


-- BOOKS
INSERT INTO books (title, author, description, genre, stock, published)
VALUES ('Dune', 'Frank Herbert', 'A science fiction epic about desert planets.', 'Science Fiction', 10, 1965);

INSERT INTO books (title, author, description, genre, stock, published)
VALUES ('It', 'Stephen King', 'A horror story about a shape-shifting creature.', 'Horror', 8, 1986);

INSERT INTO books (title, author, description, genre, stock, published)
VALUES ('Emma', 'Jane Austen', 'A story about love and social status.', 'Romance, Classic', 5, 1815);

INSERT INTO books (title, author, description, genre, stock, published)
VALUES ('Wolf', 'Mo Hayder', 'A dark thriller involving a twisted crime.', 'Thriller', 7, 2014);

INSERT INTO books (title, author, description, genre, stock, published)
VALUES ('Sapiens', 'Yuval Noah Harari', 'A history of humankind.', 'Non-Fiction, History', 12, 2011);

INSERT INTO books (title, author, description, genre, stock, published)
VALUES ('Dracula', 'Bram Stoker', 'A tale of the legendary vampire.', 'Horror, Gothic', 6, 1897);

INSERT INTO migrations (name, date)
VALUES ('create_books_2', '27/11/2024');
