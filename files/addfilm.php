<!-- file che aggiunge film su db -->
<!DOCTYPE html>
<head> 
     <title></title>
</head>

<body>

<?php


if(isset($_POST['add']) ) {
    //controllo se film da inserire non e presente nel database
    //con query e like?

    //prendo campi compilati nel form
    $titolo= trim($_POST['titolo']);
    $copertina= trim($_POST['copertina']); 
    $durata= trim($_POST['durata']);
    $regista= trim($_POST['regista']);
    $attori= trim($_POST['attori']);
    $genere= trim($_POST['genere']);
    $trama= trim($_POST['trama']);
    $trailer= trim($_POST['trailer']);
    $paese= trim($_POST['paese']);
    $data= trim($_POST['data']);

    //connessione al db
    include_once("connproj.php"); 

    if(empty($titolo) || empty($copertina) || empty($durata) || empty($regista) || empty($attori) || empty($genere) || empty($trama) || empty($trailer) || empty($paese) || empty($data)){
        echo "Non hai inserito tutti i dati richiesti!";
        header("Refresh:2; url=formaddfilm.php");
    }
   
    $titolo =  mysqli_real_escape_string($connection, $titolo);
    $trama =  mysqli_real_escape_string($connection, $trama);
    $regista =  mysqli_real_escape_string($connection, $regista);
    $attori =  mysqli_real_escape_string($connection, $attori);
    $paese =  mysqli_real_escape_string($connection, $paese);

    
    //controlli campi, verifico che non sia gia presente nel database un film con quel nome
    //$controlfilm = mysqli_query($connection, "SELECT idfilm FROM film WHERE titolo='$titolo' ");
    $queryfilm = "SELECT idfilm FROM film WHERE titolo='$titolo' ";
    $ris = mysqli_query($connection,$queryfilm);
    $row = mysqli_fetch_assoc($ris);


    if($row>0){
       	echo "Film gia' presente sul database!";
       	header("Refresh:1.5; url=formaddfilm.php");

    } //altrimenti procedo con l'inserimento del film sul database
    else{
        $addfilm = "INSERT INTO film(titolo,copertina,durata,regista,attori,genere,trama,trailer,paese,datauscita) VALUES ('$titolo','$copertina','$durata','$regista','$attori','$genere','$trama','$trailer','$paese','$data')";
        mysqli_query($connection, $addfilm) or die("Error inserting film" . mysqli_error($connection));
        echo "Film inserito correttamente!";
        header("Refresh:1.5; url=formaddfilm.php");


    }

}