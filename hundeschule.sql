-- Erstellt die Datenbank 'hundeschule', falls sie nicht existiert
CREATE DATABASE IF NOT EXISTS hundeschule;

-- Wechselt zur Datenbank 'hundeschule', damit alle weiteren Befehle darauf ausgeführt werden
USE hundeschule;

-- Erstellt die Tabelle 'kontakt', falls sie nicht existiert
CREATE TABLE IF NOT EXISTS kontakt (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    kurs VARCHAR(100) NOT NULL,
    message TEXT
);