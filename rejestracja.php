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
		$imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
		$miasto = $_POST['miasto'];
        $adres = $_POST['adres'];

        $query = "SELECT login FROM users WHERE login = '".$login."';";
			$result = $pdo->query($query);
		if ($result->rowCount()==0)
        {
                $stmt = $pdo->query("INSERT INTO `users` (`login`, `haslo`, `imie`, `nazwisko`, `miasto`, `adres`)
                    VALUES ('".$login."', '".$haslo."', '".$imie."', '".$nazwisko."', '".$miasto."', '".$adres."');");

                echo "Konto zostało utworzone!";
        }
        else echo "Podany login jest zajęty.";
    //}
	header("Location: http://localhost/pizza/loguj.php");
?>
