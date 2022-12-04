<?php
    //FILE PAGINA RISERVATA DI UTENTE + MODIFICA DATI UTENTE
?>

<!DOCTYPE html>
    <html lang="eng">

<head>
    <title>Profile</title>
    <!-- IMMAGINE FAVICON -->
    <link rel="icon" type="image/x-icon" href="./media/logo/logo_min.png"/>
        <?php
            echo "<link rel='stylesheet' type='text/css' href='stileprofilo.css'>"; 
            echo "<link rel='stylesheet' type='text/css' href='stileNavFoot.css'>"; 


            echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
            echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
            echo "<link href='https://fonts.googleapis.com/css2?family=DM+Sans:wght@500&display=swap' rel='stylesheet'>";
            ?>

</head>
<body>

<?php
     
    include('navbar.php');

    if (isset($_SESSION['email']))
    {  
            $useremail=$_SESSION['email'];
?>            
            <div  id="profiletitle">
                <h2 id="tip">Inserisci i nuovi dati</h2>
            </div>

            <hr id="profileline">

                <div id="boxshow">
                    <form action="update_profile.php" method="POST" name="update">
                        <?php    include_once("files/connproj.php");  ?> 
                        <table>
                            <tr>
                                <th height="42" scope="row">Nome</th>
                                <td><input type="text" name="firstname" id="firstname" value="<?= $_SESSION['firstname'] ?>"  class="form-control" /></td>
                            </tr>

                            <tr>
                                <th height="42" scope="row">Cognome</th>
                                <td><input type="text" name="lastname" id="lastname" value="<?= $_SESSION['lastname'] ?>"  class="form-control" /></td>
                            </tr>

                            <tr>
                                <th height="42" scope="row">Email</th>
                                <td><input type="text" name="email" id="email" value="<?= $_SESSION['email'] ?>"  class="form-control" disabled/></td>
                            </tr>

                            <tr>
                                <th height="42" scope="row">Password</th>
                                <td><input type="text" name="pass" id="pass" value="*****"  class="form-control" disabled/></td>
                            </tr>

                            <tr>
                                <th height="42" scope="row">Città</th>
                                <?php 
                                    if(isset($_SESSION['city'])){ ?>                                
                                        <td><input type="text" name="city" id="city" value="<?= $_SESSION['city'] ?>"  class="form-control" /></td>
                                <?php }else{?> 
                                        <td><input type="text" name="city" id="city" value=""  class="form-control" /></td>
                                <?php } ?>

                            </tr>

                            <tr>
                                <th height="42" scope="row">Genere preferito</th>
                                <td>

                                <select id="kindoffilm" name="kindoffilm">
                                    <option value="<?= $_SESSION['kindoffilm'] ?>"><?= $_SESSION['kindoffilm'] ?></option>
                                    <option value=""> --- </option>
                                        <option value="Animazione"> Animazione</option>
                                        <option value="Avventura"> Avventura</option>
                                        <option value="Azione"> Azione</option>
                                        <option value="Biografico"> Biografico</option>
                                        <option value="Commedia"> Commedia</option>
                                        <option value="Documentario"> Documentario</option>
                                        <option value="Drammatico"> Drammatico</option>
                                        <option value="Fantascienza"> Fantascienza</option>
                                        <option value="Fantasy"> Fantasy</option>
                                        <option value="Horror"> Horror</option>
                                        <option value="Musical"> Musical</option>
                                        <option value="Romantico"> Romantico</option>
                                        <option value="Storico"> Storico</option>
                                        <option value="Thriller"> Thriller</option>
                                    </select>
                                </td>
                            </tr>

                        </table>
                        <input type="submit" value="Salva" id="save" name="submit" />
                    </form>
                </div>
<?php  }  ?>
    
</body>    
</html>