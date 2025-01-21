<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $nickname = $_POST['nickname'];
    $type = "staff";
if($_POST['reset']){
  echo("<script LANGUAGE='JavaScript'>
  window.location.href='addadmin.php';
  </script>");
} else {
if (!empty($username) || !empty($email)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "phplogin";

    # Create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno().')' . mysqli_connect_error());
    } else {
        $stmt = $conn->prepare('SELECT email From staff Where email = ?');
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if ($rnum ==0) {
            $stmt = $conn->prepare('SELECT username From staff Where username = ?');
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($username);
            $stmt->store_result();
            $rnum2 = $stmt->num_rows;
            if ($rnum2==0) {
                if ($stmt = $conn->prepare('INSERT INTO staff (username, nickname, password, email) VALUES (?, ?, ?, ?)')) {
                    // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $stmt->bind_param('ssss', $username, $nickname, $password, $email);
                    $stmt->execute();
                    echo("<script LANGUAGE='JavaScript'>
								    window.alert('Succesfully added.');
								    window.location.href='addadmin.php';
								    </script>");
                } else {
                    // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
                    echo 'Could not prepare statement!';
                }
            } else {
                echo("<script LANGUAGE='JavaScript'>
							window.alert('Username exist, please use another one.');
							window.location.href='addadmin.php';
							</script>");
            }
        } else {
            echo("<script LANGUAGE='JavaScript'>
					window.alert('Email exist, please use another one.');
					window.location.href='addadmin.php';
					</script>");
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "All field are required";
    die();
}
}
?>
