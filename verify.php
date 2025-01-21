<?php

$email = $_GET['email'];
$vkey = $_GET['vkey'];

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

$query = "SELECT * FROM accounts WHERE email like '%". $email ."%' ";
$result = mysqli_query($con, $query);
if ($result) {
    $query= "UPDATE `accounts` SET `verified`= 1 WHERE email like '%". $email ."%' ";
    $result = mysqli_query($con, $query);
    if ($result) {
          header("Location: verified.php?status=1");
    }
} else {
      header("Location: verified.php?status=0");
}
