<?php

require 'test_login.php';
require 'test_register.php';
require 'test_show.php';
require 'test_update.php';
require 'utils.php';

/****************************************/
/* replace $baseurl with your directory */
/****************************************/

// local URL
//$baseurl =  'http://localhost/html/progetto'; 

// remote URL
$baseurl =  'https://saw21.dibris.unige.it/~S842235/';
 

echo "[+] Testing Registration - Login - Show Profile<br>";

echo "[*] Generating random user<br>";

echo "---\n";
$email = generate_random_email();
$pass = generate_random_password();
$first_name = generate_random_name();
$last_name = generate_random_name();
echo "Email: $email\n";
echo "Pass: $pass\n";
echo "First name: $first_name\n";
echo "Last name: $last_name\n";
echo "---<br>";

echo "[-] Calling registration.php<br>";

register($email, $pass, $first_name, $last_name, $baseurl);

echo "[-] Calling login.php<br>";
login($email, $pass, $baseurl);


echo "[-] Calling show_profile.php<br>";

echo check_correct_user($email, $first_name, $last_name, show_logged_user($baseurl))
    ? "[*] Success!\n"
    : "[*] Failed\n";

echo "------------------------\n";

echo "[+] Testing Update - Show Profile<br>";

echo "[*] Generating new random user<br>";
$first_name = generate_random_name();
$last_name = generate_random_name();

echo "---\n";
echo "Email: $email\n";
echo "First name: $first_name\n";
echo "Last name: $last_name\n";
echo "---\n";

echo "[-] Calling update_profile.php<br>";
update($email, $first_name, $last_name, $baseurl);

echo "[-] Calling show_profile.php<br>";

echo check_correct_user($email, $first_name, $last_name, show_logged_user($baseurl))
    ? "[*] Success!\n"
    : "[*] Failed\n";


echo "------------------------\n";
