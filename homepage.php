<?php
    //HOMEPAGE
    // Copyright © 2021/2022 - Ciakmov - Simone Lutero & Eleonora Fabbri- all rights reserved. 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Homepage</title>

        <!-- IMMAGINE FAVICON -->
        <link rel="icon" type="image/x-icon" href="./media/logo/logo_min.png"/>

        <?php
            echo "<link rel='stylesheet' type='text/css' href='stile.css'>"; 
            echo "<link rel='stylesheet' type='text/css' href='stileNavFoot.css'>"; 


            echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
            echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
            
            echo "<link href='https://fonts.googleapis.com/css2?family=DM+Sans:wght@500&display=swap' rel='stylesheet'>";
            echo "<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>";    
            
            //FONT NAVBAR
            echo "<link href='https://fonts.googleapis.com/css2?family=Poppins&display=swap' rel='stylesheet'>";

            echo "<link href='https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&family=Righteous&display=swap' rel='stylesheet'>";
           
            /*font per pulsante della <subscribearea></subscribearea>*/
            echo "<link href='https://fonts.googleapis.com/css2?family=Poppins&display=swap' rel='stylesheet'>";
       ?>
    </head>
    

    <body>
    
        <?php 
            include('navbar.php');
        ?>
        
        <div id="collage">
            <?php // <button onclick="lightmode()">LightMode</button> ?>

            <h1 id="nomesito">CIAKMOV</h1>

            <div id="search">
                                
                <button id="btnfilm" class="button"><a href="filmspage.php"><span>Film</span></a></button>
                <button id="btncinema" class="button"><a href="cinemaspage.php"><span>Città</span></a></button> 
                                
            </div>
        </div>

        <h2 id="t1"><mark class="stickers">&#127916;</mark> Tra le ultime uscite </h2>

        <div id="lastfilms">
            <?php 
            require_once("files/connproj.php");//inclusione file connessione al database

            $query=  "SELECT * FROM film ORDER BY datauscita DESC LIMIT 6";  //seleziona solo gli ultimi 6 film usciti
            $res = mysqli_query($connection, $query);
            if(mysqli_num_rows($res) > 0){
                while($row = mysqli_fetch_assoc($res)){   
            ?>
                <a href="filmspage.php"><img class="filmc" src="<?= $row['copertina'] ?>"></a>
                
            <?php } } ?>   
        </div>

        <div id="subscribearea">
            
        <?php //se admin
        if (isset($_SESSION['email']) && ($_SESSION['email']==$admin1 || $_SESSION['email']==$admin2)){ ?>
            <div id="subscribe">
                <h2 id="subtit"> Funzioni amministratore: </h2>
            </div>

            <div id="functionsarea">
                <button id="newc" class="button"> <div id="f3icon"></div> <span><a id="link" href="files/formaddcinema.php"> Inserisci un nuovo Cinema! </a></span> </button>     
                <button id="newf" class="button"> <div id="f4icon"></div> <span><a id="link" href="files/formaddfilm.php"> Inserisci un nuovo Film! </a> </span> </button>     
                <button id="newsletter" class="button"> <div id="f1icon"></div> <span><a id="link" href="files/formnewsletter.php"> Invia Newsletter! </a> </span> </button>     
            </div>
            <?php }else{?>   

                <div id="subscribe">
                    <h2 id="subtit">Ti piacciono i film?</h2>
                </div>

                <div id="functionsarea">
                    
                    <div id="f1">
                        <div id="f1icon"></div>
                            <div class="ftit">
                                <p>Newsletter</p>
                            </div>
                            <p class="descr">Rimanere aggiornato sulle ultime uscite</p>
                    </div>

                    <div id="f2">
                        <div id="f2icon"></div>
                            <div class="ftit">
                                <p>Recensioni</p>
                            </div>
                            <p class="descr">Scoprire i pareri degli altri utenti</p>
                    </div>

                    <?php //se non ha fatto accesso
                    if (!isset($_SESSION['email'])){ ?>
                    <div id="arw"></div>
                </div>
                    <button id="loginbtn" class="button"><span><a id="link" href="formlogin.php">Login</a></span></button>     
            <?php }} ?>
        </div>

        <?php include('footer.html');     ?> 
        
            
    </div>
        
    <script>
        function lightmode() 
        {
            var bd = document.body; //body pagina
            bd.classList.toggle("body-light-mode");

        }
    </script>

    </body>
    
</html> 
