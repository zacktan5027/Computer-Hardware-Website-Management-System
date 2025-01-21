<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();

if (mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My purchase</title>
		<link href="../style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<style>
    .grid-container {
  	display: grid;
  	grid-template-columns: auto auto auto auto auto;
  	padding: 10px;
		}
		.grid-item {
  	padding: 30px;
  	font-size: 30px;
  	text-align: center;
		}
</style>
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>The C Shop</h1>
				<a href="../profile.php"><i class="fas fa-user-circle"></i><?=$_SESSION['name']?></a>
				<a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<body class="loggedin">
	     <nav class="navbar">
         <div class="navbar">
           <a href="../home.php">Home</a>
           <a href="../category/index.php?category=laptops&name=Laptops">Laptops</a>
           <a href="../category/index.php?category=desktop&name=Desktop">Desktops</a>
           <div class="navbar">
             <div class="dropdown">
               <button class="dropbtn">Accessories
                 <i class="fa fa-caret-down"></i>
               </button>
               <div class="dropdown-content">
                 <a href="../category/index.php?category=audio&name=Audio">Audio</a>
                 <a href="../category/index.php?category=networking&name=Networking">Networking</a>
                 <a href="../category/index.php?category=power&name=Power">Power</a>
                 <a href="../category/index.php?category=storage&name=Storage">Storage</a>
                 <a href="../category/index.php?category=bluetooth&name=Bluetooth">Bluetooth</a>
                 <a href="../category/index.php?category=coolingpad&name=Cooling%20Pad">Cooling Pad</a>
                 <a href="../category/index.php?category=keyboard&name=Keyboard">Keyboard</a>
                 <a href="../category/index.php?category=keyboardandmousecombo&name=Keyboard%20and%20Mouse%20combo">Keyboard and Mouse combo</a>
                 <a href="../category/index.php?category=mouse&name=Mouse">Mouse</a>
                 <a href="../category/index.php?category=monitor&name=Monitor">Monitor</a>
               </div>
             </div>
           <a href="../category/index.php?category=printerandink&name=Printer%20and%20Ink">Printer and Ink</a>
           <div class="navbar">
             <div class="dropdown">
               <button class="dropbtn">PC Component
                 <i class="fa fa-caret-down"></i>
               </button>
               <div class="dropdown-content">
                 <a href="../category/index.php?category=casingfan&name=Casing%20Fan">Casing Fan</a>
                 <a href="../category/index.php?category=cpuheatsink&name=CPU%20Heatsink">CPU Heatsink</a>
                 <a href="../category/index.php?category=graphiccard&name=Graphic%20Card">Graphic Card</a>
                 <a href="../category/index.php?category=internalharddrive&name=Internal%20Hard%20Drive">Internal Hard Drive</a>
                 <a href="../category/index.php?category=motherboard&name=Motherboard">Motherboard</a>
                 <a href="../category/index.php?category=powersupply&name=Power%20Supply">Power Supply</a>
                 <a href="../category/index.php?category=processor&name=Processor">Processor</a>
                 <a href="../category/index.php?category=ram&name=RAM">RAM</a>
                 <a href="../category/index.php?category=solidstatedrive&name=Solid%20State%20Drive(SSD)">Solid State Drive(SSD)</a>
               </div>
             </div>
             <div class="search-container">
               <form action="../searchproduct.php" method="post">
                 <input type="text" placeholder="Search.." name="search" maxlength="25" required>
                 <button type="submit"><i class="fa fa-search"></i></button>
               </form>
             </div>
      </nav>
      <div class="function">
          <a style="float:right" href="orderlist.php"><i class="fas fa-shopping-cart"></i> My Cart</a>
          <a style="float:right" href="history.php"><i class="fas fa-history"></i> My purchase</a>
        </div>
        <div class="content">
                <h2>My purchase</h2>
        </div>

      <div style="  margin: auto;width:90%">
        <div class="content"><br /><br />
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

           $name=$_SESSION['name'];
           $sql = "SELECT * FROM purchase WHERE username = '$name' GROUP BY orderno ASC";
           $result = mysqli_query($conn, $sql);

           if (mysqli_num_rows($result) > 0) {
               echo "<table class='table-all hoverable' style='width:100%' border='1' cellpadding='10'";
               echo "<thread>";
               echo "<th>No.</th>";
               echo "<th>Orderno</th>";
               echo "<th>Time Purchase</th>";
               echo "<th>Paid</th>";
               echo "<th>Status</th>";
               echo "<th>Tracking Number</th>";
               echo "<th>Action</th>";
               echo "<th>Action</th>";
               echo "<th>Action</th>";
               echo "</thread>";
               $count=1;
               while ($row = mysqli_fetch_assoc($result)) {
                   $orderno=$row['orderno'];
                   $paid=number_format($row['paid'], 2);
                   echo "<tr>";
                   echo "<td >" . $count++ . "</td>";
                   echo "<td >" . $orderno . "</td>";
                   echo "<td >" . $row['timepurchase'] . "</td>";
                   echo "<td >RM " . $paid . "</td>";
                   echo "<td >" . $row['status'] . "</td>";
                   echo "<td >" . $row['tnumber'] . "</td>";
                   if($row['status']=="Wait to be shipped" || $row['status']=="Delivered"){
                        echo "<td ></td>";
                   } else {
                     echo "<script language='JavaScript'>
                           function validate()
                           {
                            conf = confirm('Are you sure you have deliver the parcel?');
                            if (conf)
                               return true
                            else
                               return false;
                           }
                           </script>";
                     echo "<td style='width:80px;height:50px;'><a onclick='return validate();' style='padding:1px 5px'href='deliver.php?orderno=$orderno'>Deliver</a></td>";
                   }
                   echo "<td style='width:80px;height:50px;'><a style='padding:1px 5px'href='invoice.php?orderno=$orderno&type=view'>View</a></td>";
                   echo "<td style='width:80px;height:50px'><a style='padding:1px 5px'href='invoice.php?orderno=$orderno&type=download'>Download</a></td>";
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
