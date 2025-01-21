<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "phplogin");

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="orderlist.php"</script>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cart</title>
		<link href="../style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
    <style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
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
				<h2>My Cart</h2>
			</div>
			<div class="function">
			<a style="float:right"onclick='return validate1();' href="clearcart.php">Clear list <i class="fas fa-redo-alt"></i></a>
			<a style="float:right"href="payment.php">Check out <i class="fas fa-hand-holding-usd"></i> </a>
		</div>
		<div class="content">
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
					<table class='table-all hoverable' style='width:100%' border='1' cellpadding='10'>
					<thread>
					<th>Item Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Total</th>
					<th>Action</th>
					</thread>
        <?php
        if (!empty($_SESSION["shopping_cart"])) {
            $total = 0;
            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                $quantity=$values['item_quantity'];
                $price=$values['item_price']; ?>
				<script language='JavaScript'>

							function validate()
							{
								conf = confirm('Are you sure you want to remove?');
								if (conf)
									 return true
								else
									 return false;
							}

				</script>
				<script language='JavaScript'>

							function validate1()
							{
								conf = confirm('Are you sure you want to clear the cart?');
								if (conf)
									 return true
								else
									 return false;
							}

				</script>
        <tr>
          <td><?php echo $values["item_name"]; ?></td>
          <td><?php echo $values["item_quantity"]; ?></td>
          <td>RM <?php echo number_format($values["item_price"], 2) ?></td>
          <td>RM <?php echo number_format((float)$quantity * (float)$price, 2); ?></td>
          <td><a style="text-decoration:none;background-color:none;"onclick='return validate();' href="orderlist.php?action=delete&id=<?php echo $values["item_id"]; ?>">Remove</a></td>
        </tr>
        <?php

        $total+=((float)$quantity*(float)$price);
            } ?>
        <tr>
          <td colspan="3" align="right"><strong>Total</strong></td>
          <td align="right">RM <?php echo number_format($total, 2); ?></td>
          <td></td>
        </tr>
        <?php
        }
        ?>

      </table>
		</div>
	</body>
</html>
