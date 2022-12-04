<!-- FILE INSERIMENTO DATI UTENTE IN DATABASE -->

<!DOCTYPE html>
<head> 
     <title>Sign-up</title>
</head>

<body>

<?php
$admin1 = "ellefabbri00@gmail.com";
$admin2 = "simone.lutero00@gmail.com";

if(isset($_POST['submit'])){ 

    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die("<h3>$email non è una e-mail valida!</h3>");
    $password = trim($_POST['pass']);
    $confirm = trim($_POST['confirm']);
   
    //PASSWORD CORTA
    if(strlen($password) < 5){
        echo "<h3>Password troppo corta, inserire almeno 5 caratteri.</h3> ";
        header("Refresh:2; url=formsignin.php");
        exit();
    }

    //Mancano dei dati
    else if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirm)){
        echo "<h3>Non hai inserito tutti i dati richiesti!</h3";
        header("Refresh:2; url=formsignin.php");
        exit();
    }

    //Password non corrispondenti
    else if($password != $confirm){ 
        echo "<h3>Le password non corrispondono. <br>Rindirizzamento al form di registrazione...</h3>";
        header("Refresh:2; url=formsignin.php"); 
        exit();
    } //altrimenti dati ok
        
        //connessione al DB
    include("files/connproj.php"); 
            
        //Pulizia Input
    $cryptedpwd = password_hash($password, PASSWORD_DEFAULT);
    $firstname = htmlspecialchars($firstname, ENT_QUOTES);
    $lastname = htmlspecialchars($lastname, ENT_QUOTES);
    $email = htmlspecialchars($email, ENT_QUOTES);
               
        //Inserimento nel DB [prepare]
    $stmt = mysqli_prepare($connection, "INSERT INTO users (firstname, lastname, email, pass, confirm) VALUES (?, ?, ?, ?, ?)");            
    mysqli_stmt_bind_param($stmt, 'sssss', $firstname, $lastname, $email, $cryptedpwd, $cryptedpwd);

        //execute
    if(!mysqli_stmt_execute($stmt)){
        echo "<h3>Errore nei dati durante la registrazione. <br> Utente potrebbe essere già registrato!</h3>";
        mysqli_stmt_close($stmt);  //chiusura statement
        mysqli_close($connection);  //chiusura connessione
        header("Refresh:2; url=formsignin.php");
            
    }else{
            
        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        //echo "<h3>Sei stato registrato correttamente!</h3>";
        header("Location: formlogin.php");
    }

}
?>

</body>
</html>

