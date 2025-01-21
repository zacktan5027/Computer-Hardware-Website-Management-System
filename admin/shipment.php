<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)}
  to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
  from {transform: scale(0)}
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
#myBtn {
display: none;
position: fixed;
bottom: 20px;
right: 30px;
z-index: 99;
font-size: 18px;
border: none;
outline: none;
background-color: red;
color: white;
cursor: pointer;
padding: 15px;
border-radius: 4px;
transition-duration: 0.4s;
}

#myBtn:hover {
background-color: #555;
}
</style>
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>The C Shop</h1>
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
              <form action="searchproduct.php" method="post" autocomplete="off" >
                <input type="text" placeholder="Search.." name="search" maxlength="25" required>
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
      </nav>
      <div class="function">
        <a style="float:right" href="addproduct.php"><i class="fas fa-plus"></i> Add product</a>
        <a style="float:right" href="addadmin.php"><i class="fas fa-plus"></i> Add Staff</a>
        <a style="float:right" href="stafflist.php"><i class="fas fa-user"></i> Staff list</a>
        <a style="float:right" href="report.php"><i class="fas fa-newspaper"></i> Report</a>
        <a style="float:right" href="slideshow.php"><i class="fas fa-images"></i> Slide show</a>
        <a style="float:right" href="shipment.php"><i class="fas fa-dolly"></i> Shipment</a>
 </div><br /><br />
		<div class="content">
      <h2>To ship</h2>
      <div>
        <style>
        .table-all{
          border-collapse: collapse;
          border-color:#ccc
        }
        .table-all tr:nth-child(odd){
          background-color:#fff;
        }
        .table-all tr:nth-child(even)
        {background-color:#f1f1f1
        }
        .hoverable tbody tr:hover,.ul.hoverable li:hover{
          background-color:#ccc
        }
        .centered tr th,.centered tr td{
          text-align:center
        }
        .table td,.table th,.table-all td,.table-all th{
          padding:8px 8px;display:table-cell;text-align:left;vertical-align:top
        }
        .table th:first-child,.table td:first-child,.table-all th:first-child,.table-all td:first-child{
          padding-left:16px
        }
        .hoverable tbody tr:hover,.ul.hoverable li:hover{
          background-color:#ccc
          }.centered tr th,.centered tr td{
            text-align:center
          }
        </style>
      <?php

      $host = "localhost";
      $dbUsername = "root";
      $dbPassword = "";
      $dbname = "phplogin";

      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
      $status="Wait to be shipped";
      $name=$_SESSION['name'];
      $sql = "SELECT * FROM purchase WHERE status = '$status' GROUP BY orderno ASC";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
          echo "<table class='table-all hoverable' style='width:100%' border='1' cellpadding='10'";
          echo "<thread>";
          echo "<th>No.</th>";
          echo "<th>Orderno</th>";
          echo "<th>Location</th>";
          echo "<th>Time Purchase</th>";
          echo "<th>Paid</th>";
          echo "<th>Status</th>";
          echo "<th>Action</th>";
          echo "</thread>";
          $count=1;
          while ($row = mysqli_fetch_assoc($result)) {
            $username=$row['username'];
            $sql1 = "SELECT address1, address2, postcode, city, state FROM accounts WHERE username = '$username'";
            $result1 = mysqli_query($conn, $sql1);
            $row1=mysqli_fetch_assoc($result1);
              $orderno=$row['orderno'];
              $paid=number_format($row['paid'], 2);
              echo "<tr>";
              echo "<td >" . $count++ . "</td>";
              echo "<td >" . $orderno . "</td>";
              echo "<td >" . $row1['address1'] .",". $row1['address2'] .",". $row1['postcode'] .",". $row1['city'] .",". $row1['state']. "</td>";
              echo "<td >" . $row['timepurchase'] . "</td>";
              echo "<td >RM " . $paid . "</td>";
              echo "<td >" . $row['status'] . "</td>";
              echo "<td style='width:80px;height:50px;'><a style='padding:1px 5px'href='shipout.php?orderno=$orderno'>Ship</a></td>";
              echo "</tr>";
          }
          echo "</table>";
      } else {
          echo " 0 results";
      }
       ?>
     </div>
</div>
	</body>
</html>
