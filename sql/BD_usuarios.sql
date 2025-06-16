CREATE DATABASE PolyglotNow CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE DATABASE PolyglotNow;

CREATE TABLE usuarios (
    usuario VARCHAR(50) PRIMARY KEY,
    contra VARCHAR(255) NOT NULL,
    idioma ENUM('Español', 'English') NOT NULL,
    c_ing BOOLEAN DEFAULT 0,
    c_esp BOOLEAN DEFAULT 0,
    c_fra BOOLEAN DEFAULT 0,
    c_ita BOOLEAN DEFAULT 0,
    c_ale BOOLEAN DEFAULT 0,
    c_rum BOOLEAN DEFAULT 0
);
