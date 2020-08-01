CREATE DATABASE yeti_cave
DEFAULT CHARACTER SET utf8mb4
DEFAULT COLLATE utf8mb4_general_ci;

USE yeti_cave;

CREATE TABLE categories (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(128) NOT NULL UNIQUE,
  code VARCHAR(128) NOT NULL UNIQUE
);

CREATE TABLE lots (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  author_id INT UNSIGNED NOT NULL,
  winner_id INT UNSIGNED,
  category_id INT UNSIGNED NOT NULL,
  start_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  name VARCHAR(128) NOT NULL,
  description VARCHAR(128) NOT NULL,
  image VARCHAR(128) NOT NULL,
  start_price INT UNSIGNED NOT NULL,
  finish_date DATE NOT NULL,
  bet_step INT UNSIGNED NOT NULL
);

CREATE TABLE bets (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NOT NULL,
  lot_id INT UNSIGNED NOT NULL,
  date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  price INT UNSIGNED NOT NULL
);

CREATE TABLE users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  email VARCHAR(128) NOT NULL UNIQUE,
  name VARCHAR(128) NOT NULL UNIQUE,
  password VARCHAR(128) NOT NULL,
  contacts VARCHAR(128) NOT NULL
);

CREATE INDEX category_index ON categories(name);

CREATE INDEX lot_index ON lots(name);

CREATE FULLTEXT INDEX lot_fulltext_index ON lots(name, description);
