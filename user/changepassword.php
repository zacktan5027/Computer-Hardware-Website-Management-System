<?php
session_start();
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "phplogin";
    # Create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno().')' . mysqli_connect_error());
    } else {
        if ($stmt = $conn->prepare('UPDATE accounts SET password=? WHERE id ='.$_SESSION['id'].'')) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('s', $password);
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
    }
            $conn->close();
