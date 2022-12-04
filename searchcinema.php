<html>

<head>
    <title>Ricerca cinema</title>

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

    $query= "SELECT * FROM cinema  WHERE citta LIKE '%$researched%' OR nome LIKE '%$researched%' ";
    $result= $connection->query($query);
    ?> 

    <body>

    <div id="container1">
        <div id="slogan">
            <h1>Hai cercato: <br> " <?= $researched ?> "</br></h1>
        </div>
    </div>

    <?php 

    if($result->num_rows>0)
    { 

        while($row=$result->fetch_assoc()){
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
            

    <?php include('footer.html'); ?> 
    
</body>    
</html>

     