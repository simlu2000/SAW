<!-- PAGINA CON TUTTI I FILMS + RICERCA --> 

<!DOCTYPE html>

<head>
    <title>Ricerca cinema</title>
    <!-- IMMAGINE FAVICON -->
    <link rel="icon" type="image/x-icon" href="./media/logo/logo_min.png"/>

    <?php
        echo "<link rel='stylesheet' type='text/css' href='stilecinemaspage.css'>"; 
        echo "<link rel='stylesheet' type='text/css' href='stileNavFoot.css'>";

        echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
        echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
        echo "<link href='https://fonts.googleapis.com/css2?family=DM+Sans:wght@500&display=swap' rel='stylesheet'>"; 
    ?>
</head>
<body>
    <?php  include('navbar.php'); ?>    
                
    <div id="container1">
        <div id="slogan">
            <h1>Cerca un cinema<br>nei dintorni.</h1>
        </div>
        <div id="imgarea"></div> 
    </div>


    <div id="searchcinema">
            <form method="POST" action="searchcinema.php">
                <input type="text" id="searcharea" name="search" class="txt" size="30" placeholder="Cerca nome o citta' del cinema">
                <input type="submit" id="searchbtn" name="searchc" value="Cerca">
            </form>
    </div>

    <hr id="cinemaline" >

    
    <?php 
        require_once("files/connproj.php");//inclusione file connessione al database

        $query= "SELECT * FROM cinema ";
        $result= $connection->query($query);

        if($result->num_rows>0) { 
            while($row = $result->fetch_assoc()){
        ?>

    <div id="cinemalist">
        <div id="cinemabox">

            <div class="cinemaname"?><h1 id="name"><?= $row['nome'] ?></h1></div>
    
            <div class="infointest">
                <span class="info">
                    <h2>Città:</h2><p><?= $row['citta'] ?></p>
                    <h2>Via:</h2><p><?= $row['indirizzo'] ?></p>
                    <h2>Telefono:</h2><p><?= $row['telefono'] ?></p>
                    <?php if (!empty($row['link'])){ ?>
                        <h2>Link sito web  &#128073;<a href="<?= $row['link'] ?>" id="finger">Clicca qui!</a></h2>    
                    <?php } ?>
                    
                </span>
            </div>

        </div>
    </div>

    <?php }  } ?>



    <!-- JQUERY CDM x far funzionare filtro ricerca -->
    <script 
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script> 

    <!-- script per filtro ricerca cinema -->
    <script src="js/filter.js"></script>

    
    <?php include('footer.html');  ?> 

</body>    
</html>