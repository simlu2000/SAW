<html>
    <head>Aggiungi nuovo cinema nel database!
        <style>
            p{ margin-top: 5px;}
            input:not(.btn){ width: 400px; height: 30px; }
            textarea{ width: 400px; height: 50px; }
            #durata,#vietato{ width: 150px; }
	        .shift{text-transform: capitalize;}
            a{text-decoration: none; color: black;}
            .btn{margin-left: 20px;}
            span{margin-left: 10px;}
        </style>

        <?php
            echo "<link rel='stylesheet' type='text/css' href='/chroot/home/S4842235/public_html/stile.css'>"; 
            //echo "<link rel='stylesheet' type='text/css' href='stileNavFoot.css'>"; 
        ?>

    </head>

    <body>
        <span><button><a href="https://saw21.dibris.unige.it/~S4842235/homepage.php">Torna alla Homepage</a></button></span>

        <?php 
            //include('/chroot/home/S4842235/public_html/navbar.php');  ?>
            
            <form method="POST" action="addcinema.php" enctype="multipart/form-data" > <?php //l'attributo enctype serve per il caricamento file, specificca la codifica durante l'invio al server*/ ?>
            
            <p><input type="text" placeholder="Nome cinema" name="nome" required></p>

            <p><input type="url" placeholder="Link sito web" name="link"></p>
            <p><input type="text" id="citta" placeholder="Città" name="citta" required></p> 
            <p><input type="text" id="telefono" placeholder="Telefono" name="telefono"></p> 
            <p><input type="text" id="indirizzo" placeholder="Indirizzo" name="indirizzo" required></p> 
            
            <br>
            <input class="btn" type="submit" name="add" value="Aggiungi cinema">
            <input class="btn" type="reset"  value="Resetta il form">       
        </form>
    </body>
</html>