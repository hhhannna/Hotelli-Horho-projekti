<?php

$palvelimenNimi = "mysql.cc.puv.fi";
$username = "e1701246";
$password = "spSETu2ENnWS";
$yhteys = "";

try {
    $yhteys = new PDO("mysql:host=$palvelimenNimi;dbname=e1701246_HotelliHorho", $username, $password);
   
    $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


$yhteys->exec("SET NAMES utf8");

try{
	  // tehdään insert eli tietorivin lisääminen tietokantaan
      // insert-kysely muodostetaan käyttäen nimettyjä parametreja
      // lisättävien tietojen sijalla	  
	  
	  
	      $query = "SELECT MAX(AsiakasID) AS maxAsiakasID FROM Asiakkaat ";
    $stmt = $yhteys->prepare( $query );
    // suorita haku
    $stmt->execute();
        // osastotieto siirretään rivi-nimiseen assosiatiiviseen muuttujaan
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form
    $maxAsiakasID = $row['maxAsiakasID'];
$maxAsiakasID = $maxAsiakasID + 1;
      $lisaysKomento = "INSERT INTO Asiakkaat (AsiakasID, Etunimi, Sukunimi, Puhelinnumero, Sahkoposti)  VALUES (" . $maxAsiakasID . " , :Etunimi, :Sukunimi, :Puhelinnumero, :Sahkoposti)";
	  $sqlLause = $yhteys->prepare($lisaysKomento);
	  
	
	  
	  
	  // haetaan käyttäjän antamat tiedot ja putsataan ne laittomuuksista
	  $Etunimi = htmlspecialchars(strip_tags($_POST["Etunimi"]));
	  $Sukunimi = htmlspecialchars(strip_tags($_POST["Sukunimi"]));
	  $Puhelinnumero = htmlspecialchars(strip_tags($_POST["Puhelinnumero"]));
	  $Sahkoposti = htmlspecialchars(strip_tags($_POST["Sahkoposti"]));
	  
	  // laitetaan käyttäjän antamat tiedot nimettyjen parametrien tilalle
	  $sqlLause->bindParam(':Etunimi', $Etunimi);
	  $sqlLause->bindParam(':Sukunimi', $Sukunimi);
	  $sqlLause->bindParam(':Puhelinnumero', $Puhelinnumero);
	  $sqlLause->bindParam(':Sahkoposti', $Sahkoposti);
	  

	  

	
	  
	  // suorita kysely käyttäjän antamilla tiedoilla
	   if ($sqlLause->execute()){
		   echo "<div class='alert alert-success'>Varaus on lisätty.</div>";
	   } else {
		   echo "<div class='alert alert-success'>Varausta EI lisätty.</div>";
	   }
    }
     
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
echo "<a href='horho.html'>TAKAISIN ETUSIVULLE</a>";
?>





 



 

