<?php
$host= 'localhost';
$dbUser= 'root';
$dbPass= '';
$dbName= 'music_shop';
if (!$dbConn=mysqli_connect($host, $dbUser, $dbPass))
 {
 die('Не може да се осъществи връзка със сървъра.');
}
include "create.php";
 if (!mysqli_select_db($dbConn,$dbName))
 {
 die('Не може да се селектира базата от данни.');
 }

 $stoki="CREATE TABLE Stoki(
    Vid_st VARCHAR(20),
    Godina_st INT,
    Naimenovanie_st VARCHAR(20),
    Izpalnitel_id INT,
    Janr_id INT,
    Muzikalna_kompaniya_id INT,
    Cena_st INT,
    Stoka_id INT AUTO_INCREMENT,
    PRIMARY KEY (Stoka_id))ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$stoki);
 if(!$result)
 die('Грешка при създаване на таблицата.');
 echo "Таблицата 'Stoki' е създадена!<br>";

 $janr="CREATE TABLE Janr(
    Janr_id INT AUTO_INCREMENT,
    Janr VARCHAR(20),
    PRIMARY KEY(Janr_id))ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$janr);
 if(!$result)
 die('Грешка при създаване на таблицата.');
 echo "Таблицата 'Janr' е създадена!<br>";

 $klient="CREATE TABLE Klient(
    Ime_k VARCHAR(20),
    Adres_k VARCHAR(20),
    Telefon_k VARCHAR(20),
    Client_id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(Client_id))ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$klient);
 if(!$result)
 die('Грешка при създаване на таблицата.');
 echo "Таблицата 'Klient' е създадена!<br>";

 $slujitelpoz="CREATE TABLE Slujitel_poziciya(
    Poziciya_id INT NOT NULL AUTO_INCREMENT,
    Poziciya VARCHAR(20),
    PRIMARY KEY(Poziciya_id))ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$slujitelpoz);
 if(!$result)
 die('Грешка при създаване на таблицата.');
 echo "Таблицата 'Slujitel_poziciya' е създадена!<br>";

 $prodajbi="CREATE TABLE Prodajbi(
    Client_id INT,
    Slujitel_id INT,
    Data_p DATE,
    Prodajba_id INT AUTO_INCREMENT,
    PRIMARY KEY(Prodajba_id))ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$prodajbi);
 if(!$result)
 die('Грешка при създаване на таблицата.');
 echo "Таблицата 'Prodajbi' е създадена!<br>";

 $muzikalnakomp="CREATE TABLE Muzikalna_kompaniya(
    Muzikalna_kompaniya_id INT AUTO_INCREMENT,
    Muzikalna_kompaniya VARCHAR(20),
    PRIMARY KEY(Muzikalna_kompaniya_id))ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$muzikalnakomp);
 if(!$result)
 die('Грешка при създаване на таблицата.');
 echo "Таблицата 'Muzikalna_kompaniya' е създадена!<br>";

 $slujitel="CREATE TABLE Slujitel(
    Ime_s VARCHAR(20),
    Poziciya_id INT,
    Telefon_s VARCHAR(20),
    Slujitel_id INT AUTO_INCREMENT,
    PRIMARY KEY(Slujitel_id))ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$slujitel);
 if(!$result)
 die('Грешка при създаване на таблицата.');
 echo "Таблицата 'Slujitel' е създадена!<br>";

 $brstoki="CREATE TABLE Broi_stoki(
    Prodajba_id INT,
    Stoka_id INT,
    broi_s INT)ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$brstoki);
 if(!$result)
 die('Грешка при създаване на таблицата.');
 echo "Таблицата 'Broi_stoki' е създадена!<br>";

 $izpalnitel="CREATE TABLE Izpalnitel(
    Izpalnitel_id INT AUTO_INCREMENT,
    Izpalnitel VARCHAR(20),
    PRIMARY KEY(Izpalnitel_id))ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$izpalnitel);
 if(!$result)
 die('Грешка при създаване на таблицата.');
 echo "Таблицата 'Izpalnitel' е създадена!<br>";

 $stoki1="ALTER TABLE Stoki
 ADD CONSTRAINT izpalnitel_id
 foreign key (izpalnitel_id)
 references  izpalnitel(izpalnitel_id)";
$result = mysqli_query($dbConn,$stoki1);
if(!$result)
die('Грешка при свързване на таблиците.');
echo "Таблиците са свързани!<br>";

$stoki2="ALTER TABLE Stoki
ADD CONSTRAINT Janrid
foreign key (Janr_id)
references Janr(janr_id)";
$result = mysqli_query($dbConn,$stoki2);
if(!$result)
die('Грешка при свързване на таблиците.');
echo "Таблиците са свързани!<br>";

$stoki3="ALTER TABLE Stoki
ADD CONSTRAINT MUZ_KOMP
foreign key (Muzikalna_kompaniya_id)
references Muzikalna_kompaniya(Muzikalna_kompaniya_id)";
$result = mysqli_query($dbConn,$stoki3);
if(!$result)
die('Грешка при свързване на таблиците.');
echo "Таблиците са свързани!<br>";

$prodajbi1="ALTER TABLE Prodajbi
ADD CONSTRAINT Prodajbi
foreign key (Client_id)
references Klient(Client_id)";
$result = mysqli_query($dbConn,$prodajbi1);
if(!$result)
die('Грешка при свързване на таблиците.');
echo "Таблиците са свързани!<br>";

$prodajbi2="ALTER TABLE Prodajbi
ADD CONSTRAINT SLUJITEL
FOREIGN KEY (Slujitel_id)
REFERENCES Slujitel(slujitel_id)";
$result = mysqli_query($dbConn,$prodajbi2);
if(!$result)
die('Грешка при свързване на таблиците.');
echo "Таблиците са свързани!<br>";

$slujitel1="ALTER TABLE Slujitel
add constraint poziciq
foreign key(Poziciya_id)
references Slujitel_poziciya(poziciya_id)";
$result = mysqli_query($dbConn,$slujitel1);
if(!$result)
die('Грешка при свързване на таблиците.');
echo "Таблиците са свързани!<br>";

$brstoki1="ALTER TABLE Broi_stoki
add constraint prodajba
foreign key (prodajba_id)
references Prodajbi(prodajba_id)";
$result = mysqli_query($dbConn,$brstoki1);
if(!$result)
die('Грешка при свързване на таблиците.');
echo "Таблиците са свързани!<br>";

$brstoki2="ALTER TABLE Broi_stoki
add constraint stoki
foreign key(stoka_id)
references Stoki(Stoka_id)";
$result = mysqli_query($dbConn,$brstoki2);
if(!$result)
die('Грешка при свързване на таблиците.');
echo "Таблиците са свързани!<br>";
 mysqli_query($dbConn,"SET NAMES 'UTF8'");
?>
