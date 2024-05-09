/*Uso necesario de una base de datos albumdatabase*/
CREATE DATABASE IF NOT EXISTS albumdatabase;
USE albumdatabase;
CREATE TABLE IF NOT EXISTS albumtable(
id INT PRIMARY KEY AUTO_INCREMENT,
imageBlob LONGBLOB,
tittle VARCHAR(10),
description VARCHAR(30),
last_update DATETIME
);





