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
                     <a href="index.php"><strong><u><div id="title2"><u>STRONA GŁÓWNA</u></div></u></strong>
               </center>
            </td>
            <td><center><a href="rejestruj.php"><strong><u><div id="title2"><u>ZAREJESTRUJ SIĘ</u></div></u></strong>
         </tr>
      </table>
	  </div>
      <br>
<table>
<tr>
<td>
</td>
</tr>
<tr>
</tr><tr><td></td></tr>
<tr>
<td><div id="tekst">
 <form action="logowanie.php" method="post">
 Podaj login
 <input type="text" name="login">
 haslo
 <input type="password" name="haslo">
 <input type="submit" value="loguj"><br>
 </form>
</div></td>
</tr>
<tr><td></td></tr>
<tr>
</tr>
<tr>
</table>
</td>
</p>
</body>
</html>
