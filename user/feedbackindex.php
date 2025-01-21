<?php
session_start();
$id=$_GET['id'];
  if (!isset($_SESSION['loggedin'])) {
    echo("<script LANGUAGE='JavaScript'>
    window.alert('You need to log in first.');
    window.location.href='../productdetail.php?id=$id&type=$type';
    </script>");
  }
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "phplogin";
$type=$_GET['type'];
if(isset($_GET['category'])){
$category=$_GET['category'];
}
if(isset($_GET['categoryname'])){
$categoryname=$_GET['categoryname'];
}
if(isset($_GET['search'])){
$search=$_GET['search'];
}
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

$sql = "SELECT * FROM purchase natural join purchased WHERE productid=$id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
$sql = "SELECT * FROM feedback WHERE productid=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($row['username']==$_SESSION['name']){
    echo("<script LANGUAGE='JavaScript'>
    window.alert('You already gave your feedback.');
    window.location.href='order/productdetail.php?id=$id&type=$type';
    </script>");
}
}
else{
  if($_GET['type']=="home"){
   echo("<script LANGUAGE='JavaScript'>
   window.alert('You are not allow to give feedback to this product. You need to buy this product in order to give your feedback.');
   window.location.href='order/productdetail.php?id=$id'&type=home';
   </script>");
 } else if($_GET['type']=="category"){
     echo("<script LANGUAGE='JavaScript'>
     window.alert('You are not allow to give feedback to this product. You need to buy this product in order to give your feedback.');
    window.location.href='order/productdetail.php?id=$id&category=$category&categoryname=$categoryname&type=category';
     </script>");
 } else if($_GET['type']=="search"){
   echo("<script LANGUAGE='JavaScript'>
   window.alert('You are not allow to give feedback to this product. You need to buy this product in order to give your feedback.');
   window.location.href='order/productdetail.php?id=$id&search=$search&type=search';
   </script>");
 }

}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <title>Customer Feedback</title>
   <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
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
 background-color: #4CAF50;
 color: white;
 padding: 14px 20px;
 margin: 8px 0;
 border: none;
 border-radius: 4px;
 cursor: pointer;
 }

 .container input[type=submit]:hover {
 background-color: #45a049;
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
           <div class="function">
               <a style="float:right" href="order/orderlist.php"><i class="fas fa-shopping-cart"></i> My Cart</a>
               <a style="float:right" href="order/history.php"><i class="fas fa-history"></i> My purchase</a>
             <?php if($_GET['type']=="home"){
               echo "<a style='float:left' href='order/productdetail.php?id=$id&type=home#$id'><i class='fas fa-arrow-circle-left'></i> Back</a>";
             } else if($_GET['type']=="category"){
                 echo "<a style='float:left' href='order/productdetail.php?id=$id&category=$category&categoryname=$categoryname&type=category#$id'><i class='fas fa-arrow-circle-left'></i> Back</a>";
             } else if($_GET['type']=="search"){
               echo "<a style='float:left' href='order/productdetail.php?id=$id&search=$search&type=search'><i class='fas fa-arrow-circle-left'></i> Back</a>";
             }?>
             <br /><br />
           </div>
   <div class="content">
     <h2>Feedback</h2>
     <div>
  <form method="post" action="feedback.php">
<br />
  <label>Rating:</label>
   1<input name="rating" type="radio" value="1" />
   2<input name="rating" type="radio" value="2" />
   3<input name="rating" type="radio" value="3" />
   4<input name="rating" type="radio" value="4" />
   5<input name="rating" type="radio" value="5" />
  <br />
  <br />
   <label>Feedback:</label>
     <textarea  name="feedback" rows=10 style="width:100%"></textarea>
   <input type="hidden" name="id" value="<?php echo $id; ?>" />
   <input type="submit" value="vote" name="vote" /></p>
    </div>
 </div>
 </body>
 </html>
