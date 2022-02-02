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
        $id = $_GET['id'];

        // sprawdzamy czy login nie jest już w bazie
		$zamowienie = $pdo->query("CREATE TABLE koszyk (restauracja_id INT(3) NOT NULL, nazwa VARCHAR(50), cena FLOAT(10));");
		$result = $pdo->query("SELECT restauracja_id, nazwa, cena FROM menu WHERE id = '".$id."';");
		foreach($result as $row)
			{
				$query = "INSERT INTO koszyk (restauracja_id, nazwa, cena) VALUES ('".$row['restauracja_id']."','".$row['nazwa']."','".$row['cena']."');";
				$stmt = $pdo->query($query);
				header("Location: http://localhost/pizza/menu.php?id='".$res_id."'");
			}
	header("Location: http://localhost/pizza/menu.php?id=" . $row['restauracja_id'] . "");
?>
