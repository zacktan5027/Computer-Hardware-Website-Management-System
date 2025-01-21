<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../../index.php');
    exit();
}
  $orderno=$_GET['orderno'];
  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbname = "phplogin";
  $status="Delivered";
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  if (mysqli_connect_error()) {
      die('Connect Error(' . mysqli_connect_errno().')' . mysqli_connect_error());
  } else {
      if ($stmt = $conn->prepare('UPDATE purchase SET status=? WHERE orderno ='.$orderno.'')) {
          $stmt->bind_param('s',$status);
          $stmt->execute();
          echo("<script LANGUAGE='JavaScript'>
                  window.alert('Succesfully updated the delivery status.');
                  window.location.href='history.php';
                  </script>");
      } else {
          // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
          echo 'Could not prepare statement!';
      }
  }
  $conn->close();
?>
