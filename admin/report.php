<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit();
}
$year=date('Y', time());
settype($year, "integer");
$month=date('m', time());
settype($month, "integer");
$maxmonth=$year."-".$month;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Report</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
      <h2>Report</h2>
      <div>
        <form action="dailyreport.php">
          <input type="hidden" name="type" value="table" />
         <input style="width:100%" type="submit" value="Daily Report"/>
       </form>
        <form method="post" action="datereport.php?type=table">
         <input id="myDate" name="date" required="" type="date">
         <input onclick="dateFunction()" style="width:100%" type="submit" value="Date Report"/>
         <script>
         function dateFunction() {
           var today = new Date();
           var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
           var x = document.getElementById("myDate").max = date;
         }
       </script>
        </form>
        <form method="post" action="monthlyreport.php?type=table">
         <input id="myMonth"style="display:block" name="month" required type="month" max="<?php echo $maxmonth ?>" >
         <input onclick="monthFunction()" style="width:100%" type="submit" value="Monthly Report"/>
         <script>
         function monthFunction() {
           var today = new Date();
           var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-';
           var x = document.getElementById("myMonth").max = date;
         }
       </script>
        </form>
        <form method="post" action="yearlyreport.php?type=table">
         <input style="display:block" name="year" required type="number" oninput="maxLengthCheck(this)" maxlength="4" min="2000" max="<?php echo $year ?>" >
         <script>
         function maxLengthCheck(object)
           {
             if (object.value.length > object.maxLength)
             object.value = object.value.slice(0, object.maxLength)
           }
         </script>
         <input style="width:100%" type="submit" value="Yearly Report"/>
        </form>
      </div>
		</div>
	</body>
</html>
