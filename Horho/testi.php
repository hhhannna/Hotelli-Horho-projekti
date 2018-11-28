//Tämä tuloo sen sivun koodin mihin kirjautuminen vie...
<?php
    session_start();
    if(!isset($_SESSION['loggedIn']))
    {
        header('location:login.php');
        exit();
    }
     
?>
<a href="logout.php">Kirjaudu ulos </a><br>
Olet Kirjautunutsisään...