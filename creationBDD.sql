-- Créer la base de données
CREATE DATABASE IF NOT EXISTS IoT_C;

-- Utiliser la base de données nouvellement créée
USE IoT_C;

-- Créer la table Batiment
CREATE TABLE IF NOT EXISTS Batiment (
    nom_batiment VARCHAR(100)  PRIMARY KEY,
    coordonnees_GPS VARCHAR(50),
    superficie DECIMAL(10, 2),
    date_construction DATE,
    type_batiment VARCHAR(50)
);
-- Créer la table Module
CREATE TABLE IF NOT EXISTS Module (
    id_capteur INT PRIMARY KEY AUTO_INCREMENT,
    nom_batiment VARCHAR(100),
    date_installation DATE,
    fabricant VARCHAR(100),
    marque VARCHAR(100),
    etage INT,
    type_energie VARCHAR(50),
    type_donnee VARCHAR(50),
    categorie VARCHAR(50),
    protocol_communication VARCHAR(50),
    prix DECIMAL(10, 2) DEFAULT 0.0,
    FOREIGN KEY (nom_batiment ) REFERENCES Batiment(nom_batiment )

);
