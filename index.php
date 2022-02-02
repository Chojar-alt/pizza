<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head lang="pl">
 <meta charset="utf-8">
<link rel="Shortcut icon" href="ikona.png">
<title>PIZZA</title>
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
                     <a href="rejestruj.php"><strong><u><div id="title2"><u>ZAREJESTRUJ SIĘ</u></div></u></strong>
            <td><center><a href="loguj.php"><strong><u><div id="title2"><u>ZALOGUJ</u></div></u></strong>
         </tr>
      </table>
	  </div>
      <br>
<table>

<tr>
<td colspan="4"><center><div id="title3">Znajdź pizzę w swoim mieście:
<form action="miasto.php" method="post">
 <input type="text" name="city">
 <input type="submit" value="SZUKAJ"><br>
 </form>
</div></center></td>
</tr>
<tr>
	<tr>
	<td>
	<?php
	echo "<a href=\"zamow.php\"><input type=\"button\" value=\"IDŹ DO KOSZYKA\"></a>";
	?>
	</td>
	</tr>
<td>

</td>
</tr>
</table>
</td>
</p>
</body>
</html>
