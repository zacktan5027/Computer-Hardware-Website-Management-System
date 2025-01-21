<?php
session_start();
$username= $_SESSION['name'];
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "phplogin";
    # Create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno().')' . mysqli_connect_error());
    } else {
      if ($stmt = $conn->prepare('SELECT squestion,sanswer FROM accounts WHERE username = ?')) {
          // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
          $stmt->bind_param('s', $username);
          $stmt->execute();
          $stmt->bind_result($squestion,$sanswer);
          $stmt->fetch();
          // Store the result so we can check if the account exists in the database.
          $stmt->store_result();
      }
      if($squestion==$_POST['squestion']&&$sanswer==$_POST['sanswer']){
        echo("<script LANGUAGE='JavaScript'>
      window.alert('Succesfully answer.');
      window.location.href='changepasswordindex.php';
      </script>");
      }
      else {
        echo("<script LANGUAGE='JavaScript'>
      window.alert('Failed to answer.');
      window.location.href='securityquestion.php';
      </script>");
      }
    }



?>
