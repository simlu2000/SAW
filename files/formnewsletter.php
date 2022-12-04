<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Invio Newsletter</title>
</head>

<body>

<?php
session_start(); //sessione

if(!isset($_SESSION['admin1']) || !isset($_SESSION['admin2']) ) { //se  non è amministratore

  echo "Non sei un amministratore. Non puoi stare qui!";
  header("Refresh:2; url=homepage.php");

}

?>

      <form action="sendnewsletter.php" method="POST">
        <h1>Soggetto dell'e-mail:</h1>
            <input type="text" name="subject" id="subject">
        <h2>Messaggio da inviare:</h2>
            <textarea cols="35" rows="10" name="message" id="message"></textarea>
        <input id="send" type="submit" name="send" value="Invia">
      </form>


</body>
</html>

