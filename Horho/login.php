<?php
    session_start();

    // Jos jo kirjautunut sisään
    if (isset($_SESSION['loggedIn'])) {
        //huoneet.html on se mihin päätyy kun on kirjautunut sisään..
        header('Location: testi.php');
        exit();
    }

    if (isset($_POST['login'])){
        $connection = new mysqli( 'localhost', 'root', '', 'e1701246_HotelliHorho');


        $Sahkoposti = $connection->real_escape_string($_POST['SahkopostiPHP']);
        $Salasana = md5($connection->real_escape_string($_POST['SalasanaPHP']));

        $data = $connection->query("SELECT id FROM Kayttajat Where Sahkoposti= '$Sahkoposti' AND Salasana='$Salasana'");
        if ($data->num_rows > 0) { // Kaikki on okei, voidaan kirjautua sisään
            $_SESSION['loggedIn'] = '1';
            $_SESSION['Sahkoposti'] = $Sahkoposti;
            exit('<font color="green">Kirjautuminen onnistui...</font>');
        } else
            exit('<font color="red">Ole kiltti ja tarkista antamasi tiedot!</font>');

        exit($Sahkoposti . " = " . $Salasana);
    }
?>
<html> 
    <head>
         <meta charset="utf-8" />
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Sisäänkirjautuminen</title>
    </head>
    <body>
        <form method="post" action="login.php">
             <input type="text" id="Sahkoposti" placeholder="Sähkoposti..."><br>
             <input type="password" id="Salasana" placeholder="Salasana..."><br>
             <input type="button" value="Kirjaudu sisään" id="login">
         </form>

        <p id="response"></p>

         <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
         <script type="text/javascript">
               $(document).ready(function () {
				 
                  $("#login").click(function() {
                      var Sahkoposti = $("#Sahkoposti").val();
                      var Salasana = $("#Salasana").val();
                      
                      if(Sahkoposti == "" || Salasana == "")
                      {
                        alert('Ole kiltti ja tarkista antamasi tiedot');
                      }
                    else {
                        $.ajax(
                            {
                                url: 'login.php',
                                method: 'POST',
                                data: {
                                    login: 1,
                                    SahkopostiPHP: Sahkoposti,
                                    SalasanaPHP: Salasana
                                },
                                success: function (response){
                                    $("#response").html(response);

                                    if (response.indexOf('success') >= 0)
                                        window.location = 'testi.php';
                                },

                                dataType: 'text'
                            }
                        );
                    }
                     
                  });
           });
         </script>
    </body>
</html>