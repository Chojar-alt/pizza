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
		$suma_ogl = 0;
		$maximum_id = $pdo->query("SELECT MAX(`restauracja_id`) FROM koszyk");
		foreach($maximum_id as $row)
			{
				$maximum = $row['MAX(`restauracja_id`)'];
			}
		$result = $pdo->query("SELECT restauracja_id, nazwa, cena FROM koszyk;");
						echo "<table border=\"5\">";
		for($i=0; $i<=$maximum; $i++){ //wyswietlanie produktow z roznych restauracji po kolei
					$nazwa = $pdo->query("SELECT nazwa FROM restauracje WHERE id='".$i."';");
					foreach($nazwa as $row1){
						echo "<tr>";
						echo "</tr>";
						echo "<tr>";
						echo "<td>".$row1['nazwa']." </td>";
						echo "</tr>";
					}
					$cena_sum = $pdo->query("SELECT SUM(cena) AS 'suma' FROM `koszyk` WHERE restauracja_id='".$i."';");
						foreach($cena_sum as $row2)
						{
							$suma = $row2['suma'];
						}
					$result = $pdo->query("SELECT id, nazwa, cena FROM koszyk WHERE restauracja_id='".$i."';");
					foreach($result as $row)
						{
						echo "<tr>";
						echo "<td>".$row['nazwa']." -</td>";
						echo "<td>" .$row['cena'] . "</td>";
						echo "<td> <a href=usun.php?id=" . $row['id'] . "><input type=\"button\" value=\"X\"></a></td>";
						echo "</tr>";
						}
						if($suma!=null){
						echo "<tr>";
						echo "<td>Suma zamówienia:</td>";
						echo "<td>'".$suma."'</td>";
						echo "</tr>";
						$suma_ogl=$suma_ogl+$suma;
						}
		}
						echo "<tr>";
						echo "</tr>";
						echo "<tr>";
						echo "<td>Suma zamówienia ogólna:</td>";
						echo "<td>'".$suma_ogl."'</td>";
						echo "</tr>";
						echo "</table>";

				if(isset($_SESSION['zalogowany'])){
					$dane = $pdo->query("SELECT imie, nazwisko, miasto, adres, mail FROM users WHERE login='".$_SESSION['login']."';");
						foreach($dane as $row)
						{
							echo "<form action=\"kup.php\" method=\"post\">";
							echo "Podaj imie:</br>";
							echo "<input type=\"text\" name=\"imie\" value='".$row['imie']."'></br>";
							echo "Podaj nazwisko:</br>";
							echo "<input type=\"text\" name=\"nazwisko\" value='".$row['nazwisko']."'></br>";
							echo "Podaj miasto:</br>";
							echo "<input type=\"text\" name=\"miasto\" value='".$row['miasto']."'></br>";
							echo "Podaj adres:</br>";
							echo "<input type=\"text\" name=\"adres\" value='".$row['adres']."'></br>";
							echo "Podaj maila:</br>";
							echo "<input type=\"text\" name=\"mail\" value='".$row['mail']."'></br>";
							echo "<input type=\"submit\" value=\"ZAMÓW\"></form>";
						}
				}
				else {
					echo "Osoby zalogowane łatwiej mogą zamawawiać! Zaloguj się lub zarejestruj.</br>";
							echo "<form action=\"kup.php\" method=\"post\">";
							echo "Podaj imie:</br>";
							echo "<input type=\"text\" name=\"imie\"></br>";
							echo "Podaj nazwisko:</br>";
							echo "<input type=\"text\" name=\"nazwisko\"></br>";
							echo "Podaj miasto:</br>";
							echo "<input type=\"text\" name=\"miasto\"></br>";
							echo "Podaj adres:</br>";
							echo "<input type=\"text\" name=\"adres\"></br>";
							echo "Podaj maila:</br>";
							echo "<input type=\"text\" name=\"mail\"></br>";
							echo "<input type=\"submit\" value=\"ZAMÓW\"></form>";
				}
				echo "</br><a href=\"index.php\"><input type=\"button\" value=\"WRÓĆ DO MENU\"></a>";
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
