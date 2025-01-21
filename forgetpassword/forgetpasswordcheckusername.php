<?php
session_start();
$username = $_POST['username'];
$email = $_POST['email'];
$_SESSION['username'] = $username;
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "phplogin";

    # Create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno().')' . mysqli_connect_error());
    } else {
        $stmt = $conn->prepare('SELECT email From accounts Where email = ?');
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if ($rnum !=0) {
            $stmt = $conn->prepare('SELECT username From accounts Where username = ?');
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($username);
            $stmt->store_result();
            $rnum2 = $stmt->num_rows;
            if ($rnum2!=0) {
                echo("<script LANGUAGE='JavaScript'>
								    window.alert('Succesfully found, please sign in to your account.');
								    window.location.href='securityquestion.php';
								    </script>");
            } else {
                echo("<script LANGUAGE='JavaScript'>
							window.alert('Username not exist, please use another one.');
							window.location.href='forgetpasswordindex.php';
							</script>");
            }
        } else {
            echo("<script LANGUAGE='JavaScript'>
					window.alert('Email not exist, please use another one.');
					window.location.href='forgetpasswordindex.php';
					</script>");
        }
        $stmt->close();
        $conn->close();
    }
