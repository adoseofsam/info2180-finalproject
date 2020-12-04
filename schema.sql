CREATE DATABASE IF NOT EXISTS BugMe;

USE BugMe;

CREATE TABLE Users (
   id INT AUTO_INCREMENT,
   first_name VARCHAR(64),
   last_name VARCHAR(64),
   password VARCHAR(64),
   email VARCHAR(64),
   date_joined DATETIME,
   PRIMARY KEY(id));

CREATE TABLE Issues(
   id INT AUTO_INCREMENT,
   title VARCHAR(64),
   description text(64),
   type VARCHAR(64),
   priority VARCHAR(64),
   status VARCHAR(64),
   assigned_to INTEGER(20),
   created_by INTEGER(20),
   created DATETIME,
   updated DATETIME,
   PRIMARY KEY(id));

INSERT INTO Users ( id, first_name, last_name, password, email, date_joined)
  VALUES (1, 'Britney', 'Anderson', 'password123', 'admin@project2.com', 2020-04-01);



