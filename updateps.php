
<?php
    //FILE UPDATE PASSWORD UTENTE
?>

<!DOCTYPE html>   
<head>    
    <title>Change password</title>
</head>
   
<body>

<?php

include("files/connproj.php"); 
    if ( isset($_POST['updateps']) )
    {	
        session_start();
        if(empty($_POST["password"]) || empty($_POST["newps"]) || empty($_POST["newpsconfirm"])){
            echo "<h3>Dati mancanti!</h3>";
            header("Refresh:2; url=changepassword.php");
        }

        //campi password mandati dall'utente con il form + elimina spazi con trim()
        $ps=trim($_POST['password']); //password attuale
        $newps=trim($_POST['newps']); //nuova password
        $newpsconfirm=trim($_POST['newpsconfirm']); //conferma nuova password

        $email = $_SESSION['email'];

        //query
        $query = mysqli_query($connection,"SELECT pass FROM users WHERE email='$email'");
        $fetch = mysqli_fetch_array($query);

        //controlli sulla  password :
        if(!password_verify($ps, $fetch['pass'])){
            echo "<h3>Password attuale errata!!!</h3>";
            mysqli_close($connection);
            header("Refresh:2; url=changepassword.php");
            exit();
        }
        else{
            if($newps != $newpsconfirm){
                echo "<h3>Password non corrispondenti!</h3>";
                mysqli_close($connection);
                header("Refresh:2; url=changepassword.php");
                exit();
            }
            if($newps == $ps){
                echo "<h3>La nuova password è la stessa di quella vecchia!</h3>";
                mysqli_close($connection);
                header("Refresh:2; url=show_profile.php");
                exit();
            }
            //PASSWORD CORTA
            if(strlen($newps) < 5){
                echo "<h3>Password troppo corta, inserire almeno 5 caratteri!</h3>";
                mysqli_close($connection);
                header("Refresh:2; url=changepassword.php");
                exit();            
            }
        
            $hash = password_hash($newps, PASSWORD_DEFAULT); //hash della nuova password scelta dall'utente

            //query di aggiornamento
            $queryupdate = "UPDATE users SET confirm='$hash', pass='$hash' WHERE email='$email' ";
            $resultupdate = mysqli_query($connection,$queryupdate) or die(mysqli_error($connection));
            
            if(!($resultupdate)){
                echo "<h3>Siamo spiacenti ma c'è stato un errore. Riprova!</h3>";
                mysqli_close($connection);
                header("Refresh:2; url=changepassword.php");
                exit();
            }else{
                echo "<h3>Password cambiata correttamente!</h3>";
            }     
        }
        mysqli_close($connection);
        header("Refresh:2; url=show_profile.php");
    }

?>

</body>
</html>