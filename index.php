<?php
date_default_timezone_set('America/Los_Angeles');
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>The C Shop</title>
		<link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .buttoncancel{
      background-color: white;
      color: black;
      width:50px;
      float:right;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
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
              <input type="password" name="password" placeholder="Password" id="password" maxlength="15" required>
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
    <body >
				 <div class="navbar">
					 <a href="index.php">Home</a>
					 <a href="category/index.php?category=laptops&name=Laptops">Laptops</a>
					 <a href="category/index.php?category=desktop&name=Desktop">Desktops</a>
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
          </div>


		<div class="content" align="center" style="width=100%">
      <div class="slideshow-container">
				<?php
                $host = "localhost";
                $dbUsername = "root";
                $dbPassword = "";
                $dbname = "phplogin";

                $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

                $sql = "SELECT * FROM slideshow";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo	"<div class='mySlides fade'>";
                        echo		"<img src='admin/slideshow/". $row["image"]."' style='width:70%;height'>";
                        echo    "</div>";
                    }
                }

                ?>
        <br>
        <?php $sql2="SELECT COUNT(id) as button from slideshow";
          $result2= mysqli_query($conn, $sql2);
          $i=0;
          $rows = mysqli_fetch_assoc($result2);
          $i=$rows['button'];
          for ($k=0;$k<$i;$k++) {
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
          setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
      </script>
    </div>
    <h2>Category</h2>
      <div style="display: grid;grid-template-columns: auto auto auto auto auto;padding: 10px;" >
          <div style="padding:20px">
             <a href="category/index.php?category=laptops&name=Laptops"><img class="zoom" style="width:200px" src="admin/icon/laptop.jpeg" /></a>
            <p>
              <strong>Laptop</strong>
            </p>
          </div>
          <div style="padding:20px">
            <a href="category/index.php?category=desktop&name=Desktop"><img class="zoom" style="width:200px" src="admin/icon/desktop.jpeg" /></a>
            <p>
              <strong>Desktop</strong>
            </p>
          </div>
          <div style="padding:20px">
            <a href="category/category.php?category=accessories&name=Accessories"><img class="zoom" style="width:200px" src="admin/icon/accesories.jpg" /></a>
            <p>
              <strong>Accesories</strong>
            </p>
          </div>
          <div style="padding:20px">
             <a href="category/index.php?category=printerandink&name=Printer%20and%20Ink"><img class="zoom" style="width:200px" src="admin/icon/printer.jpeg" /></a>
            <p>
              <strong>Printer and Ink</strong>
            </p>
          </div>
          <div style="padding:20px">
            <a href="category/category.php?category=pccomponent&name=PC%20Component"><img class="zoom" style="width:200px" src="admin/icon/pc component.jpeg" /></a>
            <p>
              <strong>PC Component</strong>
            </p>
          </div>
      </div>
  </div>
	</body>
</html>
