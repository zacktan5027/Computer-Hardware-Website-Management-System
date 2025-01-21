<?php
session_start();
$category=$_GET['category'];
$categoryname=$_GET['name'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?=$categoryname ?></title>
		<link href="../style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto ;
  padding: 10px;
}
.grid-item {
  padding: 20px;
  font-size: 30px;
  text-align: center;
}
.content .grid-container .grid-item form input[type='submit'] {
  background-color:black;
  color: white;
}
.content .grid-container .grid-item form input[type='submit']:hover {
  background-color: white;
  color: black;
}

.function a {
  width: 150px;
  padding: 15px;
  background-color: #f3f4f7;
  border: 0;
  cursor: pointer;
  font-weight: bold;
  color: black;
  transition-duration: 0.4s;
  text-decoration: none;
  text-align: center;
}
.function a:hover {
  background-color: black;
  color:white;
}
</style>
	</head>
	<body class="loggedin">
		<div id="id01" class="modal">
		  <form class="modal-content animate" action="../authenticate.php" method="post">
		    <div class="container">
		      <button style="float:right"type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn"><i class="fa fa-times"></i></button>
		      <h1 style="font-size:30px">Login</h1>
		      <br />
		      <div>
		        <label for="username"><b>Username</b></label>
		          <div>
		            <input type="text" name="username" placeholder="Username" id="username" maxlength="15" required>
		          </div>
		      </div>
		          <div>
		            <label for="password"><b>Password</b></label>
		            <div>
		              <input type="password" name="password" placeholder="Password" id="password" maxlength="10" required>
		            </div>
		          </div>
		            <div align="center">
		              <input type="submit" name="login_user" value="Login" />
		            </div>
		          <p>
		            Do not have a account? <a href="../registerindex.php">Sign up now</a>
		          </p>
		    </div>

		    <div class="container" style="background-color:#f1f1f1">
		      <p><a href="../forgetpassword/forgetpasswordindex.php">Forgot your password?</a></p>
		    </div>
		  </form>
		</div>
    		<nav class="navtop">
    			<div>
    				<h1 title="The C Shop" style="font-size:36px">The C Shop</h1>
    				<button class="button" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
          </div>
        </nav>
		<body class="loggedin">
	     <nav class="navbar">
          <div class="navbar">
            <a href="../index.php">Home</a>
            <a href="index.php?category=laptops&name=Laptops">Laptops</a>
            <a href="index.php?category=desktop&name=Desktop">Desktops</a>
            <div class="navbar">
              <div class="dropdown">
                <button class="dropbtn">Accessories
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="index.php?category=audio&name=Audio">Audio</a>
                  <a href="index.php?category=networking&name=Networking">Networking</a>
                  <a href="index.php?category=power&name=Power">Power</a>
                  <a href="index.php?category=storage&name=Storage">Storage</a>
                  <a href="index.php?category=bluetooth&name=Bluetooth">Bluetooth</a>
                  <a href="index.php?category=coolingpad&name=Cooling%20Pad">Cooling Pad</a>
                  <a href="index.php?category=keyboard&name=Keyboard">Keyboard</a>
                  <a href="index.php?category=keyboardandmousecombo&name=Keyboard%20and%20Mouse%20combo">Keyboard and Mouse combo</a>
                  <a href="index.php?category=mouse&name=Mouse">Mouse</a>
                  <a href="index.php?category=monitor&name=Monitor">Monitor</a>
                </div>
              </div>
            <a href="index.php?category=printerandink&name=Printer%20and%20Ink">Printer and Ink</a>
            <div class="navbar">
              <div class="dropdown">
                <button class="dropbtn">PC Component
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="index.php?category=casingfan&name=Casing%20Fan">Casing Fan</a>
                  <a href="index.php?category=cpuheatsink&name=CPU%20Heatsink">CPU Heatsink</a>
                  <a href="index.php?category=graphiccard&name=Graphic%20Card">Graphic Card</a>
                  <a href="index.php?category=internalharddrive&name=Internal%20Hard%20Drive">Internal Hard Drive</a>
                  <a href="index.php?category=motherboard&name=Motherboard">Motherboard</a>
                  <a href="index.php?category=powersupply&name=Power%20Supply">Power Supply</a>
                  <a href="index.php?category=processor&name=Processor">Processor</a>
                  <a href="index.php?category=ram&name=RAM">RAM</a>
                  <a href="index.php?category=solidstatedrive&name=Solid%20State%20Drive(SSD)">Solid State Drive(SSD)</a>
                </div>
              </div>
							<div class="search-container">
	              <form action="../searchproduct.php" method="post" autocomplete="off" >
	                <input type="text" placeholder="Search.." name="search" maxlength="25" required>
	                <button type="submit"><i class="fa fa-search"></i></button>
	              </form>
	            </div>
      </nav>
			<div class="function">
			<a style="float:left"><i class="fas fa-dollar-sign"></i> Price sort by</a>
			<a style="float:left"href="index.php?filter=high&category=<?php echo $category?>&name=<?php echo $categoryname?>">high <i class="fas fa-caret-up"></i></a>
			<a style="float:left" href="index.php?filter=low&category=<?php echo $category?>&name=<?php echo $categoryname?>">low <i class="fas fa-caret-down"></i></a>
			<a style="float:left"href="index.php?filter=&category=<?php echo $category?>&name=<?php echo $categoryname?>">reset <i class="fas fa-redo-alt"></i></a>
		</div><br /><br />
		<div class="content">
			<h2><?php echo $categoryname?></h2>

      <?php
      $host = "localhost";
      $dbUsername = "root";
      $dbPassword = "";
      $dbname = "phplogin";
      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
       ?>
          <div class="grid-container">
            <?php
						if (isset($_GET['filter'])) {
								if ($_GET['filter']=="high") {
										$query = "SELECT * FROM product WHERE category='$category'ORDER BY price DESC";
								} else if ($_GET['filter']=="low") {
										$query = "SELECT * FROM product WHERE category='$category'ORDER BY price ASC";
								} else {
										$query = "SELECT * FROM product WHERE category='$category' ORDER BY id ASC";
								}
						} else {
								$query = "SELECT * FROM product WHERE category='$category'ORDER BY id ASC";
						}
              $result = mysqli_query($conn, $query);
              if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_array($result)) {
										  if ($row['stock']>0) { ?>
											<div class="grid-item">
												<form method="post" action="../productdetail.php?location=category&action=add&id=<?php echo $row["id"]; ?>&category=<?php echo $category?>&categoryname=<?php echo $categoryname?>">
													<div style="padding:16px" align="center">
							              <?php
							              $id=$row['id'];
							              if ($row['discount']>0) {
							                  $name=$row['name'];
							                  $discount=$row['discount'];
							                  echo "<h4 id=$id class='text-info'>$name <strong style='color:red'>Discount $discount%</strong></h4>";
							              } else {
							                  $name=$row['name'];
							                  echo "<h4 id=$id class='text-info'>$name</h4>";
							              } ?>
														<img style="width:300px;height:250px"src="../admin/images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />
							              <?php
							              if ($row['discount']>0) {
							                  $oprice=$row['price'];
							                  $oprice1=number_format($oprice, 2);
							                  $price=$row["price"]*(1-$row['discount']/100);
							                  $price1=number_format($price, 2);
							                  echo "<h4 class='text-danger'>RM<strike>$oprice1</strike> <strong style='color:red'>RM $price1 </strong></h4>";
							              } else {
							                  $price=$row['price'];
							                  $price1=number_format($price, 2);
							                  echo"	<h4 class='text-danger'>RM $price1</h4>";
							              } ?>
														<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
														<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
														<input type="submit" name="detail"  class="btn btn-success" value="Detail" />
													</div>
												</form>
										</div>
            <?php
					}
				}
              } else {
                  echo "0 results";
              }
              ?>

		</div>
	</body>
</html>
