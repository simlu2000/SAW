<!-- FILE AGGIORNAMNETO DATI UTENTE IN DATABASE -->

<!DOCTYPE html>   
<head>    
    <title>Sign-up</title>
</head>
<body>

<?php

session_start();

include("files/connproj.php");

    if ( isset($_POST['submit']) ){		
        //controllo siano arrivati dati
        if(empty($_POST["firstname"]) || empty($_POST["lastname"])){ 
            echo "<h3>Dati obbligatori mancanti!</h3>";
            header("Refresh:2; url=updateform.php");
        }	
        else{
                $email = $_SESSION['email']; //inserisco in variabili i dati che l'utente ha inserito nel form
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die("<h3> $email non è valida! </h3>");
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];

                //Formatto i dati da mettere nel db
                $firstname = htmlspecialchars($firstname, ENT_QUOTES);
                $lastname = htmlspecialchars($lastname, ENT_QUOTES);
                $email = htmlspecialchars($email, ENT_QUOTES);

                $current = $_SESSION['email'];  //attuale e-mail

                if(isset($_POST['city'])){
                    $city = $_POST['city'];
                    $city = htmlspecialchars($city, ENT_QUOTES);
                }else {
                    $city = "---";
                }
                if(isset($_POST['kindoffilm'])){
                    $kindoffilm = $_POST['kindoffilm'];
                }else {
                    $kindoffilm = "---";
                }
                if(isset($_POST['pass'])){
                    $pass = $_POST['pass'];
                }else {
                    $pass = "---";
                }

                $query = mysqli_prepare($connection, "UPDATE users SET firstname=?, lastname=?, city=?, kindoffilm=? WHERE email=?");
                mysqli_stmt_bind_param($query, 'sssss', $firstname, $lastname, $city, $kindoffilm, $current);
                
                if(!(mysqli_stmt_execute($query))){
                    echo "<h3>Errore: Dati errati. Modifica profilo NON avvenuta!</h3>";
                    header("Refresh:2; url=updateform.php");
                }else{
                    $_SESSION["email"] = $email;
                    $_SESSION["firstname"] = $firstname;
                    $_SESSION["lastname"] = $lastname;
                    $_SESSION["city"] = $city;
                    $_SESSION["kindoffilm"] = $kindoffilm;
                    //$_SESSION["current"] = $current;
                    echo "<h3>Modifica effettuata correttamente!</h3>";
                    header("Refresh:2; url=show_profile.php");
                }    
                //CHIUSURA CONNESSIONE e statement
                mysqli_stmt_close($query);
                mysqli_close($connection);
                header("Refresh:2; url=show_profile.php"); 
            }
        
        
    }      
?>

</body>
</html>