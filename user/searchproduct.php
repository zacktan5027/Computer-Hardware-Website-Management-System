<?php
session_start();
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "phplogin";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if(isset($_POST['search'])){
$search = $_POST['search'];
}
if(isset($_GET['search'])){
$search = $_GET['search'];
}
$sql = "SELECT * FROM product WHERE name LIKE '%". $search ."%' ORDER BY id";
$result = mysqli_query($conn, $sql);
 ?>
 <!DOCTYPE html>
 <html>
 	<head>
 		<meta charset="utf-8">
 		<title>Search Page</title>
 		<link href="style.css" rel="stylesheet" type="text/css">
 		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
    @media screen and (max-width: 900px) {
      .grid-container {
      display: grid;
      grid-template-columns: auto;
      padding: 10px;
      }
      .grid-item {
      padding: 20px;
      font-size: 30px;
      text-align: center;
      }
    }
    @media screen and (min-width: 900px)  and (max-width: 1300px) {
      .grid-container {
      display: grid;
      grid-template-columns: auto auto;
      padding: 10px;
      }
      .grid-item {
      padding: 20px;
      font-size: 30px;
      text-align: center;
      }
    }
    @media screen and (min-width: 1300px)  and (max-width: 1800px) {
      .grid-container {
      display: grid;
      grid-template-columns: auto auto auto;
      padding: 10px;
      }
      .grid-item {
      padding: 20px;
      font-size: 30px;
      text-align: center;
      }
    }
    @media screen and (min-width: 1800px) {
		.grid-container {
  	display: grid;
  	grid-template-columns: auto auto auto auto;
  	padding: 10px;
		}
		.grid-item {
  	padding: 20px;
  	font-size: 30px;
  	text-align: center;
    }
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
               <form action="searchproduct.php" method="post" autocomplete="off" >
                 <input type="text" placeholder="Search.." name="search" maxlength="25" required>
                 <button type="submit"><i class="fa fa-search"></i></button>
               </form>
             </div>
       </nav>
       <div class="function">
           <a style="float:right" href="order/orderlist.php"><i class="fas fa-shopping-cart"></i> My Cart</a>
           <a style="float:right" href="order/history.php"><i class="fas fa-history"></i> My purchase</a>
       </div>
       <br />
       <br />
       <div class="content">
         <h2>Showing result of "<?php echo $search ?>"</h2>
          <div class="grid-container">
            <?php
            $sql = "SELECT * FROM product WHERE name LIKE '%". $search ."%' ORDER BY id";
            $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_array($result)) {
                          if ($row['stock']>0) { ?>
            <div class="grid-item">
              <form method="post" action="order/productdetail.php?action=add&id=<?php echo $row["id"]; ?>&search=<?php echo $search; ?>&type=search">
                <div style="padding:16px" align="center">
                  <img style="width:200px;height:150px"src="../admin/images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

                  <h4 class="text-info"><?php echo $row["name"]; ?></h4>

                  <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

                  <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

                  <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

                  <input type="submit" style="margin-top:5px;" class="btn btn-success" value="Detail" />

                </div>
              </form>
          </div>
            <?php
          }
                  }
              } else {
                echo "0 result";
              }
            ?>
          </div>
       </div>
 	</body>
 </html>
