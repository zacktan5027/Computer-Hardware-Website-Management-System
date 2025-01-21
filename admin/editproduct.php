<?php
session_start();
if(isset($_GET['id'])){
$id=$_GET['id'];
}
if(isset($_GET['categoryname'])){
  $categoryname=$_GET['categoryname'];
}
if(isset($_GET['category'])){
  $category=$_GET['category'];
}
if(isset($_GET['search'])){
  $search=$_GET['search'];
}
   // If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: home.php');
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
$stmt = $con->prepare('SELECT name, description, category, price,discount, stock, image FROM product WHERE id=?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($name, $description, $category, $price,$discount, $stock, $image);
$stmt->fetch();
$stmt->close();
$_SESSION['image']=$image;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Edit product</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>The C Shop</h1>
				<a href="..\logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
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
        <?php
        if(isset($_GET['type'])){
        if($_GET['type']=="home"){
          echo "<a style='float:left' href='home.php?#$id'><i class='fas fa-arrow-circle-left'></i> Back</a>";
        } else if($_GET['type']=="category"){
            echo "<a style='float:left' href='category/index.php?category=$category&name=$categoryname#$id'><i class='fas fa-arrow-circle-left'></i> Back</a>";
        } else if($_GET['type']=="search"){
            echo "<a style='float:left' href='searchproduct.php?search=$search#$id'><i class='fas fa-arrow-circle-left'></i> Back</a>";
        }
      } else {
          echo "<a style='float:left' href='home.php'><i class='fas fa-arrow-circle-left'></i> Back</a>";
        }?>
        <a style="float:right" href="addproduct.php"><i class="fas fa-plus"></i> Add product</a>
        <a style="float:right" href="addadmin.php"><i class="fas fa-plus"></i> Add Staff</a>
        <a style="float:right" href="stafflist.php"><i class="fas fa-user"></i> Staff list</a>
        <a style="float:right" href="report.php"><i class="fas fa-newspaper"></i> Report</a>
        <a style="float:right" href="slideshow.php"><i class="fas fa-images"></i> Slide show</a>
        <a style="float:right" href="shipment.php"><i class="fas fa-dolly"></i> Shipment</a>
 </div><br /><br />
		<div class="content">
      <form action="editproductProcess.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <h2>Listing Detail</h2>
                <label>Product Name:</label>
                <input style="display:block" name="name" maxlength="50" required type="text" value="<?=$name?>" >
                <label>Description:</label>
                <textarea  name="description" maxlength="1000" rows="10" cols="100" style="width:100%" ><?php echo $description?></textarea>
                <label>Category:</label>
                <br /><br />
                <select name="category" required>
                <option value="<?=$category?>">Default</option>
                <option value="laptops">Laptops</option>
                <option value="desktop">Desktop</option>
                <option value="audio">Audio</option>
                <option value="networking">Networking</option>
                <option value="power">Power</option>
                <option value="storage">Storge</option>
                <option value="bluetooth">Bluetooth</option>
                <option value="coolingpad">Cooling Pad</option>
                <option value="keyboard">Keyboard</option>
                <option value="mouse">Mouse</option>
                <option value="keyboardandmousecombo">Keyboard and Mouse combo</option>
                <option value="mouse">Mouse</option>
                <option value="monitor">Monitor</option>
                <option value="casingfan">Casing Fan</option>
                <option value="cpuheatsink">CPU Heatsink</option>
                <option value="graphioccard">Graphic Card</option>
                <option value="internalharddrive">Internal Hard Drive</option>
                <option value="motherboard">Motherboard</option>
                <option value="powersupply">Power Supply</option>
                <option value="processor">Processor</option>
                <option value="ram">RAM</option>
                <option value="solidstatedrive">Solid State Drive(SSD)</option>
                <option value="printerandink">Printer&Ink</option>
                </select>
                <br /><br />
                <label>Price (RM):</label>
                <input style="display:block" pattern="\d*" max="99999" minlength="1" maxlength="5" name="price" required type="text" value="<?=$price?>">
                <label>Discount:</label>
                <input style="display:block" title="Please input number only" pattern="\d*" minlength="1" maxlength="3" max="100" name="discount" type="text" value="<?=$discount?>">
                <label>Stock:</label>
                <input style="display:block" pattern="\d*" minlength="1" maxlength="4" name="stock" required type="text" value="<?=$stock?>">
                <label>Image:</label>
                <input type="file" name="image" style="width:100%" value=<?=$stock?>>
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <input style="width:100%" type="submit" name="update" value="Update" />
      </form><br /><br />
		</div>
	</body>
</html>
