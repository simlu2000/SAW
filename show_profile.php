<?php
    //FILE PAGINA RISERVATA DI UTENTE
?>

<!DOCTYPE html>
    <html lang="eng">

<head>
    <title>Profile</title>
    <!-- IMMAGINE FAVICON -->
    <link rel="icon" type="image/x-icon" href="./media/logo/logo_min.png"/>

    <?php
        echo "<link rel='stylesheet' type='text/css' href='stileprofilo.css'>"; 
        echo "<link rel='stylesheet' type='text/css' href='stileNavFoot.css'>"; 
    
        echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
        echo "<link href='https://fonts.googleapis.com/css2?family=DM+Sans:wght@500&display=swap' rel='stylesheet'>";
        echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
    ?>
</head>
<body>

    <?php

        include('navbar.php');

        if (isset($_SESSION['email']) ){  
            $useremail = $_SESSION['email'];
            
            include_once("files/connproj.php"); 

            ?>
                
            <div id="profiletitle">
                <h1 id="ciao">Ciao <span id="nameuser"><?= $_SESSION['firstname'] ?></span></h1>  
                <h2 id="tip">Qui puoi modificare il tuo profilo.</h2>
            </div>

            <hr id="profileline">

                <div id="boxshow">
                    <form action="updateform.php" method="POST" name="name">
                    <?php  include_once("files/connproj.php"); ?>
                        <table>
                            <tr>
                                <td><input type="text" name="firstname" id="firstname"  value="<?= $_SESSION['firstname']?>" class="form-control" disabled/></td>
                                <th height="42" scope="row" class="label"> Nome </th> 
                            </tr>

                            <tr>
                                <td><input type="text" name="lastname" id="lastname" value="<?= $_SESSION['lastname']?>"  class="form-control" disabled/></td>
                                <th height="42" scope="row" class="label"> Cognome </th>
                            </tr>

                            <tr>
                                <td><input type="text" name="email" id="email" value="<?= $_SESSION['email'] ?>"  class="form-control" disabled/></td>
                                <th height="42" scope="row" class="label"> Email </th>
                            </tr>

                            <tr>
                                <td><input type="text" name="pass" id="pass" value="********"  class="form-control" disabled/></td>
                                <th height="42" scope="row" class="label"> Password </th>
                            </tr>

                            <tr>
                                <td><input type="text" name="city" id="city" value="<?= $_SESSION['city'] ?>"  class="form-control" disabled/></td>
                                <th height="42" scope="row" class="label"> Città </th>
                            </tr>

                            <tr>
                                <th height="42" scope="row" class="label">Genere preferito : </th> 
                                <td>
                                    <select id="kindoffilm" name="kindoffilm"  disabled>
                                    <option value=""><?= $_SESSION['kindoffilm'] ?></option>
                                        <option value="Animazione"> Animazione</option>
                                        <option value="Avventura"> Avventura</option>
                                        <option value="Azione"> Azione</option>
                                        <option value="Biografico"> Biografico</option>
                                        <option value="Commedia"> Commedia</option>
                                        <option value="Documentario"> Documentario</option>
                                        <option value="Drammatico"> Drammatico</option>
                                        <option value="Fantascienza"> Fantascienza</option>
                                        <option value="Fantasy"> Fantasy</option>
                                        <option value="Horror"> Horror</option>
                                        <option value="Musical"> Musical</option>
                                        <option value="Romantico"> Romantico</option>
                                        <option value="Storico"> Storico</option>
                                        <option value="Thriller"> Thriller</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" value="Modifica" id="sb" name="submit" />
                    </form>
                    <button id="cs"><a href="changepassword.php">Cambia Password</a></button> 

                    <?php if($_SESSION['newsletter'] == 0 || $_SESSION['newsletter']==NULL) {?>
                    <form id="joinnw" action="subscribenewsletter.php" method="POST">
                        <input id='newsletterbutton' type='submit' name='submit' value='Iscriviti alla nostra newsletter!'>       
                    </form> 
                    <?php } else { ?>
                         <form id="joinnw" action="unsubscribenewsletter.php" method="POST">
                         <input id='newsletterbutton' type='submit' name='submit' value='Disiscriviti dalla newsletter'>       
                     </form> 
                     <?php } ?>
                </div>
    <?php  }  
                else{
                        echo "<div id=nohere>";
                        echo "<h3>Pagina riservata. Non hai effettuato l'accesso.</h3>";
                        echo "</div>";
                        
                        exit();
                
                }?>    
</body>    
</html>