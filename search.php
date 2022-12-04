<html>

<head>
    <title>Ricerca film</title>

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

    <?php  include('navbar.php');   

    
    /*if(empty($_SESSION['id'])){
        die("<div class = 'error'>non sei loggato</div>");
    }
    $id= $_SESSION['id']; */

    //$filter = trim('%'.$_POST['search'].'%'); //tolgo spazi a inizio e fine stringa con trim del film cercato

    $researched = $_POST['search']; //inserisco stringa in una variabile 
    $researched = trim($researched); //tolgo spazi prima e dopo stringa con trim
    $researched = htmlspecialchars($researched);
    $result = '';
    //echo "Contenuto ricercato: $researched";
    require_once("files/connproj.php");//inclusione file connessione al database

    /*$findfilm = "SELECT * FROM film  WHERE /*seleziono tutti i film dove il titolo/regista/attori simili al testo cercato 
                    titolo LIKE '%$researched%'
                     OR regista LIKE '%$researched%'
                     OR attori LIKE '%$researched%' ";

    mysqli_query($connection, $findfilm) or die("Error researching film" . mysqli_error($connection));*/

    //$searchf = mysqli_query($connection,"SELECT * FROM film  WHERE titolo LIKE '%$researched%' OR regista LIKE '%$researched%'OR attori LIKE '%$researched%' ");
    //$fetch = mysqli_fetch_array($searchf);

    //$row = mysqli_num_rows($searchf);
    $query= "SELECT * FROM film  WHERE titolo LIKE '%$researched%' OR regista LIKE '%$researched%'OR attori LIKE '%$researched%' ";
    $result= $connection->query($query);
    ?> 

    <body>

    <div id="container1">
        <div id="slogan">
            <h1>Hai cercato: <br> " <?= $researched ?> "</br></h1>
        </div>
    </div>

    <?php 

    //$to = $fetch['idfilm'] + $row;
    //for($i = 1; $i < $row; $i++)
    if($result->num_rows>0)
    { 
        //echo "FILM TROVATI: $researched";

        while($row=$result->fetch_assoc()){
        //echo " $i FILM TROVATO: $fetch[$i]"; //nell'array fetch si hanno degli elementi corrispondenti ai film trovati, quindi con $i stampiamo il film in posizione $i
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
                                <?php if (isset($row['vietato'])){ ?>
                                    <h2>Vietato ai minori di: </h2><p> <?= $row['vietato'] ?> </p> 
                                <?php } ?>
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

<!--
                            <div class="disp">
                                <h2>Disponibilità nei principali cinema:</h2>
                                <p>UCI Cinemas Fiumara <label class="switch"><input type="checkbox" id="cb"><span class="slider"></span></label> </p>
                                <p>The Space Cinema    <label class="switch"><input type="checkbox" id="cb"><span class="slider"></span></label> </p>
                                <p>Augustus s.r.l.     <label class="switch"><input type="checkbox" id="cb"><span class="slider"></span></label> </p>
                                <p>Il film non è più disponibile.    <label class="switch"><input type="checkbox" id="cb"><span class="slider"></span></label> </p>
                            </div>
-->

                            <div class="rating">
                                <h2 id="valfilm" class="titc">Valutazione film dai nostri iscritti: </h2> 
					            <span id="avg"> <?= $row['media_rate'] ?> / 5</span>
                                
                                <?php if (isset($_SESSION['useremail'])){   // se utente ha fatto l'accesso:
                                    $useremail = $_SESSION['useremail'];
                                    include_once("files/connproj.php"); ?> 
                        
                                    <form action="stars.php" method="post">
                                        <div class="vote">
                                            <input type="hidden" id="idfilm" name="idfilm" value="<?= $row['idfilm'] ?>">                                             
                                            <input type="hidden" name="email" id="email" value="<?= $_SESSION['useremail'] ?>"/> 
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

     