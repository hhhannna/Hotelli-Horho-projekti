<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$hakutulos = "";
//echo "hakutulos on ";
// echo $_POST["hakutulos"];
    if (isset($_POST["hakutulos"]))
    {
        $hakutulos = $_POST["hakutulos"];
		// hakukentän perään laitetaan %-merkki, jotta saadaan hakukentän mukaan alkavat tiedot haettua
		$hakutulos = $hakutulos . "%";
    }
    else
    {
        die('Haettava tieto ei tule oikein selaimelta.');
    }

include 'yhdistys_pdo.php';

try 
{
    // prepare select query
    $query = "SELECT Hinta, HuoneTyyppi FROM Huoneet WHERE HuoneTyyppi LIKE :hakutulos";
	
    $stmt = $yhteys->prepare( $query );
    // Sidotaan saatu osaston nimi kyselyyn
    $stmt->bindParam(':hakutulos', $hakutulos);
 
    // suorita haku
    $stmt->execute();
    $lukumaara = $stmt->rowCount();
    
	if ($lukumaara  === 0 || $stmt === "%")
    {
        die('Haettavia tietoja ei löydy tällä hakukriteerillä.');
    }
	
        // osastotieto siirretään rivi-nimiseen assosiatiiviseen muuttujaan
    echo "<br>"; 
    while ($rivi = $stmt->fetch(PDO::FETCH_ASSOC))
    {
       // extract muuttaa
       //  $rivi['Hinta'] vastaavaan muuttujaan $Hinta 
	   //  $rivi['HuoneTyyppi']  vastaavaan muuttujaan $HuoneTyyppi jne
       extract($rivi);
     
       // tehdään jokaisesta osastotaulun rivistä oma rivi tauluun
       echo "{$HuoneTyyppi}" . " " . "{$Hinta}" . " <br> ";
        
    }
  
}

// show error
catch(PDOException $exception)
  {
    die('Virhe ohjelmointikoodissa: ' . $exception->getMessage());
  }
?>