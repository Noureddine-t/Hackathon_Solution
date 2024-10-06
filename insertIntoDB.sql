-- Ajout de bâtiments
INSERT INTO Batiment (nom_batiment, coordonnees_GPS, superficie, date_construction, type_batiment)
VALUES
    ('Bâtiment A', '48.858844, 2.294350', 1200, '2020-01-15', 'Résidence'),
    ('Bâtiment B', '48.865148, 2.377594', 800, '2019-05-20', 'Commercial'),
    ('Bâtiment C', '48.873942, 2.294351', 1500, '2022-02-10', 'Industriel'),
    ('Bâtiment D', '48.853469, 2.347080', 1000, '2018-10-05', 'Résidence'),
    ('Bâtiment E', '48.861983, 2.331067', 900, '2021-08-30', 'Commercial');

-- Ajout de capteurs dans les bâtiments
INSERT INTO Module (date_installation, fabricant, marque, etage, type_energie, type_donnee, categorie, protocol_communication, prix, nom_batiment)
VALUES
    ('2020-02-01', 'CapteurTech', 'ModèleA', 1, 'Eau', 'Température', 'Capteur', 'LoRanWan', 100, 'Bâtiment A'),
    ('2019-06-01', 'SensorCo', 'ModèleB', 2, 'Électricité', 'Alerte', 'Actionneur', 'IP', 150, 'Bâtiment B'),
    ('2022-02-15', 'IoTInnov', 'ModèleC', 3, 'Gaz', 'Plage horaire', 'Passerelle', 'LoRanWan', 120, 'Bâtiment D'),
    ('2018-11-15', 'TechSensors', 'ModèleD', 1, 'Eau', 'Compteur', 'Capteur', 'LoRanWan', 80, 'Bâtiment C'),
    ('2021-10-01', 'SmartDevices', 'ModèleE', 2, 'Électricité', 'Consigne', 'Actionneur', 'IP', 200, 'Bâtiment C'),
    ('2020-03-10', 'ConnectIoT', 'ModèleF', 3, 'Gaz', 'Température', 'Capteur', 'LoRanWan', 130, 'Bâtiment E'),
    ('2019-01-20', 'TechInnovate', 'ModèleG', 2, 'Électricité', 'Alerte', 'Passerelle', 'IP', 180,'Bâtiment E'),
    ('2022-04-05', 'InnoSensors', 'ModèleH', 1, 'Eau', 'Consigne', 'Actionneur', 'LoRanWan', 160, 'Bâtiment C'),
    ('2018-12-01', 'FutureTech', 'ModèleI', 3, 'Gaz', 'Plage horaire', 'Capteur', 'LoRanWan', 90, 'Bâtiment A'),
    ('2021-11-20', 'SensorsPlus', 'ModèleJ', 2, 'Électricité', 'Température', 'Actionneur', 'IP', 220, 'Bâtiment E');

    -- Ajout de nouveaux bâtiments
INSERT INTO Batiment (nom_batiment, coordonnees_GPS, superficie, date_construction, type_batiment)
VALUES
    ('Bâtiment F', '48.870123, 2.310456', 1100, '2021-03-25', 'Résidence'),
    ('Bâtiment G', '48.845678, 2.325689', 950, '2020-07-10', 'Commercial'),
    ('Bâtiment H', '48.888888, 2.333333', 1300, '2022-01-18', 'Industriel'),
    ('Bâtiment I', '48.855555, 2.366666', 1050, '2019-11-15', 'Résidence'),
    ('Bâtiment J', '48.899999, 2.299999', 880, '2020-09-05', 'Commercial');

    -- Ajout de nouveaux modules dans les bâtiments existants
INSERT INTO Module (date_installation, fabricant, marque, etage, type_energie, type_donnee, categorie, protocol_communication, prix, nom_batiment)
VALUES
    ('2021-05-01', 'SensorTech', 'ModèleK', 2, 'Électricité', 'Température', 'Capteur', 'LoRanWan', 110, 'Bâtiment F'),
    ('2020-08-01', 'SmartSensors', 'ModèleL', 1, 'Eau', 'Alerte', 'Actionneur', 'IP', 160, 'Bâtiment G'),
    ('2022-02-20', 'TechInnovate', 'ModèleM', 3, 'Gaz', 'Plage horaire', 'Passerelle', 'LoRanWan', 140, 'Bâtiment H'),
    ('2019-12-15', 'ConnectIoT', 'ModèleN', 2, 'Électricité', 'Compteur', 'Capteur', 'LoRanWan', 95, 'Bâtiment I'),
    ('2020-10-10', 'InnoDevices', 'ModèleO', 3, 'Gaz', 'Température', 'Capteur', 'LoRanWan', 120, 'Bâtiment J');

    -- Ajout de 20 nouveaux capteurs
INSERT INTO Module (date_installation, fabricant, marque, etage, type_energie, type_donnee, categorie, protocol_communication, prix, nom_batiment)
VALUES
    ('2021-05-01', 'SensorTech', 'ModèleK', 2, 'Électricité', 'Température', 'Capteur', 'LoRanWan', 110, 'Bâtiment F'),
    ('2020-08-01', 'SmartSensors', 'ModèleL', 1, 'Eau', 'Alerte', 'Actionneur', 'IP', 160, 'Bâtiment G'),
    ('2022-02-20', 'TechInnovate', 'ModèleM', 3, 'Gaz', 'Plage horaire', 'Passerelle', 'LoRanWan', 140, 'Bâtiment H'),
    ('2019-12-15', 'ConnectIoT', 'ModèleN', 2, 'Électricité', 'Compteur', 'Capteur', 'LoRanWan', 95, 'Bâtiment I'),
    ('2020-10-10', 'InnoDevices', 'ModèleO', 3, 'Gaz', 'Température', 'Capteur', 'LoRanWan', 120, 'Bâtiment J'),
    ('2021-05-15', 'SensorTech', 'ModèleP', 1, 'Eau', 'Alerte', 'Actionneur', 'IP', 130, 'Bâtiment F'),
    ('2020-08-20', 'SmartSensors', 'ModèleQ', 2, 'Électricité', 'Température', 'Capteur', 'LoRanWan', 180, 'Bâtiment G'),
    ('2022-03-01', 'TechInnovate', 'ModèleR', 3, 'Gaz', 'Plage horaire', 'Passerelle', 'LoRanWan', 150, 'Bâtiment H'),
    ('2019-11-25', 'ConnectIoT', 'ModèleS', 1, 'Électricité', 'Compteur', 'Capteur', 'LoRanWan', 120, 'Bâtiment I'),
    ('2020-09-15', 'InnoDevices', 'ModèleT', 2, 'Gaz', 'Température', 'Capteur', 'LoRanWan', 140, 'Bâtiment J'),
    ('2021-06-01', 'SensorTech', 'ModèleU', 3, 'Eau', 'Alerte', 'Actionneur', 'IP', 160, 'Bâtiment F'),
    ('2020-07-10', 'SmartSensors', 'ModèleV', 1, 'Électricité', 'Température', 'Capteur', 'LoRanWan', 130, 'Bâtiment G'),
    ('2022-03-15', 'TechInnovate', 'ModèleW', 2, 'Gaz', 'Plage horaire', 'Passerelle', 'LoRanWan', 170, 'Bâtiment H'),
    ('2019-11-30', 'ConnectIoT', 'ModèleX', 3, 'Électricité', 'Compteur', 'Capteur', 'LoRanWan', 110, 'Bâtiment I'),
    ('2020-09-25', 'InnoDevices', 'ModèleY', 1, 'Gaz', 'Température', 'Capteur', 'LoRanWan', 140, 'Bâtiment J'),
    ('2021-06-10', 'SensorTech', 'ModèleZ', 2, 'Eau', 'Alerte', 'Actionneur', 'IP', 180, 'Bâtiment F'),
    ('2020-07-20', 'SmartSensors', 'ModèleAA', 3, 'Électricité', 'Température', 'Capteur', 'LoRanWan', 150, 'Bâtiment G'),
    ('2022-04-01', 'TechInnovate', 'ModèleAB', 1, 'Gaz', 'Plage horaire', 'Passerelle', 'LoRanWan', 160, 'Bâtiment H'),
    ('2019-12-05', 'ConnectIoT', 'ModèleAC', 2, 'Électricité', 'Compteur', 'Capteur', 'LoRanWan', 120, 'Bâtiment I'),
    ('2020-10-20', 'InnoDevices', 'ModèleAD', 3, 'Gaz', 'Température', 'Capteur', 'LoRanWan', 130, 'Bâtiment J');


-- Ajout de 20 nouveaux capteurs avec une date d'installation similaire
INSERT INTO Module (date_installation, fabricant, marque, etage, type_energie, type_donnee, categorie, protocol_communication, prix, nom_batiment)
VALUES
    ('2023-01-01', 'NewSensorTech', 'NewModèle1', 2, 'Électricité', 'Température', 'Capteur', 'LoRanWan', 110, 'Bâtiment A'),
    ('2023-01-01', 'NewSensorCo', 'NewModèle2', 1, 'Eau', 'Alerte', 'Actionneur', 'IP', 160, 'Bâtiment B'),
    ('2023-01-01', 'NewIoTInnov', 'NewModèle3', 3, 'Gaz', 'Plage horaire', 'Passerelle', 'LoRanWan', 140, 'Bâtiment D'),
    ('2023-01-01', 'NewTechSensors', 'NewModèle4', 2, 'Eau', 'Compteur', 'Capteur', 'LoRanWan', 95, 'Bâtiment C'),
    ('2023-01-01', 'NewSmartDevices', 'NewModèle5', 3, 'Gaz', 'Température', 'Capteur', 'LoRanWan', 120, 'Bâtiment C'),
    ('2023-01-01', 'NewConnectIoT', 'NewModèle6', 1, 'Électricité', 'Alerte', 'Actionneur', 'IP', 130, 'Bâtiment E'),
    ('2023-01-01', 'NewTechInnovate', 'NewModèle7', 2, 'Électricité', 'Température', 'Capteur', 'LoRanWan', 180, 'Bâtiment E'),
    ('2023-01-01', 'NewInnoSensors', 'NewModèle8', 3, 'Gaz', 'Plage horaire', 'Passerelle', 'LoRanWan', 150, 'Bâtiment C'),
    ('2023-01-01', 'NewFutureTech', 'NewModèle9', 1, 'Eau', 'Compteur', 'Capteur', 'LoRanWan', 120, 'Bâtiment A'),
    ('2023-01-01', 'NewSensorsPlus', 'NewModèle10', 2, 'Électricité', 'Température', 'Actionneur', 'IP', 200, 'Bâtiment E'),
    ('2023-01-01', 'NewSensorTech', 'NewModèle11', 3, 'Gaz', 'Température', 'Capteur', 'LoRanWan', 130, 'Bâtiment F'),
    ('2023-01-01', 'NewSmartSensors', 'NewModèle12', 1, 'Électricité', 'Température', 'Capteur', 'LoRanWan', 130, 'Bâtiment G'),
    ('2023-01-01', 'NewTechInnovate', 'NewModèle13', 2, 'Gaz', 'Plage horaire', 'Passerelle', 'LoRanWan', 170, 'Bâtiment H'),
    ('2023-01-01', 'NewConnectIoT', 'NewModèle14', 3, 'Électricité', 'Compteur', 'Capteur', 'LoRanWan', 110, 'Bâtiment I'),
    ('2023-01-01', 'NewInnoDevices', 'NewModèle15', 1, 'Gaz', 'Température', 'Capteur', 'LoRanWan', 140, 'Bâtiment J'),
    ('2023-01-01', 'NewSensorTech', 'NewModèle16', 2, 'Eau', 'Alerte', 'Actionneur', 'IP', 160, 'Bâtiment F'),
    ('2023-01-01', 'NewSmartSensors', 'NewModèle17', 3, 'Électricité', 'Température', 'Capteur', 'LoRanWan', 150, 'Bâtiment G'),
    ('2023-01-01', 'NewTechInnovate', 'NewModèle18', 1, 'Gaz', 'Plage horaire', 'Passerelle', 'LoRanWan', 160, 'Bâtiment H'),
    ('2023-01-01', 'NewConnectIoT', 'NewModèle19', 2, 'Électricité', 'Compteur', 'Capteur', 'LoRanWan', 120, 'Bâtiment I'),
    ('2023-01-01', 'NewInnoDevices', 'NewModèle20', 3, 'Gaz', 'Température', 'Capteur', 'LoRanWan', 130, 'Bâtiment J');

-- Ajout de 50 capteurs avec des dates d'installation spécifiques
INSERT INTO Module (date_installation, fabricant, marque, etage, type_energie, type_donnee, categorie, protocol_communication, prix, nom_batiment)
VALUES
    ('2018-11-15', 'Fabricant1', 'Capteur1', 1, 'Eau', 'Température', 'Capteur', 'LoRanWan', 100.00, 'Bâtiment1'),
    ('2018-12-01', 'Fabricant2', 'Capteur2', 2, 'Électricité', 'Alerte', 'Actionneur', 'IP', 150.00, 'Bâtiment2'),
    ('2019-01-20', 'Fabricant3', 'Capteur3', 3, 'Gaz', 'Plage horaire', 'Capteur', 'LoRanWan', 120.00, 'Bâtiment3'),
    ('2020-02-01', 'Fabricant4', 'Capteur4', 1, 'Eau', 'Température', 'Capteur', 'LoRanWan', 100.00, 'Bâtiment1'),
    ('2020-03-10', 'Fabricant5', 'Capteur5', 2, 'Électricité', 'Alerte', 'Actionneur', 'IP', 150.00, 'Bâtiment2'),
    ('2020-07-10', 'Fabricant6', 'Capteur6', 3, 'Gaz', 'Plage horaire', 'Capteur', 'LoRanWan', 120.00, 'Bâtiment3'),
    ('2020-09-25', 'Fabricant7', 'Capteur7', 1, 'Eau', 'Température', 'Capteur', 'LoRanWan', 100.00, 'Bâtiment1'),
    ('2020-10-10', 'Fabricant8', 'Capteur8', 2, 'Électricité', 'Alerte', 'Actionneur', 'IP', 150.00, 'Bâtiment2'),
    ('2020-10-20', 'Fabricant9', 'Capteur9', 3, 'Gaz', 'Plage horaire', 'Capteur', 'LoRanWan', 120.00, 'Bâtiment3'),
    ('2021-05-01', 'Fabricant10', 'Capteur10', 1, 'Eau', 'Température', 'Capteur', 'LoRanWan', 100.00, 'Bâtiment1'),
    ('2019-12-05', 'Fabricant11', 'Capteur11', 2, 'Électricité', 'Alerte', 'Actionneur', 'IP', 150.00, 'Bâtiment2'),
    -- Ajoutez 39 autres lignes avec des dates d'installation et d'autres valeurs pour chaque capteur
    ('2019-12-05', 'Fabricant12', 'Capteur12', 3, 'Gaz', 'Plage horaire', 'Capteur', 'LoRanWan', 120.00, 'Bâtiment3');

-- Ajout de 2 capteurs pour chaque date spécifiée
INSERT INTO Module (date_installation, fabricant, marque, etage, type_energie, type_donnee, categorie, protocol_communication, prix, nom_batiment)
VALUES
    ('2018-11-15', 'Fabricant1', 'Capteur1', 1, 'Eau', 'Température', 'Capteur', 'LoRanWan', 100.00, 'Bâtiment1'),
    ('2018-11-15', 'Fabricant2', 'Capteur2', 2, 'Électricité', 'Alerte', 'Actionneur', 'IP', 150.00, 'Bâtiment2'),

    ('2018-12-01', 'Fabricant3', 'Capteur3', 3, 'Gaz', 'Plage horaire', 'Capteur', 'LoRanWan', 120.00, 'Bâtiment3'),
    ('2018-12-01', 'Fabricant4', 'Capteur4', 1, 'Eau', 'Température', 'Capteur', 'LoRanWan', 100.00, 'Bâtiment1'),

    ('2019-01-20', 'Fabricant5', 'Capteur5', 2, 'Électricité', 'Alerte', 'Actionneur', 'IP', 150.00, 'Bâtiment2'),
    ('2019-01-20', 'Fabricant6', 'Capteur6', 3, 'Gaz', 'Plage horaire', 'Capteur', 'LoRanWan', 120.00, 'Bâtiment3'),

    ('2019-06-01', 'Fabricant7', 'Capteur7', 1, 'Eau', 'Température', 'Capteur', 'LoRanWan', 100.00, 'Bâtiment1'),
    ('2019-06-01', 'Fabricant8', 'Capteur8', 2, 'Électricité', 'Alerte', 'Actionneur', 'IP', 150.00, 'Bâtiment2'),

    ('2019-11-25', 'Fabricant9', 'Capteur9', 3, 'Gaz', 'Plage horaire', 'Capteur', 'LoRanWan', 120.00, 'Bâtiment3'),
    ('2019-11-25', 'Fabricant10', 'Capteur10', 1, 'Eau', 'Température', 'Capteur', 'LoRanWan', 100.00, 'Bâtiment1'),

    -- Ajoutez 15 autres paires de capteurs pour chaque date spécifiée
    ('2022-02-15', 'Fabricant30', 'Capteur30', 1, 'Eau', 'Température', 'Capteur', 'LoRanWan', 100.00, 'Bâtiment1'),
    ('2022-02-15', 'Fabricant31', 'Capteur31', 2, 'Électricité', 'Alerte', 'Actionneur', 'IP', 150.00, 'Bâtiment2');
