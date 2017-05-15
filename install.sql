DROP DATABASE IF EXISTS db_lab9;
CREATE DATABASE db_lab9;
USE db_lab9;

CREATE TABLE multimedia_files
(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL UNIQUE,
  category VARCHAR(255) NOT NULL,
  format_type VARCHAR(255) NOT NULL,
  genre VARCHAR(255) NOT NULL,
  path VARCHAR(255) NOT NULL
);

INSERT INTO multimedia_files(title, category, format_type, genre, path) VALUES
  ('111', 'b', 'jpeg', 'aaa', '111'),
  ('222', 'b', 'mp4', 'aaa', '222');