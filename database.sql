CREATE TABLE kategori(
  kategoriId INT NULL AUTO_INCREMENT,
  kategoriGenre VARCHAR(50),
  kategorispelGenre VARCHAR(50),
  PRIMARY KEY(kategoriId)
);
INSERT INTO kategori (kategoriGenre, kategorispelGenre) VALUES('Aventyrsspel, strategispel');


CREATE TABLE spel(
  spelId INT NULL AUTO_INCREMENT,
  spelNamn VARCHAR(50),
  spelBolag VARCHAR(50),
  spelUtgivningsar VARCHAR(50),
  spelBeskrivning VARCHAR(50),
  spelKategoriId INT,
  PRIMARY KEY(spelId),
  FOREIGN KEY (spelKategoriId) REFERENCES kategori(kategoriId)
);
INSERT INTO spel (spelNamn,spelBolag,spelUtgivningsar,spelBeskrivning) VALUES('Prince of persia, UBISOFT, Oktober 3, 1989, Du är en prins som har uppdrag att beskydda rikedomen Persien');



  <!--Admin, 123 );-->

(
//inloggning
CREATE TABLE konto(
  kontoId INT NULL AUTO_INCREMENT,
  kontoAnvandarnamn VARCHAR(50),
  kontoLosenord VARCHAR(50),
  PRIMARY KEY(kontolId)
);
INSERT INTO konto (kontoAnvandarnamn, kontoLosenord) VALUES('Maluma, Jbalvin');



CREATE TABLE customer(
  customerId INT NULL AUTO_INCREMENT,
  customerEmail VARCHAR(50),
  customerPassword VARCHAR(50),
  customerName VARCHAR(50),
  customerDate VARCHAR(50),
  spelid INT,
  PRIMARY KEY(customerId),
  FOREIGN KEY (spelid) REFERENCES spel(spelId)
);
INSERT INTO customer (customerEmail, customerPassword, customerName, customerDate ) VALUES("dalia_blomma@hotmail.com", "glass123", "Dalia", "19:00:00" );
