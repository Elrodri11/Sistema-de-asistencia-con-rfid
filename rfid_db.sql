CREATE DATABASE rfid_db;

USE rfid_db;

CREATE TABLE registros (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    uid VARCHAR(50) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE alumnos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    uid VARCHAR(50) NOT NULL,
    username VARCHAR(100) UNIQUE NOT NULL,  -- Unique username for login
    password VARCHAR(255) NOT NULL  -- Hashed password
);

CREATE TABLE profesores (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    uid VARCHAR(50) NOT NULL,
    username VARCHAR(100) UNIQUE NOT NULL,  -- Unique username for login
    password VARCHAR(255) NOT NULL  -- Hashed password
);

CREATE TABLE administradores (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    username VARCHAR(100) UNIQUE NOT NULL,  -- Unique username for login
    password VARCHAR(255) NOT NULL  -- Hashed password
);