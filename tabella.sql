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
  Tipo VARCHAR(50) DEFAULT 'Primo',
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

CREATE TABLE ORARIO (
  IdOrario INT AUTO_INCREMENT,
  IdRistorante INT,
  GiornoSett VARCHAR(20),
  OrarioApertura TIME,
  OrarioChiusura TIME,
  PRIMARY KEY (IdOrario),
  FOREIGN KEY (IdRistorante) REFERENCES RISTORANTE(IdRistorante)
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

-- ANTIPASTI
INSERT INTO PIATTO (IdMenu, Nome, Descrizione, Prezzo, Tipo) VALUES
(2, 'Bruschetta al Pomodoro', 'Pane tostato con pomodoro fresco, basilico e olio EVO', 6.00, 'Antipasto'),
(2, 'Carpaccio di Manzo', 'Fette sottili di manzo con rucola, grana e aceto balsamico', 12.00, 'Antipasto'),
(2, 'Caprese', 'Mozzarella di bufala, pomodoro e basilico fresco', 9.00, 'Antipasto'),
(2, 'Prosciutto e Melone', 'Prosciutto crudo di Parma con melone cantalupo', 10.00, 'Antipasto'),
(2, 'Tagliere di Salumi', 'Selezione di salumi italiani con giardiniera', 14.00, 'Antipasto');

-- PRIMI PIATTI
INSERT INTO PIATTO (IdMenu, Nome, Descrizione, Prezzo, Tipo) VALUES
(2, 'Spaghetti alla Carbonara', 'Pasta con guanciale, uova, pecorino romano', 13.00, 'Primo'),
(2, 'Tagliatelle al Ragù', 'Pasta fresca all\'uovo con ragù di carne bolognese', 14.00, 'Primo'),
(2, 'Risotto allo Zafferano', 'Risotto cremoso mantecato con zafferano italiano', 16.00, 'Primo'),
(2, 'Risotto ai Funghi Porcini', 'Risotto con funghi porcini freschi e prezzemolo', 18.00, 'Primo'),
(2, 'Penne all\'Arrabbiata', 'Penne con pomodoro, aglio, peperoncino', 11.00, 'Primo'),
(2, 'Lasagne della Casa', 'Lasagne al forno con ragù e besciamella', 15.00, 'Primo');

-- SECONDI PIATTI
INSERT INTO PIATTO (IdMenu, Nome, Descrizione, Prezzo, Tipo) VALUES
(2, 'Filetto di Manzo al Barolo', 'Filetto di manzo con riduzione di vino Barolo', 28.00, 'Secondo'),
(2, 'Ossobuco alla Milanese', 'Ossobuco di vitello con risotto alla milanese', 24.00, 'Secondo'),
(2, 'Tagliata di Manzo', 'Tagliata di manzo con rucola e scaglie di grana', 22.00, 'Secondo'),
(2, 'Branzino al Forno', 'Branzino intero al forno con patate e olive', 20.00, 'Secondo'),
(2, 'Saltimbocca alla Romana', 'Scaloppine di vitello con prosciutto e salvia', 19.00, 'Secondo'),
(2, 'Pollo alla Cacciatora', 'Pollo in umido con pomodoro, olive e capperi', 17.00, 'Secondo');

-- DOLCI
INSERT INTO PIATTO (IdMenu, Nome, Descrizione, Prezzo, Tipo) VALUES
(2, 'Tiramisù', 'Dolce al cucchiaio con mascarpone, caffè e cacao', 8.00, 'Dolce'),
(2, 'Panna Cotta', 'Panna cotta con coulis di frutti di bosco', 7.00, 'Dolce'),
(2, 'Cannoli Siciliani', 'Cannoli croccanti con ricotta e canditi', 8.50, 'Dolce'),
(2, 'Cheesecake ai Frutti di Bosco', 'Cheesecake cremosa con composta di frutti di bosco', 9.00, 'Dolce'),
(2, 'Profiteroles', 'Bignè con crema chantilly e cioccolato fondente', 8.00, 'Dolce'),
(2, 'Torta della Nonna', 'Torta con crema pasticcera e pinoli', 7.50, 'Dolce');

INSERT INTO INGREDIENTE (Nome)
VALUES
('Riso'), ('Zafferano'), ('Manzo'), ('Vino Rosso'),
('Pomodoro'), ('Pasta'), ('Mascarpone'), ('Uova'),
('Guanciale'), ('Pecorino'), ('Funghi Porcini'), ('Vitello');

INSERT INTO ORARIO (IdRistorante, GiornoSett, OrarioApertura, OrarioChiusura)
VALUES
(1, 'Lunedì',    '12:00:00', '23:00:00'),
(1, 'Martedì',   '12:00:00', '23:00:00'),
(1, 'Mercoledì', '12:00:00', '23:00:00'),
(1, 'Giovedì',   '12:00:00', '23:00:00'),
(1, 'Venerdì',   '12:00:00', '00:00:00'),
(1, 'Sabato',    '18:00:00', '00:00:00'),
(1, 'Domenica',  '12:00:00', '23:00:00');

INSERT INTO RECENSIONE (IdUtente, IdPiatto, Voto, Data, Testo, RispostaAdmin)
VALUES
(1, 8, 5, '2026-03-01', 'Risotto eccezionale, molto cremoso.', NULL),
(2, 19, 4, '2026-03-02', 'Tiramisù ottimo, molto delicato.', NULL);

INSERT INTO PRODOTTO (IdRistorante, Nome, Descrizione, Prezzo)
VALUES
(1, 'Bottiglia di Vino Rosso', 'Vino selezionato della casa', 22.00),
(1, 'Olio Extravergine',       'Olio EVO artigianale',        15.00);