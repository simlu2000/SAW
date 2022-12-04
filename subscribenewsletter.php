<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Newsletter</title>
</head>

<body>

<?php
  session_start();
  include_once("files/connproj.php"); 

  if(!isset($_SESSION["email"])){
    echo"<h3>Per iscriverti alla newsletter devi aver effettuato l'accesso!</h3>";
    header("Refresh:2; url=formlogin.php");

  }

  $email = $_SESSION["email"];

  //Preparo query
  $query = "UPDATE users SET newsletter=1 WHERE email = '$email' "; //attivazione query con valore 1 nella colonna newsletter
  //Esecuzione e controllo risultato
  $res = mysqli_query($connection,$query);
  if($res) {
    echo "<h3>Iscrizione alla newsletter avvenuta con successo!</h3>";
    mysqli_close($connection);
    $_SESSION["newsletter"] = 1;
    header("Refresh:2; url=show_profile.php");
  }
  else {
    echo "<h3>C'e' stato un errore. Riprova più tardi.</h3>";
    mysqli_close($connection);
    header("Refresh:2; url=show_profile.php");
  }
?>

</body>
</html>