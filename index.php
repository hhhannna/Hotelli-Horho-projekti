<html>
<head>
<link href= "Kalenteri.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
include 'Kalenteri.php';

$Kalenteri = new Kalenteri();

echo $Kalenteri->show();
?>
</body>
</html>