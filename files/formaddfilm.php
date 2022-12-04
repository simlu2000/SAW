<html>
    <head>Aggiungi nuovo film nel database!
        <style>
            p{ margin-top: 5px;}
            input:not(.btn){ width: 400px; height: 30px; }
            textarea{ width: 400px; height: 50px; }
            #durata,#vietato{ width: 150px; }
	        .shift{text-transform: capitalize;}
            a{text-decoration: none; color: black;}
            .btn{margin-left: 20px;}
            span{margin-left: 30px;}
        </style>

        <?php
            echo "<link rel='stylesheet' type='text/css' href='/chroot/home/S4842235/public_html/stile.css'>"; 
	        //echo "<link rel='stylesheet' type='text/css' href='/chroot/home/S4842235/public_html/stileNavFoot.css'>"; 
        ?>

    </head>

    <body>
        <span><button><a href="https://saw21.dibris.unige.it/~S4842235/homepage.php">Torna alla Homepage</a></button></span>

        <?php 
            //include('/chroot/home/S4842235/public_html/navbar.php'); ?>
            
            <form method="POST" action="addfilm.php" enctype="multipart/form-data" > <?php //l'attributo enctype serve per il caricamento file, specificca la codifica durante l'invio al server*/ ?>
            
            <p><input type="text" placeholder="Titolo film" name="titolo" required></p>

            <p><input type="url" placeholder="Link copertina" name="copertina" required></p>

            <p><input type="number" id="durata" min="80" placeholder="Durata(min)" name="durata" step="1" required></p> 
            <p><input type="text" placeholder="Regista" name="regista" id="shift" required></p>
            <p><textarea name="attori" placeholder="Inserisci gli attori..." id="shift" required></textarea></p>

            <p><input type="text" placeholder="Genere" id="shift" name="genere" required></p>     <!-- multiple serve ad inserire più generi -->
            
            <p><textarea name="trama" placeholder="Inserisci qui la trama del film..." required></textarea></p>	
            <p><input type="url" placeholder="Link trailer Youtube" name="trailer" required></p>
            <p><input type="text" placeholder="Paese" name="paese" id="shift" required></p>
            <p><input type="date" placeholder="Data (anno-mese-giorno)" name="data" required></p>
            
            <input class="btn" type="submit" name="add" value="Aggiungi film">
            <input class="btn" type="reset"  value="Resetta il form">       
        </form>
    </body>
</html>