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
		$to_email = $_POST['mail'];
		$subject = "Zamówienie";
		$body = "";
		$headers = "From: sender\'s email";
		$suma_ogl = 0;
		$maximum_id = $pdo->query("SELECT MAX(`restauracja_id`) FROM koszyk");
		foreach($maximum_id as $row)
			{
				$maximum = $row['MAX(`restauracja_id`)'];
			}
		$result = $pdo->query("SELECT restauracja_id, nazwa, cena FROM koszyk;");
		for($i=0; $i<=$maximum; $i++){ //wyswietlanie produktow z roznych restauracji po kolei
					$nazwa = $pdo->query("SELECT nazwa FROM restauracje WHERE id='".$i."';");
					foreach($nazwa as $row1){
						$body = $body."<tr>
						</tr>
						<tr>
						<td>".$row1['nazwa']."
						</tr>";
					}
					$cena_sum = $pdo->query("SELECT SUM(cena) AS 'suma' FROM `koszyk` WHERE restauracja_id='".$i."';");
						foreach($cena_sum as $row2)
						{
							$suma = $row2['suma'];
						}
					$result = $pdo->query("SELECT id, nazwa, cena FROM koszyk WHERE restauracja_id='".$i."';");
					foreach($result as $row)
						{
						$body = $body."<tr>
						<td>".$row['nazwa']." -</td>
						<td>" .$row['cena'] . "</td>
						</tr>";
						}
						if($suma!=null){
						$body = $body."<tr>
						<td>Suma zamówienia:</td>
						<td>'".$suma."'</td>
						</tr>";
						$suma_ogl=$suma_ogl+$suma;
						}
		}
						$body = $body."<tr>
						</tr>
						<tr>
						<td>Suma zamówienia ogólna:</td>
						<td>'".$suma_ogl."'</td>
						</tr>
						</table>";

						$imie = $_POST['imie'];
						$nazwisko = $_POST['miasto'];
						$miasto = $_POST['miasto'];
						$adres = $_POST['adres'];

						$body = $body."<table><tr><td>
						<tr><td>Dane osobowe:</td></tr>
						<tr><td>Imie:</td><td>'".$imie."'</td></tr>
						<tr><td>Nazwisko:</td><td>'".$nazwisko."'</td></tr>
						<tr><td>Miasto:</td><td>'".$miasto."'</td></tr>
						<tr><td>Adres:</td><td>'".$adres."'</td></tr>
						</td></tr></table>";
				if (mail($to_email, $subject, $body, $headers)) {
					echo "Zamówenie przyjęte. Sprawdź szczegóły w wiadomości email";
				} else {
					echo "Email sending failed...";
				}
				echo "</br><a href=\"index.php\"><input type=\"button\" value=\"ZAMÓW PONOWNIE\"></a>";
//mysqli_close($pdo);
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
