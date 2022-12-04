<!DOCTYPE html>
<head> 
     <title>Rate</title>
</head>

<body>

<?php
require_once("files/connproj.php"); 

   if (isset($_POST['sendval'])){   //se è stata mandata una valutazione

        $idf = $_POST["idfilm"]; 
        $email = $_POST["email"];   
        $rate = $_POST["rate"];

        $query = "INSERT INTO star VALUES ('$idf','$email','$rate')"; //query inserimento valutazione

        if (mysqli_query($connection, $query)){     //se la query è stata eseguita correttamente

            //calcolo la media :

            $queryrate = mysqli_query($connection,"SELECT COUNT(rate) AS countr FROM star WHERE idfilm = '$idf'");
            $fetchrate = mysqli_fetch_array($queryrate);    

            $querysum = mysqli_query($connection,"SELECT SUM(rate) AS total FROM star WHERE idfilm = '$idf'");
            $fetchsum = mysqli_fetch_array($querysum);

            if($fetchrate['countr'] > 0) {
                $med = $fetchsum['total'] / $fetchrate['countr'];
            }
            $media = round($med, $precision=2);
            
            //inserisco la media nella tabella del database:

            $query = "UPDATE film SET media_rate='$media' WHERE idfilm = '$idf'";                
            $result = mysqli_query($connection,$query) or die(mysqli_error($connection));

            echo "<h3>La tua valutazione è stata inserita correttamente!</h3>";
            header("Refresh:1.5; url=filmspage.php"); 

        } else{

            echo "<h3>Errore:   Hai già valutato questo film.</h3>";
            header("Refresh:2; url=filmspage.php");
        }
        
    //chiudo la connessione
    mysqli_close($connection);
}
?>

</body>
</html>

