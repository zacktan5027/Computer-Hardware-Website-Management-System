<?php
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
     $username = $_POST['username'];
     $email = $_POST['email'];
     $nickname=$_POST['nickname'];
     $vkey = md5(time().$username);
     $verified = 0;
     $squestion=$_POST['squestion'];
     $sanswer=$_POST['sanswer'];

     $host = "localhost";
     $dbUsername = "root";
     $dbPassword = "";
     $dbname = "phplogin";


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
         if ($rnum ==0) {
             $stmt = $conn->prepare('SELECT username From accounts Where username = ?');
             $stmt->bind_param("s", $username);
             $stmt->execute();
             $stmt->bind_result($username);
             $stmt->store_result();
             $rnum2 = $stmt->num_rows;
             if ($rnum2==0) {
                 if ($stmt = $conn->prepare('INSERT INTO accounts (username, nickname, password, email, address1, address2, postcode, city, state, gender, verified, vkey,squestion, sanswer) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
                     // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
                     $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                     $stmt->bind_param('ssssssssssisis', $username, $nickname, $password, $email, $address1, $address2, $postcode, $city, $state, $gender, $verified, $vkey, $squestion, $sanswer);
                     $stmt->execute();
                     $stmt->close();
                     ini_set("smtp", "smtp.server.com");
                     $to = "$email";
                     $subject="Email Verification";
                     $message="<a href='http://localhost/New/verify.php?vkey=$vkey&email=$email'>Register your Account</a>";
                     $headers="From: zacktan5027@gmail.com";
                     $headers .="MIME-Version:1.0"."\r\n";
                     $headers .="Content-type:text/html;charset=UTF-8"."\r\n";

                     mail($to, $subject, $message, $headers);

                     echo("<script LANGUAGE='JavaScript'>
								    window.alert('Succesfully resgister, an email is sent to $email ,please verify your account.');
								    window.location.href='index.php';
								    </script>");
                 } else {
                     // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
                     echo 'Could not prepare statement!';
                 }
             } else {
                 echo("<script LANGUAGE='JavaScript'>
							window.alert('Username exist, please use another one.');
							window.location.href='registerindex.php';
							</script>");
             }
         } else {
             echo("<script LANGUAGE='JavaScript'>
					window.alert('Email exist, please use another one.');
					window.location.href='registerindex.php';
					</script>");
         }
     }
 ?>
