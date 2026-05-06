-- Active: 1771240308180@@127.0.0.1@3306@finalproject
DROP DATABASE IF EXISTS finalproject;
CREATE DATABASE finalproject;
USE finalproject;

CREATE TABLE RISTORANTE (
  IdRistorante INT AUTO_INCREMENT,
  Nome VARCHAR(255),
  Email VARCHAR(255),
  Telefono VARCHAR(20),
  Citta VARCHAR(255),
  Via VARCHAR(255),
  PRIMARY KEY (IdRistorante)
);

CREATE TABLE UTENTE (
  IdUtente INT AUTO_INCREMENT,
  Nome VARCHAR(255),
  Cognome VARCHAR(255),
  Email VARCHAR(255),
  Password VARCHAR(255),
  CAP VARCHAR(10),
  DataNascita DATE,
  Provincia VARCHAR(255),
  Ruolo VARCHAR(50) DEFAULT 'cliente',
  PRIMARY KEY (IdUtente),
  UNIQUE (Email)
);

CREATE TABLE MENU (
  IdMenu INT AUTO_INCREMENT,
  IdRistorante INT,
  Categoria VARCHAR(255),
  Materiale VARCHAR(255),
  Grandezza VARCHAR(255),
  PRIMARY KEY (IdMenu),
  FOREIGN KEY (IdRistorante) REFERENCES RISTORANTE(IdRistorante)
);

CREATE TABLE PIATTO (
  IdPiatto INT AUTO_INCREMENT,
  IdMenu INT,
  Nome VARCHAR(255),
  Descrizione TEXT,
  Prezzo DECIMAL(10,2),
  PRIMARY KEY (IdPiatto),
  FOREIGN KEY (IdMenu) REFERENCES MENU(IdMenu)
);

CREATE TABLE INGREDIENTE (
  IdIngrediente INT AUTO_INCREMENT,
  Nome VARCHAR(255),
  PRIMARY KEY (IdIngrediente)
);

CREATE TABLE PIATTO_INGREDIENTE (
  IdPiatto INT,
  IdIngrediente INT,
  PRIMARY KEY (IdPiatto, IdIngrediente),
  FOREIGN KEY (IdPiatto) REFERENCES PIATTO(IdPiatto),
  FOREIGN KEY (IdIngrediente) REFERENCES INGREDIENTE(IdIngrediente)
);

CREATE TABLE TAVOLO (
  IdTavolo INT AUTO_INCREMENT,
  IdRistorante INT,
  NumeroTavolo INT,
  Materiale VARCHAR(255),
  Stato BOOLEAN DEFAULT FALSE,
  PRIMARY KEY (IdTavolo),
  FOREIGN KEY (IdRistorante) REFERENCES RISTORANTE(IdRistorante)
);

CREATE TABLE ORARIO (
  IdOrario INT AUTO_INCREMENT,
  IdRistorante INT,
  GiornoSett VARCHAR(20),
  OrarioApertura TIME,
  OrarioChiusura TIME,
  PRIMARY KEY (IdOrario),
  FOREIGN KEY (IdRistorante) REFERENCES RISTORANTE(IdRistorante)
);

CREATE TABLE PRENOTAZIONE (
  IdPrenotazione INT AUTO_INCREMENT,
  IdUtente INT,
  IdTavolo INT,
  DataPrenot DATE,
  OraPrenot TIME,
  NumeroPersone INT,
  Nominativo VARCHAR(255),
  PRIMARY KEY (IdPrenotazione),
  FOREIGN KEY (IdUtente) REFERENCES UTENTE(IdUtente),
  FOREIGN KEY (IdTavolo) REFERENCES TAVOLO(IdTavolo)
);

CREATE TABLE RECENSIONE (
  IdRecensione INT AUTO_INCREMENT,
  IdUtente INT,
  IdPiatto INT,
  Voto INT,
  Data DATE,
  Testo TEXT,
  RispostaAdmin TEXT NULL,
  PRIMARY KEY (IdRecensione),
  FOREIGN KEY (IdUtente) REFERENCES UTENTE(IdUtente),
  FOREIGN KEY (IdPiatto) REFERENCES PIATTO(IdPiatto)
);

CREATE TABLE PRODOTTO (
  IdProdotto INT AUTO_INCREMENT,
  IdRistorante INT,
  Nome VARCHAR(255),
  Descrizione TEXT,
  Prezzo DECIMAL(10,2),
  PRIMARY KEY (IdProdotto),
  FOREIGN KEY (IdRistorante) REFERENCES RISTORANTE(IdRistorante)
);

-- --------------------------------------------------------

INSERT INTO RISTORANTE (Nome, Email, Telefono, Citta, Via)
VALUES ('La Maison', 'info@lamaison.it', '023456789', 'Milano', 'Via Eleganza 10');

INSERT INTO UTENTE (Nome, Cognome, Email, Password, CAP, DataNascita, Provincia, Ruolo)
VALUES
('Mario', 'Rossi',    'mario@demo.it',     '1234',     '20100', '2000-05-10', 'MI', 'cliente'),
('Luca',  'Bianchi',  'luca@demo.it',      'abcd',     '00100', '1999-11-22', 'RM', 'cliente'),
('Admin', 'LaMaison', 'admin@lamaison.it', 'admin123', '20100', '1990-01-01', 'MI', 'admin');

INSERT INTO MENU (IdRistorante, Categoria, Materiale, Grandezza)
VALUES
(1, 'Degustazione', 'Carta', 'Grande'),
(1, 'Alla carta',   'Carta', 'Standard');

INSERT INTO PIATTO (IdMenu, Nome, Descrizione, Prezzo)
VALUES
(1, 'Risotto allo Zafferano', 'Risotto cremoso con zafferano',            18.00),
(1, 'Filetto di Manzo',       'Filetto di manzo con salsa al vino rosso', 28.00),
(2, 'Spaghetti al Pomodoro',  'Spaghetti con pomodoro fresco',            12.00),
(2, 'Tiramisù',               'Dolce tradizionale italiano',               8.00);

INSERT INTO INGREDIENTE (Nome)
VALUES
('Riso'), ('Zafferano'), ('Manzo'), ('Vino Rosso'),
('Pomodoro'), ('Pasta'), ('Mascarpone'), ('Uova');

INSERT INTO PIATTO_INGREDIENTE (IdPiatto, IdIngrediente)
VALUES (1,1),(1,2),(2,3),(2,4),(3,5),(3,6),(4,7),(4,8);

INSERT INTO TAVOLO (IdRistorante, NumeroTavolo, Materiale, Stato)
VALUES
(1, 1, 'Legno', FALSE),
(1, 2, 'Legno', FALSE),
(1, 3, 'Marmo', FALSE);

INSERT INTO ORARIO (IdRistorante, GiornoSett, OrarioApertura, OrarioChiusura)
VALUES
(1, 'Lunedì',    '12:00:00', '23:00:00'),
(1, 'Martedì',   '12:00:00', '23:00:00'),
(1, 'Mercoledì', '12:00:00', '23:00:00'),
(1, 'Giovedì',   '12:00:00', '23:00:00'),
(1, 'Venerdì',   '12:00:00', '00:00:00'),
(1, 'Sabato',    '18:00:00', '00:00:00');

INSERT INTO PRENOTAZIONE (IdUtente, IdTavolo, DataPrenot, OraPrenot, NumeroPersone, Nominativo)
VALUES
(1, 2, '2026-03-10', '20:00:00', 4, 'Mario Rossi'),
(2, 1, '2026-03-11', '21:00:00', 2, 'Luca Bianchi');

INSERT INTO RECENSIONE (IdUtente, IdPiatto, Voto, Data, Testo, RispostaAdmin)
VALUES
(1, 1, 5, '2026-03-01', 'Risotto eccezionale, molto cremoso.', NULL),
(2, 4, 4, '2026-03-02', 'Tiramisù ottimo, molto delicato.',    NULL);

INSERT INTO PRODOTTO (IdRistorante, Nome, Descrizione, Prezzo)
VALUES
(1, 'Bottiglia di Vino Rosso', 'Vino selezionato della casa', 22.00),
(1, 'Olio Extravergine',       'Olio EVO artigianale',        15.00);