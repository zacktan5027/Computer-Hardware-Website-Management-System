<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();

if (mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$con=mysqli_connect("localhost", "root", "", "phplogin");
$stmt = $con->prepare('SELECT orderno FROM purchase ORDER BY orderno DESC LIMIT 1');
$stmt->execute();
$stmt->bind_result($orderno);
$stmt->fetch();
$stmt->close();
$orderno = $orderno + 1;
$_SESSION['orderno']=$orderno;
date_default_timezone_set('Asia/Kuala_Lumpur');
$date = date('y-m-d h:i:s a', time());
$total = 0;
$name = $_SESSION['name'];
if (!empty($_SESSION['shopping_cart'])) {
    foreach ($_SESSION['shopping_cart'] as $keys => $values) {
        $total = $total + ($values['item_quantity'] * $values['item_price']);
      if($stmt = $con->prepare("SELECT address FROM accounts WHERE username = ?")){
        $stmt->bind_param('s',$name);
        $stmt->execute();
        $stmt->bind_result($address);
        $stmt->fetch();
        $stmt->close();
        if($address!=null){
        if ($stmt = $con->prepare('INSERT INTO `purchase`(`orderno`, `username`, `productid`, `quantity`, `timepurchase`, `paid`) VALUES (?,?,?,?,?,?)')) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $stmt->bind_param('ssssss', $orderno, $name, $values["item_id"], $values["item_quantity"], $date, $total);
            $stmt->execute();
            $stmt->close();
            $stmt = $con->prepare('SELECT sold FROM product WHERE id=?');
            $stmt->bind_param('i',$values["item_id"]);
            // In this case we can use the account ID to get the account info.
            $stmt->execute();
            $stmt->bind_result($sold);
            $stmt->fetch();
            $stmt->close();
            $sold+=$values["item_quantity"];
            $stmt = $con->prepare('UPDATE `product` SET `sold`=? WHERE id=?');
            $stmt->bind_param('ii',$sold,$values["item_id"]);
            $stmt->execute();
            $stmt->close();
            $stmt = $con->prepare('SELECT stock FROM product WHERE id=?');
            $stmt->bind_param('i',$values["item_id"]);
            // In this case we can use the account ID to get the account info.
            $stmt->execute();
            $stmt->bind_result($stock);
            $stmt->fetch();
            $stmt->close();
            $stock-=$values["item_quantity"];
            $stmt = $con->prepare('UPDATE `product` SET `stock`=? WHERE id=?');
            $stmt->bind_param('ii',$stock,$values["item_id"]);
            $stmt->execute();
            $stmt->close();
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            echo 'Could not prepare statement!';
        }
    } else {
      echo("<script LANGUAGE='JavaScript'>
      window.alert('Please update your location first');
      window.location.href='orderlist.php';
      </script>");
    }
    echo("<script LANGUAGE='JavaScript'>
    window.location.href='report.php';
    </script>");
}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Payment</title>
		<link href="../style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
               <form action="../searchproduct.php" method="post">
                 <input type="text" placeholder="Search.." name="search" maxlength="25" required>
                 <button type="submit"><i class="fa fa-search"></i></button>
               </form>
             </div>
      </nav>
      <div class="function">
          <a style="float:right" href="orderlist.php"><i class="fas fa-shopping-cart"></i> My Cart</a>
          <a style="float:right" href="history.php"><i class="fas fa-history"></i> My purchase</a>
        </div><br /><br />
        <div class="row">
          <div class="content">
  <div class="col-75">
    <div class="container">
      <form action="completeorder.php">
        <div class="row">
          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" placeholder="John More Doe" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum"  placeholder="1111-2222-3333-4444" required>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" placeholder="September" required>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" placeholder="2018" required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="password" id="cvv" placeholder="cvv number" required>
              </div>
            </div>
          </div>

        </div>
        <input style="width:30%" type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>

</div>
	</body>
</html>

<?php
} else {
  echo("<script LANGUAGE='JavaScript'>
  window.alert('You have not choose any product yet.');
  window.location.href='orderlist.php';
  </script>");
}
?>
