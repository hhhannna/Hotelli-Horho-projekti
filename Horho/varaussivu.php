<!DOCTYPE html>
<html>
<head>
<title>Varaaminen</title>
<style>
#container {
   position: relative;
   width: 1000px;
   height: 500px;
margin: auto;
background-color: gray;
border:12px;
border-radius: 10px;
margin-top: 15px;
margin-bottom: 15px;
border-style: solid;
border-color:brown;
}


#h1
align: center; 
}

</style>
</head>
<body>
<form action="YhteysTietokantaanHotelli.php" method="post">
<div id="container">
<br><h1>Varaaminen</h1></a>
<table align='center'>
<tr>
  <td>Etunimi</td>
  <td>
    <input type='text' name='Etunimi' class='Asiakkaat' />
   </td>
</tr>
<td>Sukunimi</td>
  <td>
    <input type='text' name='Sukunimi' class='Asiakkaat' />
   </td>
</tr>
<td>Puhelinnumero</td>
<td>
<input type='number_format' name='Puhelinnumero' class='Asiakkaat' />
</td>
</tr>
<td>Email</td>
<td>
<input type="email" name='Sahkoposti' class='Asiakkaat' />
</td>
</tr>


<tr>
<td>Extrat</td>
<td>

<input type="checkbox" name= "chk1[]" value ="Herätys">Herätys
<input type="checkbox" name= "chk1[]" value ="Vuode aik">Vuode, aik
<input type="checkbox" name= "chk1[]" value ="Vuode lapsi">Vuode, lapsi
<input type="checkbox" name= "chk1[]" value ="Huonetarjoilu">Huonetarjoilu
<input type="checkbox" name= "chk1[]" value ="Kuntosali">Kuntosali
<input type="checkbox" name= "chk1[]" value ="Hieronta">Hieronta
<input type="checkbox" name= "chk1[]" value ="Tallelokero">Tallelokero
<input type="checkbox" name= "chk1[]" value ="Pesulapalvelu">Pesulapalvelu
<input type="checkbox" name= "chk1[]" value ="Parkkihalli">Parkkihalli
<input type="checkbox" name= "chk1[]" value ="Kuljetuspalvelu">Kuljetuspalvelu
<input type="checkbox" name= "chk1[]" value ="Savusauna">Savusauna
<input type="checkbox" name= "chk1[]" value ="Polkupyörä">Polkupyörä
<input type="checkbox" name= "chk1[]" value ="Kylpylä">Kylpylä
<input type="checkbox" name= "chk1[]" value ="Yksisarvisen silitys">Yksisarvisen silitys
<input type="checkbox" name= "chk1[]" value ="Lasten leikkihuone">Lasten leikkihuone
</td>
</tr>

<tr>
<td>
<a href="kiitos.html"><input type="submit" value="Varaa"></a>
</td></tr>

</table>
<a href="horho.html">TAKAISIN ETUSIVULLE</a>
</div>
</body>
</html>
