<?php
session_start();
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "phplogin";
    $id=$_POST['id'];
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno().')' . mysqli_connect_error());
    } else {
      $stmt = $conn->prepare('SELECT email From staff Where email = ?');
      $stmt->bind_param("s", $_POST['email']);
      $stmt->execute();
      $stmt->bind_result($email);
      $stmt->store_result();
      $rnum = $stmt->num_rows;
      if ($rnum ==0) {
        if ($stmt = $conn->prepare('UPDATE staff SET username=?, email=?, password=? WHERE id ='.$id.'')) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss',$_POST['username'], $_POST['email'], $password);
            $stmt->execute();
            echo("<script LANGUAGE='JavaScript'>
								    window.alert('Succesfully updated staff detail.');
								    window.location.href='stafflist.php';
								    </script>");
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            echo 'Could not prepare statement!';
        }
    } else {
      echo("<script LANGUAGE='JavaScript'>
    window.alert('Email exist, please use another one.');
    window.location.href='editstaffindex.php?id=$id';
    </script>");
    }
        $conn->close();
  }

?>
