<?php
    //FILE LOGOUT DA ACCOUNT
?>

<!DOCTYPE html>
    <html lang="eng">

<head>
    <title>Logout</title>
</head>
<body>

<?php
session_start();

unset($_SESSION['email']);
unset($_SESSION['password']);

session_destroy();



header("Refresh:1; url=homepage.php");
  
/*Quando si cancellano le variabili in $_SESSION[ ] e 
l'identificatore di sessione sul server non si cancella 
il cookie di sessione e, per questo motivo, se si riattiva 
velocemente la sessione e si assegnano nuovi valori, 
l'identificatore di sessione rimarrà lo stesso. 
Il cookie di sessione si può cancellare usando la 
funzione setcookie(), annullando il valore del cookie e 
portando la data di scadenza nel passato. 
Per esempio: setcookie(session_name(),'',time() - 42000) */

//setcookie(session_name(),'',time() - 42000);

?>
    
</body>    
</html>