<?php
$AsiakasID = "";

if (isset($_POST["AsiakasID"]))
{
	$AsiakasID = $_POST["AsiakasID"];
	
	
}
else
{
	die("Ei löydy!!");
	
}

include "yhdistys_pdo.php";

try 
{
	$query = "DELETE FROM Asiakkaat WHERE AsiakasID LIKE :AsiakasID";
	$stmt= $yhteys->prepare($query);
	$stmt->bindParam(':AsiakasID', $AsiakasID);
	$stmt->execute();
	echo "Poisto onnistui :-)";
	
}
catch (PDOException $exception)
{
	die("Ei onnistu" . $exception->getMessage());
}

?>