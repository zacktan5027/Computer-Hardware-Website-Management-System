<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "phplogin");
if(isset($_GET['category'])){
$category=$_GET['category'];
}
if(isset($_GET['categoryname'])){
$categoryname=$_GET['categoryname'];
}
if(isset($_GET['search'])){
$search=$_GET['search'];
}
$id = $_GET['id'];
if (isset($_POST["quantity"])) {
    $query = "SELECT * FROM product WHERE id = $id";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($_POST['quantity']>$row['stock']) {
            echo '<script>alert("Too much is added")</script>';
        } else {
            if (isset($_POST["add_to_cart"])) {
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
                      $count1=0;
                          foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                            $count1++;
                            if($values['item_id']==$id)
                            {
                              $con=mysqli_connect("localhost", "root", "", "phplogin");
                              $stmt = $con->prepare("SELECT stock FROM product WHERE id = ?");
                                $stmt->bind_param('s',$_GET['id']);
                                $stmt->execute();
                                $stmt->bind_result($stock);
                                $stmt->fetch();
                                $stmt->close();
                              $nquantity=$values['item_quantity']+$_POST['quantity'];
                              if($nquantity>$stock){
                                echo '<script>alert("Too many is added")</script>';
                                echo '<script>window.location="../home.php"</script>';
                              } else {
                                $item_array = array(
                                  'item_id'			=>	$_GET["id"],
                                  'item_name'			=>	$_POST["hidden_name"],
                                  'item_price'		=>	$_POST["hidden_price"],
                                  'item_quantity'		=>	$nquantity
                                );
                                $_SESSION["shopping_cart"][$count1-1] = $item_array;
                                  echo '<script>window.location="../home.php"</script>';
                              }
                            }
                          }
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
        }
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Product Detail</title>
		<link href="../style.css" rel="stylesheet" type="text/css">
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
</style>
	</head>
  <script>
  function alphanumeric(inputtxt)
{
var letters = /^[0-9a-zA-Z]+$/;
if(inputtxt.value.match(letters))
{
alert('Your registration number have accepted : you can try another');
document.form1.text1.focus();
return true;
}
else
{
alert('Please input alphanumeric characters only');
return false;
}
}
</script>
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
        <?php if($_GET['type']=="home"){
          echo "<a style='float:left' href='../home.php#$id'><i class='fas fa-arrow-circle-left'></i> Back</a>";
        } else if($_GET['type']=="category"){
            echo "<a style='float:left' href='../category/index.php?category=$category&name=$categoryname#$id'><i class='fas fa-arrow-circle-left'></i> Back</a>";
        } else if($_GET['type']=="search"){
          echo "<a style='float:left' href='../searchproduct.php?search=$search'><i class='fas fa-arrow-circle-left'></i> Back</a>";
        }?>

      </div>
      <div class="function">
          <a style="float:right" href="orderlist.php"><i class="fas fa-shopping-cart"></i> My Cart</a>
          <a style="float:right" href="history.php"><i class="fas fa-history"></i> My purchase</a>
        </div>
        <br /><br />
      <div class="content">
        <div class="grid-container">
          <?php
            $query = "SELECT * FROM product WHERE id = $id";
            $result = mysqli_query($connect, $query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result)
              ?>
          <div class="grid-item item1" style="padding-top:30px">
                <img style="margin:auto;width:500px;height:400px"src="../../admin/images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />
          </div>
              <div class="grid-item item2"  style="height:150px">
                <?php
                if ($row['discount']>0) {
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


              <div class="grid-item item5" style="height:110px">
                <form method="post" action="productdetail.php?id=<?php echo $row["id"]; ?>">
                  <label>Quantity:</label>
                <input style="width:100px" type="number" name="quantity" value="1" min="1" max="<?php echo $row['stock']?>" maxlength="3" oninput="maxLengthCheck(this)" class="form-control" />
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

                <input type="submit" name="add_to_cart" style="width:150px;" class="btn btn-success" onclick="alphanumeric(document.form1.text1)" value="Add to Cart" />
                    </form>
                </div>
                        <div class="grid-item item6" style="height:110px">
                          <?php if($_GET['type']=="home"){
                            echo "<form method='post' action='../feedbackindex.php?id=$id&type=home'>";
                          } else if($_GET['type']=="category"){
                              echo "<form method='post' action='../feedbackindex.php?id=$id&category=$category&categoryname=$categoryname&type=category'>";
                          } else if($_GET['type']=="search"){
                            echo "<form method='post' action='../feedbackindex.php?id=$id&search=$search&type=search'>";
                          }?>

                                <input type="submit" name="feedback"  style="width:150px;" class="btn btn-success" value="Feedback" />
                          </form>
                        </div>
          <?php
            }
                ?>
        </div>

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
      </div>

		</div>
		</div>
	</body>
</html>
