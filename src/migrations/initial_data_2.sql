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

-- Super user
-- only for localhost
INSERT INTO users (username, email, password, role, pass_status)
VALUES ('rzv', 'rzv@gmail.com', '2868679ac92cfae71c58312b9b6913375583b6ec7cef9b0285d1204f7a3be5b3', 'admin', '0');

INSERT INTO migrations (name, date)
VALUES ('initial_data_2', '2024/12/20');
