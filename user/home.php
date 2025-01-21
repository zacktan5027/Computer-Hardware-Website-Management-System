<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "phplogin");
if (!isset($_SESSION['loggedin'])) {
    echo("<script LANGUAGE='JavaScript'>
		window.alert('Please sign in first.');
		window.location.href='../index.php';
		</script>");
    exit();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
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
  #myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
		</style>
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1 style="font-size:36px">The C Shop</h1>
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
              <form action="searchproduct.php" method="post">
                <input type="text" placeholder="Search.." name="search" maxlength="25" required>
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
      </nav>
      <div class="function">
          <a class="notification" style="float:right" href="order/orderlist.php"><i class="fas fa-shopping-cart"></i> My cart</a>
          <a style="float:right" href="order/history.php"><i class="fas fa-history"></i> My purchase</a>
      </div>
      <div class="function">
      <a style="float:left"><i class="fas fa-dollar-sign"></i> Price sort by</a>
      <a style="float:left"href="home.php?filter=high">high <i class="fas fa-caret-up"></i></a>
      <a style="float:left" href="home.php?filter=low">low <i class="fas fa-caret-down"></i></a>
      <a style="float:left"href="home.php?filter=">reset <i class="fas fa-redo-alt"></i></a>
    </div>
    <br />
    <br />
			<div class="content" align="center" style="width=100%">
        <div class="slideshow-container">
          <h2>Recently Added</h2>
          <?php
                  $host = "localhost";
                  $dbUsername = "root";
                  $dbPassword = "";
                  $dbname = "phplogin";

                  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

                  $sql = "SELECT * FROM product ORDER BY id DESC LIMIT 10";
                  $result = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                          $id=$row['id'];
                          $image=$row['image'];
                          $name=$row['name'];
                          echo	"<div class='mySlides fade'>";
                          echo	"<a href='order/productdetail.php?action=add&id=$id&type=home'><img src='../admin/images/$image' style='width:400px;height:300px'></a>";
                          echo  "<p>$name</p>";
                          echo  "</div>";
                      }
                  }
                  ?>
          <br>
          <?php
            for ($k=0;$k<10;$k++) {
                echo "<span class='dot'></span>";
            }

            ?>

          <script>
          var slideIndex = 0;
          showSlides();

          function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 4000); // Change image every 2 seconds
          }
        </script>
      </div>
				<div class="grid-container">
				<?php
        if (isset($_GET['filter'])) {
            if ($_GET['filter']=="high") {
                $query = "SELECT * FROM product ORDER BY price DESC";
            } elseif ($_GET['filter']=="low") {
                $query = "SELECT * FROM product ORDER BY price ASC";
            } else {
                $query = "SELECT * FROM product ORDER BY id ASC";
            }
        } else {
            $query = "SELECT * FROM product ORDER BY id ASC";
        }
            $result = mysqli_query($connect, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                  if ($row['stock']>0) { ?>
				<div class="grid-item">
					<form method="post" action="order/productdetail.php?action=add&id=<?php echo $row["id"]; ?>&type=home">
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
        <?php }
            }
            }
        ?>
				</div>
			</div>
        <button style="width:100px"onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
		</div>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
	</body>
</html>
