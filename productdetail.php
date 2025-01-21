<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "phplogin");

$id = $_GET['id'];
$location=$_GET['location'];
if(isset($_GET['categoryname'])){
$categoryname=$_GET['categoryname'];
}
if(isset($_GET['search'])){
  $search=$_GET['search'];
}
if (isset($_POST["add_to_cart"])) {
    if (!isset($_SESSION['loggedin'])) {
      if($_GET['location']=="category"){
        echo("<script LANGUAGE='JavaScript'>
      window.alert('Please sign in first.');
      window.location.href='productdetail.php?action=add&id=$id&categoryname=$categoryname&location=$location';
      </script>");
    } else if($_GET['location']=="search"){
      echo("<script LANGUAGE='JavaScript'>
    window.alert('Please sign in first.');
    window.location.href='productdetail.php?action=add&id=$id&search=$search&location=$location';
    </script>");
      }

        exit();
    }
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'			=>	$_GET["id"],
                'item_name'			=>	$_POST["hidden_name"],
                'item_price'		=>	$_POST["hidden_price"],
                'item_quantity'		=>	$_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
            echo '<script>window.location="../home.php"</script>';
        } else {
            echo '<script>alert("Item Already Added")</script>';
        }
    } else {
        $item_array = array(
            'item_id'			=>	$_GET["id"],
            'item_name'			=>	$_POST["hidden_name"],
            'item_price'		=>	$_POST["hidden_price"],
            'item_quantity'		=>	$_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
        echo '<script>window.location="../home.php"</script>';
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Product Detail</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
    @media screen and (max-width: 900px) {
      .grid-container {
        display: grid;
        grid-gap: 10px;
        background-color: #2196F3;
        padding: 10px;
      }

      .grid-item {
        background-color: rgba(255, 255, 255, 0.8);
        text-align: center;
        padding: 20px;
        font-size: 30px;
      }

      .item1 {
        grid-column: 1;
        grid-row: 1;
      }

      .item2 {
        grid-column:1;
        grid-row: 2 ;
      }

      .item3 {
        grid-column:1;
        grid-row: 3;
      }

       .item4 {
        grid-column :1 ;
        grid-row: 4;
        }
      .item5 {
        grid-column: 1;
        grid-row: 5;
      }
    }
      @media screen and (min-width: 900px) {
    .grid-container {
      display: grid;
      grid-gap: 10px;
      background-color: #2196F3;
      padding: 10px;
    }

    .grid-item {
      background-color: rgba(255, 255, 255, 0.8);
      text-align: center;
      padding: 20px;
      font-size: 30px;
    }

    .item1 {
      grid-column: 1;
      grid-row: 1 / span 4;
    }

    .item2 {
      grid-column: 2 / span 3;
      grid-row: 1 ;
    }

    .item3 {
      grid-column: 2 / span 3;
      grid-row: 2 / span 2;
    }

     .item4 {
      grid-column :2 ;
      grid-row: 4;
      }
    .item5 {
      grid-column: 3;
      grid-row: 4;
    }
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
    <form class="modal-content animate" action="authenticate.php" method="post">
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
            Do not have a account? <a href="registerindex.php">Sign up now</a>
          </p>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <p><a href="forgetpassword\forgetpasswordindex.php">Forgot your password?</a></p>
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
					 <a href="index.php">Home</a>
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
		</div>
    <?php
    $query = "SELECT * FROM product WHERE id = $id";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);

    ?>
      <div class="function">
        <?php if($_GET['location']=="category"){
          $category=$row['category'];
        echo  "<a style='float:left' href='category/index.php?name=$categoryname&category=$category#$id'><i class='fas fa-arrow-circle-left'></i> Back</a>";
      } else if($_GET['location']=="search"){
        echo  "<a style='float:left' href='searchproduct.php?search=$search#$id'><i class='fas fa-arrow-circle-left'></i> Back</a>";
        } ?>
      </div><br /><br />
    <?php } ?>
			<div class="content">
        <div class="grid-container">
          <?php
            $query = "SELECT * FROM product WHERE id = $id";
            $result = mysqli_query($connect, $query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result)
              ?>
          <div class="grid-item item1" style="padding-top:30px">
                <img style="margin:auto;width:500px;height:400px"src="admin/images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />
          </div>
              <div class="grid-item item2"  style="height:150px">
                <?php
                if ($row['discount']>0){
                  $name=$row['name'];
                  $discount=$row['discount'];
                    echo "<h2 class='text-info'>$name <strong style='color:red'>*** Discount:$discount %</strong></h2>";
                } else {
                  $name=$row['name'];
                    echo"	<h2 class='text-info'>$name</h2>";
                } ?>

                <h6>Stock remaining: <?php echo $row['stock']; ?></h6>
              </div>
              <div class="grid-item item3" style="height:200px">
                <h4 class="text-danger"> <?php echo $row["description"]; ?></h4>
              </div>
              <div class="grid-item item4"  style="height:110px">
                <?php
                if ($row['discount']>0) {
                    $oprice=$row['price'];
                    $oprice1=number_format($oprice, 2);
                    $price=$row["price"]*(1-$row['discount']/100);
                    $price1=number_format($price, 2);
                    echo "<h4 class='text-danger'>RM<strike>$oprice1</strike> <strong style='color:red'>RM$price1</strong></h4>";
                } else {
                    $price=$row['price'];
                    $price1=number_format($price, 2);
                    echo"	<h4 class='text-danger'>RM $price1</h4>";
                } ?>
              </div>

              <style>
              .grid-item .item5 .item6 form[type=submit]{{
                width: 30%;
                padding: 15px;
                margin-top: 10px;
                background-color: black;
                border: 0;
                cursor: pointer;
                font-weight: bold;
                color: white;
                transition: background-color 0.4s;
                box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
              }

              .addtocartform:hover {
                background-color: white;
                color: black;
              }
              </style>
              <div class="grid-item item5" style="height:110px">
                <?php
                if($_GET['location']=="category"){
                echo "<form method='post' action='productdetail.php?id=$id&categoryname=$categoryname&location=$location'>";
              } else if($_GET['location']=="search"){
                echo  "<form method='post' action='productdetail.php?id=$id&search=$search&location=$location'>";
                }
                ?>
                  <label>Quantity:</label>
                  <input style="width:100px" type="number" name="quantity" value="1" min="1" max="100" maxlength="3" oninput="maxLengthCheck(this)" class="form-control" />
                  <script>
                  function maxLengthCheck(object)
                    {
                      if (object.value.length > object.maxLength)
                      object.value = object.value.slice(0, object.maxLength)
                    }
                  </script>
                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
              <?php	if ($row['discount']>0) {
                    $price=$row["price"]*(1-$row['discount']/100);
                    echo "<input type='hidden' name='hidden_price' value=$price />";
                } else {
                    $price=$row['price'];
                    echo "<input type='hidden' name='hidden_price' value=$price />";
                } ?>
                <input type="submit" name="add_to_cart" style="width:150px;" class="btn btn-success" value="Add to Cart" />
                    </form>
                </div>
                        <div class="grid-item item6" style="height:110px">
                          <?php
                          if($_GET['location']=="category"){
                          echo "<form method='post' action='feedback.php?id=$id&categoryname=$categoryname&location=$location'>";
                        } else if($_GET['location']=="search"){
                          echo  "<form method='post' action='feedback.php?id=$id&search=$search&location=$location'>";
                          }
                          ?>
                                <input type="submit" name="feedback"  style="width:150px;" class="btn btn-success" value="Feedback" />
                          </form>
                        </div>
          <?php
            }
                ?>
        </div>
					<br />
				</div>
<div class="content">
  <h2>Feedback</h2>
    <div>
  <?php

  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbname = "phplogin";

  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

  $sql = "SELECT * FROM feedback where productid=$id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <h2><?php echo $row['username']; ?>  <span>Rating: <?php echo $row['rating']?> star</span></h2>
            <p>
              <?php
              if($row['description']=="") {
                echo "No Comment";
              }
              else {
                echo $row['description'];
              }
              ?>
            </p>

          <?php
      }
  } else {
      echo "No feedback";
  }
   ?>
 </div>
</div>


	</body>
</html>
