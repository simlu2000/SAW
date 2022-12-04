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
    echo "<h3>Non hai effettuato l'accesso!</h3>";
    header("Refresh:2.5; url=homepage.php");
  }
  else {
        $email = $_SESSION["email"];

        //Preparo query
        $query = "UPDATE users SET newsletter=0 WHERE email = '$email' "; //disattivazione newsletter inserendo valore 0
        //Esecuzione e controllo risultato
        $res = mysqli_query($connection,$query);
        if($res) {
            echo "<h3>Ci dispiace che si sia disiscritto dalla nostra newsletter. Torna a trovarci!</h3";
            mysqli_close($connection);
            $_SESSION["newsletter"] = 0;
            header("Refresh:2.5; url=show_profile.php");
        }
        else {
            echo "<h3>C'e' stato un errore. Riprova più tardi.</h3>";
            mysqli_close($connection);
            header("Refresh:2; url=show_profile.php");
        }

}
?>

</body>
</html>