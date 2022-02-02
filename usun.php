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

				$query = "DELETE FROM koszyk WHERE id = '".$id."';";
				$stmt = $pdo->query($query);

	header("Location: http://localhost/pizza/zamow.php");
?>
