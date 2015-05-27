CREATE DATABASE IF NOT EXISTS dicionario_reacionario;

use dicionario_reacionario;

CREATE TABLE IF NOT EXISTS argumentos(
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(140) NOT NULL,
  argumentacao VARCHAR(255) NOT NULL,
  explicacao VARCHAR(255) NOT NULL,
  reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS usuarios(
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(140) NOT NULL,
  email VARCHAR(140) NOT NULL,
  senha VARCHAR(255) NOT NULL,
  role VARCHAR(255) NOT NULL,
  reg_date TIMESTAMP
);
