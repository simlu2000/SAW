<!-- FILE NAVBAR DINAMICA -->

<!DOCTYPE html>
<html>
<head>

   
</head>
<body>

 <?php
    $admin1 = "ellefabbri00@gmail.com";
    $admin2 = "simone.lutero00@gmail.com";
    
    session_start();
    if (isset($_SESSION['email'])){ 
          
        $email = $_SESSION['email'];
        if($email == $admin1 || $email == $admin2) //se acccount amministratori
        {
            //MESSE PER AVERLE IN FORMNEWSLETTER.PHP
            $_SESSION['admin1']=$admin1;
            $_SESSION['admin2']=$admin2;

            ?>
            <div class="navbar" id="nb">
                <a href="homepage.php" id="logonb"><span class="logonavbar"></span></a>
                <ul class="nav">
                    
                    <li><a href="files/formnewsletter.php">NEWSLETTER</a></li> 
                    <li><a href="files/formaddfilm.php">AGGIUNGI FILM</a></li> 
                    <li><a href="files/formaddcinema.php">AGGIUNGI CINEMA</a></li> 
                    <li><a href="filmspage.php">CERCA FILM</a></li>
                    <li><a href="about.php">CHI SIAMO</a></li> 
                    <li><a href="show_profile.php">PROFILO</a></li> 
                    <li><a href="logout.php">ESCI</a></li>

                </ul>

                <div class="hamburger" onclick="toggleMobileMenu(this)" id="nb">  <!--onclick per attivarlo-->
                    <div class="bar" id="bar1"></div>
                    <div class="bar" id="bar2"></div>
                    <div class="bar" id="bar3"></div>
                    <ul class="mobile-menu">
                        <li><a href="files/formnewsletter.php">NEWSLETTER</a></li> 
                        <li><a href="files/formaddfilm.php">AGGIUNGI FILM</a></li> 
                        <li><a href="files/formaddcinema.php">AGGIUNGI CINEMA</a></li> 
                        <li><a href="filmspage.php">CERCA FILM</a></li>
                        <li><a href="about.php">CHI SIAMO</a></li> 
                        <li><a href="show_profile.php">PROFILO</a></li> 
                        <li><a href="logout.php">ESCI</a></li>
                    </ul>
                </div>
            </div>

            <?php
        } else //altrimenti se utente generico

        {
            ?>
            <div class="navbar" id="nb">
                <a href="homepage.php" id="logonb"><span class="logonavbar"></span></a>
                <ul class="nav">
                    <li><a href="filmspage.php">CERCA FILM</a></li>
                    <li><a href="about.php">CHI SIAMO</a></li> 
                    <li><a href="show_profile.php">PROFILO</a></li> 
                    <li><a href="logout.php">ESCI</a></li>

                </ul>

                <div class="hamburger" onclick="toggleMobileMenu(this)" id="nb">  <!--onclick per attivarlo-->
                    <div class="bar" id="bar1"></div>
                    <div class="bar" id="bar2"></div>
                    <div class="bar" id="bar3"></div>
                    <ul class="mobile-menu">
                        <li><a href="filmspage.php">CERCA FILM</a></li>
                        <li><a href="about.php">CHI SIAMO</a></li> 
                        <li><a href="show_profile.php">PROFILO</a></li> 
                        <li><a href="logout.php">ESCI</a></li>
                    </ul>
                </div>
            </div>
        
        <?php
        } 
    }
    else  //altrimenti se non ha effettuato accesso
    { ?>


        <div class="navbar" id="nb">
            <a href="homepage.php" id="logonb"><span class="logonavbar"></span></a>
            <ul class="nav">
                <li><a href="filmspage.php">CERCA FILM</a></li>
                <li><a href="about.php">CHI SIAMO</a></li> 
                <li><a href="formlogin.php" id="login">ACCEDI</a></li>

            </ul>

            <div class="hamburger" onclick="toggleMobileMenu(this)" id="nb">  <!--onclick per attivarlo-->
                <div class="bar" id="bar1"></div>
                <div class="bar" id="bar2"></div>
                <div class="bar" id="bar3"></div>
                <ul class="mobile-menu">
                    <li><a href="formlogin.php" id="login">ACCEDI</a></li>
                    <li><a href="about.php">CHI SIAMO</a></li> 
                    <li><a href="filmspage.php">CERCA FILM</a></li>
                </ul>
            </div>
            
        </div>

    <?php
    } 
    ?>
    
    
</body>
<script>  
/* apertura tendina dal tasto hamburger */
    function toggleMobileMenu(menu) {
        menu.classList.toggle('open');
    }

        
</script>
</html>
