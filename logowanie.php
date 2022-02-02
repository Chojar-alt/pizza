<?php
	  session_start();
?>
<!DOCTYPE html>
<head lang="pl">
 <meta charset="utf-8">
</head>
<body>
 <?php
$mysql_host='localhost';
$port='3306';
$username='root';
$password='';
$database='pizza';
try{
$pdo=new PDO('mysql:host='.$mysql_host.'; dbname='.$database.'; port='.$port, $username, $password );
echo 'Połączenie nawiązane.</br>';
}
catch(PDOException $e) {
echo 'Połączenie nie mogło zostać nawiązane.';
}
		$login = $_POST['login'];
        $haslo = $_POST['haslo'];

        // sprawdzamy czy login i hasło są dobre
		$query = "SELECT login, haslo FROM users WHERE login = '".$login."' AND haslo = '".$haslo."';";
			$result = $pdo->query($query);
		if ($result->rowCount() > 0)
        {
            $_SESSION['zalogowany'] = true;
            $_SESSION['login'] = $login;
         echo "Zalogowano";
			header("Location: http://localhost/pizza/index.php");
            // zalogowany
        }
        else{
			echo "<a href=\"loguj.php\">Błąd, sppróbuj ponownie</a>";
		}
?>
