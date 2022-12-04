<!DOCTYPE html>

<head>
    <title>Cambio password</title>
    <!-- IMMAGINE FAVICON -->
    <link rel="icon" type="image/x-icon" href="./media/logo/logo_min.png"/>


        <?php

                echo "<link rel='stylesheet' type='text/css' href='stileNavFoot.css'>"; 
                echo "<link rel='stylesheet' type='text/css' href='stileprofilo.css'>"; 

                echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
                echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
                echo "<link href='https://fonts.googleapis.com/css2?family=DM+Sans:wght@500&display=swap' rel='stylesheet'>";
        ?>


</head>

<body>

<?php
    include('navbar.php');

    if (isset ($_SESSION['email']) ){ //se l'utente ha fatto accesso, allora permetto il cambio password

?>

<div  id="profiletitle">
    <h2 id="tip">Cambio password</h2>
</div>

<hr id="profileline">

    <div id="boxshow">
        <form action="updateps.php" method="POST" name="update">
            <table>
                <tr>
                    <th height="42" scope="row">Password attuale</th> 
                    <td><input type="password" name="password" id="password"/></td>
                </tr>

                <tr>
                    <th height="42" scope="row">Nuova password</th>
                    <td><input type="password" name="newps" id="passwordcf"/></td>
                </tr>

                <tr>
                    <th height="42" scope="row">Conferma nuova password</th>
                    <td><input type="password" name="newpsconfirm" id="passwordcf"/></td>
                </tr>
                                
            </table>
            <input type="submit" value="Salva" id="updatebtn" name="updateps" />
        </form>   
    </div>
    <?php } ?>
</body>
