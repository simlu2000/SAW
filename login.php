<!DOCTYPE html>
<head>
    <title>Log-in</title>
</head>

<body>

<?php
    session_start();

    if ( isset($_POST['submit']) )
    {									//Se "submit" è impostato (quindi "Invia" è stato cliccato)
		$email = $_POST['email']; //inserisco in due variabili i dati che l'utente ha inserito nel form
        $pass = $_POST['pass']; 

        //CONTROLLO RIEMPIMENTO CAMPI DATI
        if (empty($email) || empty($pass))
        {
           echo "<h3>Non hai compilato tutti i campi richiesti!</h3>";
           header("Refresh:2; url=formlogin.php");			
        }
          
        //connessione al database
        include_once("files/connproj.php"); 

        //pulizia input
        $email = mysqli_real_escape_string($connection,$email);

        //PREPARAZIONE QUERY [prepare]
        $query = mysqli_prepare($connection,"SELECT * FROM users WHERE email=?");
        mysqli_stmt_bind_param($query, 's', $email);

        //execute e controllo risultato
        if(mysqli_stmt_execute($query)){
            $res = mysqli_stmt_get_result($query);
            if(mysqli_num_rows($res) > 0){
                $row = mysqli_fetch_array($res);
                if(password_verify($pass, $row["pass"])){
                    //variabili di sessione
                    $_SESSION['firstname']=$row['firstname'];
                    $_SESSION['lastname']=$row['lastname'];
                    $_SESSION['email']=$email;
                    $_SESSION['kindoffilm']=$row['kindoffilm'];
                    $_SESSION['city']=$row['city'];
                    $_SESSION['newsletter']=$row['newsletter'];

                    //echo "Accesso effettuato!";
                    header("Refresh:0.1; url=homepage.php"); //se dati trovati, passo dati e torno a homepage
                }
                else{ //se non è stato trovato account con quei dati
                    echo "<h3>Errore: Dati errati. Verrai rindirizzato alla pagina di accesso.</h3>";
                    mysqli_stmt_close($query);
                    mysqli_close($connection);
                    header("Refresh:2; url=formlogin.php");
                }
            }else {
                echo "</h3>Errore: Dati errati. Verrai rindirizzato alla pagina di accesso.</h3>";
                mysqli_stmt_close($query);
                mysqli_close($connection);                
                header("Refresh:2; url=formlogin.php");
            }    
        } 
    }
    else{
        echo "<h3>Errore durante l'accesso. Verrai rindirizzato alla pagina di accesso.</h3>";
        mysqli_stmt_close($query);
        mysqli_close($connection);        
        header("Refresh:2; url=formlogin.php");
    }
?>

</body>
</html>