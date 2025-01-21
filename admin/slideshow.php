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
		<title>Slide Show</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
      <h2>Slide Show</h2>
      <div>
        <form action="slideshowProcess.php" method="post" autocomplete="off" enctype="multipart/form-data">
          <label>Image:</label>
          <input type="file" name="image" style="width:100%" required>
          <input type="submit" name="upload" style="width:100%" value="Submit" />
        </form>
      </div>
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

      $sql = "SELECT * FROM slideshow";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
          echo "<table class='table-all hoverable' style='width:100%' border='1' cellpadding='10'";
          echo "<thread>";
          echo "<th>id</th>";
          echo "<th>name</th>";
          echo "<th>Delete</th>";
          echo "<thread>";
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td style='width:100px'>" . $row['id'] . "</td>";
              echo "<td style='width:200px;' ><img width='300' height='150' src='slideshow/". $row["image"]."'</td>";
              echo "<script language='JavaScript'>

                    function validate()
                    {
	                    conf = confirm('Are you sure you want to delete?');
	                    if (conf)
		                     return true
	                    else
		                     return false;
                    }

                    </script>";

              echo "<td style='width:100px;padding: 12px 20px'><a style='width:100px;padding: 10px 20px' onclick='return validate();'  href='deleteslideshow.php?id=" . $row['id'] . "&image=".$row['image']."')>Delete</a></td>";
              echo "</tr>";
          }
          echo "</table>";
      } else {
          echo "0 results";
      }
       ?>

     </div>
		</div>
	</body>
</html>
