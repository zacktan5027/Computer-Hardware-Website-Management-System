<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit();
}
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $description = $_GET['description'];
    $price = $_GET['price'];
    $discount = $_GET['discount'];
    $stock = $_GET['stock'];
} else {
    $name = null;
    $description = null;
    $price = null;
    $discount = null;
    $stock = null;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add Product</title>
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
      <h2>Add Product</h2><br />
      <form action="addproductProcess.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <label>Title:</label>
                <input style="display:block" name="name" required="" type="text" placeholder="Product name" value="<?php echo $name?>" maxlength="50">
                <label>Description:</label>
                <textarea  name="description" rows="10" cols="100" style="width:100%" placeholder="Description of the product" maxlength="1000"><?php echo $description ?></textarea>
                <label>Category:</label>
                <br /><br />
                <select style="width:100%;padding: 12px 20px;" name="category" required>
                <option value="">Please choose one</option>
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
                <option value="graphiccard">Graphic Card</option>
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
                <input style="display:block" title="Please input number only" pattern="\d*" max="99999" minlength="1" maxlength="5" name="price" type="text" placeholder="example: 123"value="<?php echo $price ?>">
                <label>Discount:</label>
                <input style="display:block" title="Please input number only" pattern="\d*" minlength="1" maxlength="3" max="100" name="discount" type="text"placeholder="example: 50"value="<?php echo $discount?>">
                <label>Stock:</label>
                <input style="display:block" title="Please input number only" pattern="\d*" minlength="1" maxlength="4" name="stock" type="text" placeholder="example: 123"value="<?php echo $stock?>">
                <label>Image: (image must smaller than 5MB)</label>
                <input type="file" name="image" style="width:100%"  />
                <input type="submit" name="upload" value="Submit" />
                <style>
                .reset {
                  width: 30%;
                  padding: 15px;
                  margin-top: 10px;
                  background-color: black;
                  border: 0;
                  cursor: pointer;
                  font-weight: bold;
                  color: white;
                  transition-duration: 0.4s;
                  box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
                  text-decoration: none;
                }

                .reset:hover {
                  background-color: white;
                  color: black;
                }
                </style>
                <a class="reset" href="addproduct.php">Reset</a>
      </form><br /><br />
		</div>
	</body>
</html>
