<?php
/*
Databases

Save da1ta
    efficient storage
    efficient access

Use query language, such

Exam is database independent SQL
    no special SQL dialect
    no special SQL functions

 Keys
    Primary keys
    column(s) that describe(s) an entry in the data table

Foreign Key
    Primary key from another table
    Enables relational database

SQL
    create a table

    CREATE TABLE tbl{
        id INT NOT NULL KEY,
        field1 VACHAR(10),
        field CHAR(32) NOT NULL
    }

   Read data

    SELECT field1, field2 FROM tb1
        WHERE field3 = 'value

    Insert Data

    INSERT INTO (field1, field2, field3) VALUES ('value1','1','value3')

    UPDATE DATA
        UPDATE tbl
            SET field = 'value1', field2 = 'value2'
            WHERE field3 = 'value3'

    DELETE DATA
        DELETE FROM tb WHERE field1 = 'value1'
        DROP TABLE tbl
        DROP DATABASE tb1

Sorting

    ORDER BY
    ASC = ASCENDING, DEFAULT
    DESC = DESCENDIN

SELECT * FROM tb1 ORDER BY col DESC

    GROUP BY
    Usually the columns the query groups by must be part of the SELECT list

    SELECT col1, col2, FROm tb1
    GROUP BY col1

Aggregation

    AVG Average valu
    COUNT Number of elements
    DISTINCT COUNT() Number of distinct elements
    MIN() Minimun value
    MAX() Maximum value
    SUM()

Joins
    INNER JOIN

    SELECT * FROM tb1
    INNER JOIN tb2
    ON tb1.primary = tb2.forkwy
    WHERE tb1.colo = 'value'

    returns all entries in tab1 an tab2 that are linked using the primary/foreing key and that fullfill
    the HERE clause in tab1

    LEFT JOIN

    SELECT * FROM tb1
    LEFT JOIN tb2
    ON tb1.primary = tb2.forkwy
    WHERE tb1.colo = 'value'

    The data from the 'left' table is used in any case, even if there is no match in the "right" table

    If there are no matching rows in the right table and the table's rows are selected, the columns' values
    will be NULL

    RIGHT JOIN

    SELECT * FROM tb1
    RIGHT JOIN tb2
    ON tb1.primary = tb2.forkwy
    WHERE tb1.colo = 'value'

    The data from the 'right' table is used in any case, even if there is no match in the "right" table

    If there are no matching rows in the right table and the table's rows are selected, the columns' values
    will be NULL

    Transactions

    Single SQL operations are joined together as one

    ACID
        A: Atomic
        C: Consistent
        I: Isolated
        D: Durable

    Usually start with BEGIN or BEGIN TRANSACTION

    Execute the transaction using COMMIT

    Cancel the transaction ROLLBACK


Prepared Statements

    Similar in concept to templates, as they contain compiled code used to run common SQL operations

    Advantages:
        Queries only parsed once, but capable of multiple executions with the same or different parameter( performance consideration)
        Related parameter do not need to be quoted as security concern

    PDO will emulate for adapters that do not support prepared statements


PDO
    Acronym for PHP Data Objects extension

    Provides interface for accessing databases(data-access abstraction layer)

    Can use the same function to manipulate database, across all types
    Not for data type or SQL abstraction

    Must use database-specific PDO adapters to access a DB server
        Database adapters implementing interfaces expose database-specific as regular extension functions

    Runtime configuration options:
        pdo.dsn. * in php.ini
        PDO::setAttribute()

    Error settings:: PDO::ERRMODE_SILENT PDO::ERROMODE_WARNING,
    PDO::ERRMODE_EXCEPTIONS

PDO Connectinos

    Connectinos made by creatins an instance of the PDO class, not by creating instance of PDOstatement
or PDOException

Example: Connecting to MySQL

PDO('mysql::host=localhost;dbname=tesete', $user, $password);

PDO - Queries

    PDO::query() execute a SQL statement in a single function call
    Returns resulting values as a PDOStatement object
    Must retrieve data in the result set before calling query function again

    More on PDOStatement
        Only values can be bound, not entities like table names or column names
        Only scalar can be bound to values (not arrays or nulls)

    PDOStatement->setFetchMode sets the default fetch mode

PDO Transactions

Some examples of commonly used methos

PDO::beginTransactions() turns off autocommit mode for changes made to the database

PDO::commit() ends transaction and commits changes

PDO::rollback() reverse all changes made to DB and reactivates autocommit mode, if on

PDO::exec() executes a SQL statement in a single function call. returns # rows affected

PDO::prepare() used to prep the object; statement issued by PDOStatement;:execute()

 */