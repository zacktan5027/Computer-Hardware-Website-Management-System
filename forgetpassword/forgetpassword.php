<?php
session_start();
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "phplogin";
    # Create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    $password=$_POST['password'];
    $password2=$_POST['password2'];
    $username = $_SESSION['username'];
    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno().')' . mysqli_connect_error());
    } else {
      if($password==$password2)
      {
        if ($stmt = $conn->prepare("UPDATE accounts SET password=? WHERE username ='$username'")) {
            $password3 = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('s', $password3);
            $stmt->execute();
            echo("<script LANGUAGE='JavaScript'>
          window.alert('Succesfully change, please sign in to your account.');
          window.location.href='../index.php';
          </script>");
          session_destroy();
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            echo 'Could not prepare statement!';
        }
      } else {
        echo("<script LANGUAGE='JavaScript'>
      window.alert('Both of the password entered must be the same.');
      window.location.href='forgetpasswordindex2.php';
      </script>");
      }
    }
            $conn->close();
