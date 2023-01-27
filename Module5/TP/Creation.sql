USE tp;
DROP DATABASE tp;

CREATE DATABASE tp;
USE tp;

CREATE TABLE modeles
(
    id_modele varchar(10),
    marque    varchar(255) not null,
    modele    varchar(255) not null,
    carburant varchar(10)  not null
);

CREATE TABLE voitures
(
    immat       varchar(7),
    id_modele   varchar(10) not null,
    couleur     char(2)     not null,
    datevoiture date        not null
);

CREATE TABLE proprietaires
(
    id_pers    int auto_increment primary key,
    nom        varchar(255) not null,
    prenom     varchar(255) not null,
    adresse    varchar(255) not null,
    ville      varchar(255) not null,
    codepostal char(5)      not null
);

CREATE TABLE cartesgrises
(
    id_pers   int,
    immat     varchar(7),
    datecarte date not null
);

-- primary keys
ALTER TABLE modeles
    ADD CONSTRAINT pk_modeles PRIMARY KEY (id_modele);
ALTER TABLE voitures
    ADD CONSTRAINT pk_voitures PRIMARY KEY (immat);
-- ALTER TABLE proprietaires
-- ADD CONSTRAINT pk_proprietaires PRIMARY KEY (id_pers);
ALTER TABLE cartesgrises
    ADD CONSTRAINT pk_cartesgrises PRIMARY KEY (id_pers, immat);

-- foreign keys
ALTER TABLE cartesgrises
    ADD CONSTRAINT fk_modeles_proprietaires FOREIGN KEY (id_pers)
        REFERENCES proprietaires (id_pers);
ALTER TABLE cartesgrises
    ADD CONSTRAINT fk_modeles_voitures FOREIGN KEY (immat)
        REFERENCES voitures (immat);
ALTER TABLE voitures
    ADD CONSTRAINT fk_voitures_modeles FOREIGN KEY (id_modele)
        REFERENCES modeles (id_modele);

-- check
ALTER TABLE voitures
    ADD CONSTRAINT ch_voitures_couleur
        CHECK (couleur = 'CL' OR couleur = 'MO' OR couleur = 'FO');
ALTER TABLE modeles
    ADD CONSTRAINT ch_modeles_carburant
        CHECK (carburant = 'essence' OR carburant = 'diesel' OR
               carburant = 'gpl' OR carburant = 'électrique');

-- Data
INSERT INTO modeles (id_modele, marque, modele, carburant)
VALUES ('POR_911_ES', 'Porsche', '911 GT3 Cup', 'essence');
INSERT INTO modeles (id_modele, marque, modele, carburant)
VALUES ('REN_MEG_ES', 'Renault', 'Mégane', 'essence');
INSERT INTO modeles (id_modele, marque, modele, carburant)
VALUES ('TESLA_S_EL', 'Tesla', 'Model S', 'électrique');

INSERT INTO voitures (immat, id_modele, couleur, datevoiture)
VALUES ('AB123CD', 'REN_MEG_ES', 'MO', '1996-01-31');
INSERT INTO voitures (immat, id_modele, couleur, datevoiture)
VALUES ('AB987BA', 'POR_911_ES', 'CL', '2018-03-15');

INSERT INTO proprietaires (nom, prenom, adresse, ville, codepostal)
VALUES ('MARTIN', 'Julie', '34 rue de la plage', 'Plougrescant', '22820');
INSERT INTO proprietaires (nom, prenom, adresse, ville, codepostal)
VALUES ('LEGALL', 'Erwan', '142 boulevard Gambetta', 'Brest', '29200');