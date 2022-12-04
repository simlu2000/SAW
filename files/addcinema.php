<!-- file che aggiunge film su db -->
<!DOCTYPE html>
<head> 
     <title></title>
</head>

<body>

<?php

include_once("connproj.php"); 

if(isset($_POST['add']) ) {

    //prendo campi compilati nel form
    $nome= trim($_POST['nome']);
    $indirizzo= trim($_POST['indirizzo']); 
    $link= trim($_POST['link']);
    $telefono= trim($_POST['telefono']);
    $citta= trim($_POST['citta']);

    $nome = mysqli_real_escape_string($connection, $nome);
    $indirizzo = mysqli_real_escape_string($connection, $indirizzo);
    $telefono = mysqli_real_escape_string($connection, $telefono);
    $citta = mysqli_real_escape_string($connection, $citta);

    //controlli campi, verifico che non sia gia presente nel database un film con quel nome
    $querycinema = "SELECT idcinema FROM cinema WHERE nome='$nome' ";
    $ris = mysqli_query($connection,$querycinema);
    $row = mysqli_fetch_assoc($ris);

    if(empty($nome) || empty($indirizzo) || empty($citta)){
        echo "<h3>Non hai inserito tutti i dati richiesti!</h3>";
        header("Refresh:2; url=formaddcinema.php");
    }

    if($row>0){
       	echo "<h3>Cinema gia' presente sul database!</h3>";
       	header("Refresh:1.5; url=formaddcinema.php");

    } //altrimenti procedo con l'inserimento del cinema sul database
    else{
        $addcinema = "INSERT INTO cinema(nome,citta,indirizzo,telefono,link) VALUES ('$nome','$citta','$indirizzo','$telefono','$link')";
        mysqli_query($connection, $addcinema) or die("Error inserting cinema" . mysqli_error($connection));
        echo "<h3>Cinema inserito correttamente!</h3>";
        header("Refresh:1.5; url=formaddcinema.php");

    }

}