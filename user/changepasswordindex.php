<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    echo("<script LANGUAGE='JavaScript'>
		window.alert('Please sign in first.');
		window.location.href='../index.php';
		</script>");
    exit();
}

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Change Password</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
    .container input[type=text], input[type=password], input[type=email], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }

    .container input[type=submit] {
    width: 60%;
    background-color: black;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }

    .container input[type=submit]:hover {
    background-color: white;
    color:black;
    }

    .container div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    }
  </style>
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>The C Shop</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i><?=$_SESSION['name']?></a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<body class="loggedin">
	     <nav class="navbar">
         <div class="navbar">
           <a href="home.php">Home</a>
           <a href="category/index.php?category=laptops&name=Laptops">Laptops</a>
           <a href="category/index.php?category=desktop&name=Desktop">Desktops</a>
           <div class="navbar">
             <div class="dropdown">
               <button class="dropbtn">Accessories
                 <i class="fa fa-caret-down"></i>
               </button>
               <div class="dropdown-content">
                 <a href="category/index.php?category=audio&name=Audio">Audio</a>
                 <a href="category/index.php?category=networking&name=Networking">Networking</a>
                 <a href="category/index.php?category=power&name=Power">Power</a>
                 <a href="category/index.php?category=storage&name=Storage">Storage</a>
                 <a href="category/index.php?category=bluetooth&name=Bluetooth">Bluetooth</a>
                 <a href="category/index.php?category=coolingpad&name=Cooling%20Pad">Cooling Pad</a>
                 <a href="category/index.php?category=keyboard&name=Keyboard">Keyboard</a>
                 <a href="category/index.php?category=keyboardandmousecombo&name=Keyboard%20and%20Mouse%20combo">Keyboard and Mouse combo</a>
                 <a href="category/index.php?category=mouse&name=Mouse">Mouse</a>
                 <a href="category/index.php?category=monitor&name=Monitor">Monitor</a>
               </div>
             </div>
           <a href="category/index.php?category=printerandink&name=Printer%20and%20Ink">Printer and Ink</a>
           <div class="navbar">
             <div class="dropdown">
               <button class="dropbtn">PC Component
                 <i class="fa fa-caret-down"></i>
               </button>
               <div class="dropdown-content">
                 <a href="category/index.php?category=casingfan&name=Casing%20Fan">Casing Fan</a>
                 <a href="category/index.php?category=cpuheatsink&name=CPU%20Heatsink">CPU Heatsink</a>
                 <a href="category/index.php?category=graphiccard&name=Graphic%20Card">Graphic Card</a>
                 <a href="category/index.php?category=internalharddrive&name=Internal%20Hard%20Drive">Internal Hard Drive</a>
                 <a href="category/index.php?category=motherboard&name=Motherboard">Motherboard</a>
                 <a href="category/index.php?category=powersupply&name=Power%20Supply">Power Supply</a>
                 <a href="category/index.php?category=processor&name=Processor">Processor</a>
                 <a href="category/index.php?category=ram&name=RAM">RAM</a>
                 <a href="category/index.php?category=solidstatedrive&name=Solid%20State%20Drive(SSD)">Solid State Drive(SSD)</a>
               </div>
             </div>
              <div class="search-container">
                <form action="searchproduct.php" method="post">
                  <input type="text" placeholder="Search.." name="search" maxlength="25" required>
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form>
              </div>
      </nav>
      <div class="content">
      	<h1 style="font-size:36px">Change Password</h1>
      <form action="changepassword.php" method="post" autocomplete="off">
          <div class="container">
            <div>
              <label for="password"><b>Password</b></label>
                <div>
                  <input type="password" name="password" placeholder="Password" id="password" required>
                </div>
              <label for="password2"><b>Confirm your password</b></label>
                <div>
                  <input type="password" name="password2" placeholder="Re-enter your password" id="password2" required>
                </div>
            </div>
            <div>
              <div align="center">
      			    <input type="submit" name="submit"value="Submit" />
               </div>
             </div>
      </form>
    </div>
	</div>
		</div>
	</body>
</html>
