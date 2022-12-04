<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>newsletter</title>
</head>

<body>

  <?php
    session_start();

   if(!isset($_SESSION["email"]) || !isset($_SESSION["admin1"]) || !isset($_SESSION["admin2"])){
      echo "Non  sei un amministratore!";
      exit();
    }

    include 'connproj.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    $usersnews = "SELECT firstname,lastname,email FROM users WHERE newsletter=1 ";
    $result = mysqli_query($connection, $usersnews);
    while ($row = mysqli_fetch_object($result)){
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->Mailer = "smtp";

      $mail->SMTPDebug = 2;
      $mail->SMTPAuth   = true;
      $mail->SMTPSecure = "tls";
      $mail->Port       = 587;
      $mail->Host       = "smtp.gmail.com";
      //$mail->Host       = 'tls://smtp.gmail.com:587';

      /*$mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        ); */

      include 'ciakmovaccount.php';

      $ciakmov="ciakmov@gmail.com";

      $mail->IsHTML(true); //informazioni per risposta
      $mail->addAddress($row->email);
      $mail->setFrom($ciakmov);
      $mail->addReplyTo($ciakmov);
      $mail->Subject = $_POST['subject'];
      $mail->Body = $_POST['message'];

      

      if(!$mail->send()){
        echo "<h1>Mailer Error: " . $mail->ErrorInfo . "</h1>\n"; //errore invio email
        header("Refresh:3; url=formnewsletter.php");
        exit();
      }
    }
    echo "<h1>E-mail inviata correttamente a tutti gli utenti!</h1>\n";
    mysqli_close($connection);
  ?>

</body>
</html>
