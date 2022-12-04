<!-- PAGINA CON TUTTI I FILMS + RICERCA -->
<html>

<head>
    <title>Ricerca film</title>
    <!-- IMMAGINE FAVICON -->
    <link rel="icon" type="image/x-icon" href="./media/logo/logo_min.png"/>
    
    <?php
        echo "<link rel='stylesheet' type='text/css' href='stilefilmspage.css'>"; 
        echo "<link rel='stylesheet' type='text/css' href='stileNavFoot.css'>"; 

        echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
        echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
        echo "<link href='https://fonts.googleapis.com/css2?family=DM+Sans:wght@500&display=swap' rel='stylesheet'>";
        
    ?>
</head>
<body>

    <?php  include('navbar.php');    ?>
                

    <div id="titlepage">
        <div id="container1">
            <div id="slogan">
                <h1>Cerca il film<br>che vuoi vedere.</h1>
            </div>
            <span id="imgarea"></span>
        </div>

        <div id="searchfilm">
            <form method="POST" action="search.php">
                <input type="text" id="searcharea" name="search" class="txt" size="30" placeholder="Cerca film, regista, attore">
                <input type="submit" id="searchbtn" name="searchf" value="Cerca">
            </form>
        </div>

        <hr id="filmline">         
                           
        <?php 
        require_once("files/connproj.php");//inclusione file connessione al database

        $query=  "SELECT * FROM film ORDER BY datauscita DESC LIMIT 20";  //seleziona solo gli ultimi 20 film usciti (così quelli vecchi non compaiono)
            $res = mysqli_query($connection, $query);
            if(mysqli_num_rows($res) > 0){
                while($row = mysqli_fetch_assoc($res)){   
        ?>

                <div id="filmlist">
                    <div class="filmbox">

                        <div class="filmtitle"><h1 id="tit"><?= $row['titolo'] ?></h1></div>

                        <div class="infointest">
                            <div class="filmcover">
                                <img class="cover" src="<?= $row['copertina'] ?>" alt="<?= $row['titolo'] ?>">
                            </div>
                            <span class="info"> 
                                <h2>Data di uscita: </h2><p><?= $row['datauscita'] ?></p>
                                <h2>Durata: </h2><p><?= $row['durata'] ?></p>
                                <h2>Regista: </h2><p><?= $row['regista'] ?></p>
                                <h2>Genere: </h2><p><?= $row['genere'] ?> </p>
                            </span>
                        </div>
                        <div class="infoplus">
                            <div class="inf">
                                <h2>Attori: </h2> <p><?= $row['attori'] ?></p>
                            </div>
                            <div class="inf">
                                <h2>Trama</h2>
                                <p><?= $row['trama'] ?></p>
                            </div>
                            
                            <div class="inf">
                                <h2>Trailer <a href="<?= $row['trailer'] ?>"> <img id="iconyt" src="./media/icons/yt.jpg" alt="" width="40px" height="25px"> </a>  </h2>
                            </div>

                            <div class="rating">
                                <h2 id="valfilm" class="titc">Valutazione film dai nostri iscritti: </h2> 
					            <span id="avg"> <?= $row['media_rate'] ?> / 5</span>
                                
                                <?php if (isset($_SESSION['email'])){   // se utente ha fatto l'accesso:
                                    $useremail = $_SESSION['email'];
                                    include_once("files/connproj.php"); ?> 
                        
                                    <form action="stars.php" method="post">
                                        <div class="vote">
                                            <input type="hidden" id="idfilm" name="idfilm" value="<?= $row['idfilm'] ?>">                                             
                                            <input type="hidden" name="email" id="email" value="<?= $_SESSION['email'] ?>"/> 
                                            <p><output id="rangeValue" for="rate">0</output> 0 <input type="range" class="range" name="rate" id="rate" min="0" max="5" step="1" value="0" onchange="rangeValue.value=value" require> 5 </p>
                                            <p><input type="submit" name="sendval" id="subinvia" value="Invia"> </p>
                                        </div>
                                    </form>
                                <?php }else{  ?>
                                    <p><a href="formlogin.php" id="accrate">Accedi</a> per inserire la tua valutazione sul film! </p>
                                <?php }  ?>                        
                            </div>
                        </div>
                    </div>
	        <?php } } ?>                    

    <?php include('footer.html'); ?> 
    
</body>    
</html>