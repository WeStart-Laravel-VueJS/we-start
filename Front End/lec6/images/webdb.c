Java => Oracle 
ASP => MSServer
VB => Access
PHP => MySQL
Node => MongoDB
Fluter => Firebase

SQL => Structre Query Language

books
id | name | image | price | content
1 | PHP | dd.jpg | 100 | lorem
2 | PHP | dd.jpg | 100 | lorem

SQL

CRUD Application

C => Create -> INSERT
INSERT INTO table_name (cols) VALUES (vals)

INSERT INTO books (name, image, price, content)
VALUES ('Math', 'aa.png', 100, 'lorem')

R => Read -> SELECT
SELECT * FROM table_name

SELECT * FROM books
SELECT * FROM books WHERE id = 2
SELECT * FROM users WHERE email = 'moh@gmail.com' AND password = '123'
SELECT id, name FROM books
SELECT * FROM books ORDER BY id DESC
SELECT * FROM books ORDER BY id DESC LIMIT 3
SELECT * FROM books OFFSET 3

U => Update
UPDATE table_name SET col=val, col2=val2 WHERE Cond
UPDATE books SET name='Math', price=80 WHERE id = 4

D => Delete
DELETE FROM table_name WHERE Cond

DELETE FROM books WHERE id = 3 
delete






