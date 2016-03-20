<?php

/*
SQL Data types

Numeric
int or integer - integer number, 32 bits
smallint - integer, 16 bits
real - floating point number, 32 bits 
float - floating point number, 64 bits


Strings
char - fixed-lenght string
varchar - variable-lenght string

Creating Databases and Tables

CREATE DATASE <dbname>;
CREATE SCHEMA <dbname>;

this two forms are equivalent each other.

tables

CREATE TABLE <tablename>
	<coliname> <colitype> [<colnatributes>],
	[...
	<coliname> <colitype> [<colnatributes>],

CREATE TABLE book (
	id INT NOT NULL PRIMARY KEY,
	isbn VARCHAR(13),
	tible VARCHAR(255),
	author VARCHAR(255),
	public VARCHAR(255)
   );

Creating index and Relationships

CREATE INDEX <indexname>
ON <tablename> (<column1>[,... <column>]);

unique index on the isbn table

CREATE INDEX book_isbn ON book (isbn);


Relationship

CREATE TABLE book_chapter(
	isbn VARCHAR(13) REFERENCES book(id),
	chapter_number INT NOT NULL,
	chapter_title VARCHAR(255)
);

Dropping Objects

DROP TABLE book_chapter

To drop an entire schema

DROP SCHEMA my_book_database 

Adding and Manipulatin Data

INSERT INTO <tablename> VALUES (<fieldsValues>,[,..., <fieldvalues>])

INSERT INTO <tablename>
(<fieldN1>[,...,<fieldN12])
VALUES
(<field1Value>[,..., <fieldvalues])

SQL JOINS

Inner joins - returns rows from both tables only if keys from both can be found that satisfy the join conditions


SELECT * FROM book
INNER JOIN book_chapter on book.isbn = book_chapter.isbn;

Joins only work well with assertive conditions - negative conditions often return bizarre results

SELECT *
	FROM book
	INNER JOIN book_chapter ON book.isbn <> book_chapter.isbn


OUTER JOINS -
All data from both table with NULL values

LEFT JOIN
All data from left table, likely NULL data in right table

RIGHT JOIN
All data from right table, likely NULL data in left table


Advanced Database Topics

*/










