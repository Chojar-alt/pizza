<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="Shortcut icon" href="ikona.png">
<title>pizza</title>
<link rel="Stylesheet" type="text/css" href="localhost/pizza/style.css">
</head>
<body>
<p>
      <div id="top">
	  <table>
         <tr>
            <td width="460px"><img id="logo" src="logo.png"/></td>
            <td>
               <center>
                     <a href="O nas\about.html"><strong><u><div id="title2"><u>ZAREJESTRUJ SIĘ</u></div></u></strong>
               </center>
            </td>
            <td><center><a href="Kontakt\kontakt.html"><strong><u><div id="title2"><u>ZALOGUJ</u></div></u></strong>
         </tr>
      </table>
	  </div>
      <br>
<table>
<tr>
<td colspan="4"><center><div id="title3">Jesteś gdzie indziej? Wybierz inne miasto:
<form action="miasto.php" method="post">
 <input type="text" name="city">
 <input type="submit" value="SZUKAJ"><br>
 </form>
</div></center></td>
</tr>
<tr>
<td>
<?php
$mysql_host='localhost';
$port='3306';
$username='root';
$password='';
$database='pizza';
try{
$pdo=new PDO('mysql:host='.$mysql_host.'; dbname='.$database.'; port='.$port, $username, $password );
//echo "Połączenie nawiązane.</br>";
}
catch(PDOException $e) {
echo "Połączenie nie mogło zostać nawiązane.";
}
		$id = $_GET['id'];
		$gdzie = $pdo->query("SELECT nazwa, miejscowosc FROM `restauracje` where id='".$id."';");
		foreach($gdzie as $row)
			{
				echo "<tr>";
				echo "<td>".$row['nazwa']." -</td>";
				echo "<td>" .$row['miejscowosc'] . "</td>";
				echo "</tr>";
			}
		$result = $pdo->query("SELECT id, nazwa, sklad, cena FROM `menu` where restauracja_id='".$id."';");

		if ($result->rowCount() > 0)
        {
				echo "<table border=\"5\">";
				echo "<tr>";
				echo "<td>Nazwa</td>";
				echo "<td>Sklad</td>";
				echo "<td>Cena</td>";
				echo "<td></td>";
				echo "</tr>";
			foreach($result as $row)
			{
				echo "<tr>";
				echo "<td>".$row['nazwa'] . " </td>";
				echo "<td>" . $row['sklad'] . "</td>";
				echo "<td>" . $row['cena'] . "</td>";
				echo "<td> <a href=koszyk.php?id=" . $row['id'] . "><input type=\"button\" value=\"Dodaj do koszyka\"></a></td>";
				echo "</tr>";
			}
				echo "</table>";
			echo "<tr><td><a href=zamow.php><input type=\"button\" value=\"Zamów\"></a><td></tr>";
		}
		else echo "Menu nie zostało jeszcze dodane. Sprawdź inne restauracje";

?>
</td>
</tr>
<tr>
</tr><tr><td></td></tr>
</table>
</td>
</p>
</body>
</html>
