-- =========================================================
-- Catalogue de jeux vidéo - TP1
-- 582-31B-MA - Programmation Web avancée
-- =========================================================
 
DROP DATABASE IF EXISTS catalogue_jeux;
CREATE DATABASE catalogue_jeux;
USE catalogue_jeux;
 
-- ---------------------------------------------------------
-- Table: developpeur
-- Côté "1" de la relation 1-à-plusieurs avec jeu
-- ---------------------------------------------------------
CREATE TABLE developpeur (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    nom             VARCHAR(100) NOT NULL,
    pays_origine    VARCHAR(100),
    date_fondation  DATE
);
 
-- ---------------------------------------------------------
-- Table: jeu
-- Côté "plusieurs" de la relation avec developpeur (FK developpeur_id)
-- Participe aussi à la relation N-N avec plateforme
-- ---------------------------------------------------------
CREATE TABLE jeu (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    nom             VARCHAR(150) NOT NULL,
    description     TEXT,
    date_ajout      DATE,
    genre           VARCHAR(100),
    note            DECIMAL(3,1),
    date_sortie     DATE,
    developpeur_id  INT,
    CONSTRAINT fk_jeu_developpeur FOREIGN KEY (developpeur_id) REFERENCES developpeur(id)
);
 
-- ---------------------------------------------------------
-- Table: plateforme
-- Participe à la relation N-N avec jeu
-- ---------------------------------------------------------
CREATE TABLE plateforme (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    nom             VARCHAR(100) NOT NULL,
    description     TEXT,
    date_ajout      DATE,
    fabricant       VARCHAR(100),
    date_lancement  DATE
);
 
-- ---------------------------------------------------------
-- Table: jeu_plateforme
-- Table de jonction qui matérialise la relation N-N
-- entre jeu et plateforme
-- ---------------------------------------------------------
CREATE TABLE jeu_plateforme (
    jeu_id                  INT NOT NULL,
    plateforme_id           INT NOT NULL,
    date_sortie_plateforme  DATE,
    PRIMARY KEY (jeu_id, plateforme_id),
    CONSTRAINT fk_jeuplateforme_jeu
        FOREIGN KEY (jeu_id) REFERENCES jeu(id),
    CONSTRAINT fk_jeuplateforme_plateforme
        FOREIGN KEY (plateforme_id) REFERENCES plateforme(id)
);
 
-- =========================================================
-- Données
-- =========================================================
 
INSERT INTO developpeur (nom, pays_origine, date_fondation) VALUES
('CD Projekt Red', 'Pologne', '1994-01-01'),
('Bungie', 'États-Unis', '1991-05-01'),
('Lilith Games', 'Chine', '2013-01-01'),
('Iron Gate AB', 'Suède', '2019-03-01');
 
INSERT INTO jeu (nom, description, date_ajout, genre, note, date_sortie, developpeur_id) VALUES
('The Witcher 3', 'RPG en monde ouvert suivant Geralt de Riv.', CURDATE(), 'RPG', 9.5, '2015-05-19', 1),
('Destiny 2', 'Jeu de tir à la première personne en ligne gratuit.', CURDATE(), 'Action-mmo', 9.6, '2022-02-25', 2),
('Call of Dragons', 'Jeu de stratégie mobile en temps réel.', CURDATE(), 'Stratégie', 8.0, '2023-05-05', 3),
('Valheim', 'Jeu de survie theme Vikings.', CURDATE(), 'Survival', 9.4, '2026-09-09', 4);
 
INSERT INTO plateforme (nom, description, date_ajout, fabricant, date_lancement) VALUES
('PC', 'Plateforme de jeu sur ordinateur.', CURDATE(), 'Divers', NULL),
('Android', 'Plateforme mobile.', CURDATE(), 'Google', '2008-09-23');

 
INSERT INTO jeu_plateforme (jeu_id, plateforme_id, date_sortie_plateforme) VALUES
(1, 1, '2015-05-19'),
(2, 1, '2022-02-25'), 
(3, 2, '2023-05-05'),
(4, 1, '2026-09-09');  

