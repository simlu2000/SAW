<!-- FORM DI REGISTRAZIONE AL SITO -->

<?php
/*include_once("C:\Users\simon\Database\connproj.php");*/
?>

<!DOCTYPE html>
    <html lang="eng">

<head>
    <title>Registration</title>
    <!-- IMMAGINE FAVICON -->
    <link rel="icon" type="image/x-icon" href="./media/logo/logo_min.png"/>

    <?php
            echo "<link rel='stylesheet' type='text/css' href='stile_logsign.css'>"; 
    ?>
    


    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js" >//includo script per le jquery, cosi lo script ajax funziona</script> 

    <script>  //script ajax
        function emailcontrol() {
            $("#loaderIcon").show(); //icona caricamento che appare mentre viene fatto il controllo sul database
            jQuery.ajax({

                url: "emailcontrol.php",  //pagina che controlla email nel database
                data:'email='+$("#email").val(), //dati che consideri (qui campo email)
                type: "POST", //tipo post 

                success:function(data){ //nel caso in cui la funzione abbia successo sul dato considerato(email)
                    $("#email-status").html(data); //paragrafo stato email mostrato (se email usabile c'è scritta verde, altrimenti rossa)
                    $("#loaderIcon").hide(); //poi una volta apparso lo stato, l'icona di caricamento scompare
                },

                error:function (){}
            });        
        }
    </script>
</head>
<body>    
    <div id="container">
        <div id="signin"> 
            <div id="title">
                <div id="btnback"><a href="homepage.php" class="back"></a></div>
                <span class="in"><h1>Signin</h1></span>
            </div>
            <hr>
            <div id="fr">
                <form action="registration.php" method="POST">
                <?php include_once("files/connproj.php"); ?>
                    <table>
                        <tr>
                            <td><input type="text" name="firstname" id="firstname" value="" class="form-control" required /></td>
                            <th height="42" scope="row" class="required">Nome</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="lastname" id="lastname" value="" class="form-control" required /></td>
                            <th height="42" scope="row" class="required">Cognome</th>
                        </tr>
                        <tr>
                            <td width="71%"><input type="email" name="email" id="email" onBlur="emailcontrol()" value="" class="form-control" required /></td>
                            <th width="24%" height="46" scope="row" class="required">Email</th>
                        </tr>
                        <tr>
                            <td > <span id="email-status"></span> </td>
                            <th width="24%" scope="row"></th> 
                        </tr> 
                        <tr>
                            <td><input type="password" name="pass" id="pass" value="" class="form-control" required /></td>
                            <th height="42" scope="row" class="required">Password</th>
                        </tr>
                        <tr>
                            <td><input type="password" name="confirm" id="confirm" value="" class="form-control" required /></td>
                            <th height="42" scope="row" class="required">Conferma password</th>
                        </tr>
                    </table>

                    <input type="submit" value="Registrati" id="sb" name="submit" />     
                
                </form>
            </div>
        </div>   
    </div>
</body>       


</html>