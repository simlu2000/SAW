<!-- FORM DI ACCESSO AL SITO -->

<!DOCTYPE html>
    <html lang="eng">

    <head>
        <title>Login</title>
        <!-- IMMAGINE FAVICON -->
        <link rel="icon" type="image/x-icon" href="./media/logo/logo_min.png"/>

        <?php
            echo "<link rel='stylesheet' type='text/css' href='stile_logsign.css'>"; 
            ?>

    </head>

    <body>
        <div id="container">       
            <div id="login"> 
                <div id="title">
                    <div id="btnback"><a href="homepage.php" class="back"></a></div>
                    <span class="in"><h1>Login</h1></span>
                </div>
                <hr>
                <div id="fr">
                    <form action="login.php" method="post">
                    <?php include_once("files/connproj.php"); ?>
                        <table>
                    
                            <tr type="none" id="req">
                                <td><input type="email" id="email" name="email" ></td>
                                <th height="42" scope="row" class="required">E-mail</th>
                            </tr>
                            
                            <tr type="none" id="req">
                                <td><input type="password" id="pass" name="pass" class="required"></td>
                                <th height="42" scope="row" class="required"> Password </th>
                            </tr>
                        
                        </table>
                        <div id="btn">
                            <input type="submit" value="Accedi" id="acc" name="submit">
                            
                            <button id="reg"><a href="formsignin.php">Registrati</a></button>

                        </div>
                    </form>
                </div>                              
            </div>   
        </div> 
    </body>  
</html>