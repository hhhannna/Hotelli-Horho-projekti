<?php
// Tietokanta on muodostettu komennoilla, jotka loytyvat 
// Y-asemalta students/RTU/MySQL-hakemistosta tiedostosta Hovi_esimerkkikanta.sql
// Tietokannan nimi on e999999_ERP

// muodostetaan yhteys tietokantaan
$palvelimenNimi = "mysql.cc.puv.fi";
$username = "e1701246";
$password = "spSETu2ENnWS";
$yhteys = "";

try {
    $yhteys = new PDO("mysql:host=$palvelimenNimi;dbname=e1701246_HotelliHorho", $username, $password);
    // set the PDO error mode to exception
    $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


// merkistö:  utf8
$yhteys->exec("SET NAMES utf8");

?>
