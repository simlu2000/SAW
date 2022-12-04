<?php		
//CONNESSIONE AL DATABASE :

//Test locale:  
/*
$host = 'localhost:3307';
$user = 'eleonora';
$pwd = '22092000';
$dbase = 'progettolf';
//$table = 'users';
*/

//Test server:
$host = 'localhost';
$user = 'S4842235';
$pwd = 'efsaw';
$dbase = 'S4842235';
//$table = 'users';

 //APERTURA CONNESSIONE
 $connection = mysqli_connect($host, $user, $pwd, $dbase); //apro la connessione con l'utente ... pass... nel database saw
 //verifico che la connessione sia avvenuta con successo
 if (mysqli_connect_errno()) {
     echo "Connessione fallita: " . mysqli_connect_error();
     exit();
 }

?>
