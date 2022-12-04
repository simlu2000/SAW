<!-- PAGINA CON TUTTI I FILMS + RICERCA -->

<!DOCTYPE html>

<head>
    <title>About</title>
    <!-- IMMAGINE FAVICON -->
    <link rel="icon" type="image/x-icon" href="./media/logo/logo_min.png"/>
        <?php
            echo "<link rel='stylesheet' type='text/css' href='stileNavFoot.css'>"; 
            echo "<link rel='stylesheet' type='text/css' href='stileabout.css'>"; 
        
            echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
            echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
            echo "<link href='https://fonts.googleapis.com/css2?family=DM+Sans:wght@500&display=swap' rel='stylesheet'>";
       ?>
        
</head>
<body>

<?php include('navbar.php');   ?>

<div id="container">
    <div id="container1">
        <div id="slogan">
            <h1>Cerca i film al cinema<br> con CiakMov.</h1>
        </div>
        
        <span id="imgarea"></span>
    </div>

    <hr class="line">
    
    <h2 class="info">Cosa puoi fare con CiakMov<span style='font-size:50px;'>&#10067;</span></h2>
    <div id="container2">
        <br>
        <div class="box">
            <div id="img1" class="boximg"></div>
            <h3 class="boxtitle">Cinema</h3>
            <p class="boxinfo">Trova i cinema nei dintorni</p>
        </div>

        <div class="box">
            <div id="img2" class="boximg"></div>
            <h3 class="boxtitle">Consigli</h3>
            <p class="boxinfo">Scegli il prossimo film da vedere in base ai consigli degli altri utenti!</p>
        </div>

        <div class="box">
            <div id="img3" class="boximg"></div>
            <h3 class="boxtitle">Film</h3>
            <p class="boxinfo">Scopri i film che sono usciti al cinema negli ultimi mesi</p>
        </div>
    </div>

    <h2 id="who" class="info">CHI SIAMO</h1>
    <div id="container3">
        <div class="whobox" id="sl">
            <div id="slimg">&#x1F64B;&#x1F3FB;&#x200D;&#x2642;&#xFE0F;</div>
            <p id="slemail">Simone Lutero<br><a href="mailto:s4801326@studenti.unige.it?subject=Segnalazione CIAKMOV">s4801326@studenti.unige.it</a></p>
        </div>

        <div class="whobox" id="el">
            <div id="efimg">&#x1F64B;&#x1F3FB;&#x200D;&#x2640;&#xFE0F;</div>
            <p id="efemail">Eleonora Fabbri<br><a href="mailto:s4842235@studenti.unige.it?subject=Segnalazione CIAKMOV">s4842235@studenti.unige.it</a>
        </div>
    </div>

    <h2 id="" class="info">L'IDEA</h1>
    <div id="infoab">
        <p class="infoab">Siamo due ragazzi a cui piace andare al cinema. Per cercare quale film andare a vedere non abbiamo mai trovato un buon sito web che ci piacesse. <br>
        <br> Così è nata l'idea di <mark class="ev">CIAKmov </mark> !</p>
        <br>
    </div>

    <?php  include('footer.html');  ?> 
</div>

</body>    
</html>