<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$AsiakasID = "";
$tieto = "";
$valinta = "";

if (isset($_POST["AsiakasID"]))
{
	$AsiakasID = htmlspecialchars(strip_tags($_POST["AsiakasID"]));
	$tieto = htmlspecialchars(strip_tags($_POST["tieto"]));
	$valinta = $_POST["radio"];
	
}
else
{
	die("Ei löydy!!");
	
}

include "yhdistys_pdo.php";

try 
{
	$query = "UPDATE Asiakkaat SET ". $valinta ." = :tieto WHERE AsiakasID = :AsiakasID";
	$stmt= $yhteys->prepare($query);
	$stmt->bindParam(':AsiakasID', $AsiakasID);
	$stmt->bindParam(':tieto', $tieto);
	//$stmt->bindParam(':valinta', $valinta); //MIKSI EI TOIMI? SYNTAX ERROR 1064
	$stmt->execute();
	echo "Muutos tehty!";
	
}
catch (PDOException $exception)
{
	die("Virhe" . $exception->getMessage());
}

?>