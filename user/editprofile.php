<?php
session_start();
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "phplogin";

    if ($_POST['gender']!="") {
        $gender=$_POST['gender'];
    } else {
        $gender=NULL;
    }
    if ($_POST['address1']!="") {
        $address1=$_POST['address1'];
    } else {
        $address1=NULL;
    }
    if ($_POST['address2']!="") {
        $address2=$_POST['address2'];
    } else {
        $address2=NULL;
    }
    if ($_POST['postcode']) {
        $postcode=$_POST['postcode'];
    } else {
        $postcode=NULL;
    }
    if ($_POST['city']!="") {
        $city=$_POST['city'];
    } else {
        $city=NULL;
    }
    if ($_POST['state']!="") {
        $state=$_POST['state'];
    } else {
        $state=NULL;
    }
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno().')' . mysqli_connect_error());
    } else {
        if ($stmt = $conn->prepare('UPDATE accounts SET nickname=?, email=?, gender=?, address1=?, address2=?, postcode=?, city=?, state=? WHERE id ='.$_SESSION['id'].'')) {
            $stmt->bind_param('ssssssss',$_POST['nickname'], $_POST['email'], $gender, $address1, $address2, $postcode, $city, $state);
            $stmt->execute();
            echo("<script LANGUAGE='JavaScript'>
								    window.alert('Succesfully updated your profile.');
								    window.location.href='profile.php';
								    </script>");
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            echo 'Could not prepare statement!';
        }
    }
            $conn->close();
