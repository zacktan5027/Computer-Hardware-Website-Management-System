<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$category=$_GET['category'];
$name=$_GET['name'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?=$name ?></title>
		<link href="../style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto auto;
  padding: 10px;
}
.grid-item {
  padding: 20px;
  font-size: 30px;
  text-align: center;
}
.content .grid-container .grid-item form input[type='submit'] {
  background-color:black;
  color: white;
}
.content .grid-container .grid-item form input[type='submit']:hover {
  background-color: white;
  color: black;
}
</style>
	</head>
	<body class="loggedin">
		<div id="id01" class="modal">
		  <form class="modal-content animate" action="../authenticate.php" method="post">
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
		            Do not have a account? <a href="../registerindex.php">Sign up now</a>
		          </p>
		    </div>

		    <div class="container" style="background-color:#f1f1f1">
		      <p><a href="../forgetpassword/forgetpasswordindex.php">Forgot your password?</a></p>
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
           <a href="../index.php">Home</a>
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
               <form action="../searchproduct.php" method="post" autocomplete="off" >
                 <input type="text" placeholder="Search.." name="search" maxlength="25" required>
                 <button type="submit"><i class="fa fa-search"></i></button>
               </form>
             </div>
      </nav>
		<div class="content" align="center">
      <?php
      if ($category=="Accessories") {
          ?>
          <div style="display:grid;grid-template-columns: auto auto auto auto auto;padding:10px">
              <div style="padding:20px">
                <a href="index.php?category=audio&name=Audio"><img class="zoom" style="width:200px" src="../admin/icon/audio.jpeg" /></a>
                <p>
                  Audio
                </p>
              </div>
              <div style="padding:20px">
                <a href="index.php?category=networking&name=Networking"><img class="zoom" style="width:200px" src="../admin/icon/networking.jpeg" /></a>
                <p>
                  Networking
                </p>
              </div>
              <div style="padding:20px">
                <a href="index.php?category=power&name=Power"><img class="zoom" style="width:200px" src="../admin/icon/power.jpeg" /></a>
                <p>
                  Power
                </p>
              </div>
              <div style="padding:20px">
                <a href="index.php?category=storage&name=Storage"><img class="zoom" style="width:200px" src="../admin/icon/storage.jpeg" /></a>
                <p>
                  Storage
                </p>
              </div>
              <div style="padding:20px">
                <a href="index.php?category=bluetooth&name=Bluetooth"><img class="zoom" style="width:200px" src="../admin/icon/bluetooth.jpeg" /></a>
                <p>
                  Bluetooth
                </p>
              </div>
              <div style="padding:20px">
                  <a href="index.php?category=coolingpad&name=Cooling%20Pad"><img class="zoom"  style="width:200px" src="../admin/icon/cooling pad.jpeg" /></a>
                <p>
                  Cooling Pad
                </p>
              </div>
              <div style="padding:20px">
                <a href="index.php?category=keyboard&name=Keyboard"><img class="zoom" style="width:200px" src="../admin/icon/keyboard.jpeg" /></a>
                <p>
                  Keyboard
                </p>
              </div>
              <div style="padding:20px">
                <a href="index.php?category=keyboardandmousecombo&name=Keyboard%20and%20Mouse%20combo"><img class="zoom" style="width:200px" src="../admin/icon/mouse&keyboard.jpeg" /></a>
                <p>
                  Keyboard and Mouse combo
                </p>
              </div>
              <div style="padding:20px">
                <a href="index.php?category=mouse&name=Mouse"><img class="zoom" style="width:200px" src="../admin/icon/mouse.jpeg" /></a>
                <p>
                  Mouse
                </p>
              </div>
              <div style="padding:20px">
                <a href="index.php?category=monitor&name=Monitor"><img class="zoom" style="width:200px" src="../admin/icon/monitor.jpeg" /></a>
                <p>
                  Monitor
                </p>
              </div>
          </div>
        <?php
      } else {
          ?>
          <div style="display:grid;grid-template-columns: auto auto auto auto auto;padding:10px">
              <div style="padding:20px">
                <a href="index.php?category=casingfan&name=Casing%20Fan"><img class="zoom" style="width:200px" src="../admin/icon/casing fan.jpeg" /></a>
                <p>
                  Casing Fan
                </p>
              </div>
              <div style="padding:20px">
                <a href="index.php?category=cpuheatsink&name=CPU%20Heatsink"><img class="zoom" style="width:200px" src="../admin/icon/casing fan.jpeg" /></a>
                <p>
                  Heat Sink
                </p>
              </div>
              <div style="padding:20px">
              <a href="index.php?category=graphiccard&name=Graphic%20Card"><img class="zoom" style="width:200px" src="../admin/icon/graphic card.jpeg" /></a>
                <p>
                  Graphic Card
                </p>
              </div>
              <div style="padding:20px">
                <a href="index.php?category=internalharddrive&name=Internal%20Hard%20Drive"><img class="zoom" style="width:200px" src="../admin/icon/internalharddisk.jpeg" /></a>
                <p>
                  Internal Hard Drive
                </p>
              </div>
              <div style="padding:20px">
                <a href="index.php?category=motherboard&name=Motherboard"><img class="zoom" style="width:200px" src="../admin/icon/motherboard.jpeg" /></a>
                <p>
                  Motherboard
                </p>
              </div>
              <div style="padding:20px">
                 <a href="index.php?category=powersupply&name=Power%20Supply"><img class="zoom" style="width:200px" src="../admin/icon/power supply.jpeg" /></a>
                <p>
                  Power Supply
                </p>
              </div>
              <div style="padding:20px">
                <a href="index.php?category=processor&name=Processor"><img class="zoom" style="width:200px" src="../admin/icon/cpu.jpeg" /></a>
                <p>
                  Processor
                </p>
              </div>
              <div style="padding:20px">
                <a href="index.php?category=ram&name=RAM"><img class="zoom" style="width:200px" src="../admin/icon/ram.jpeg" /></a>
                <p>
                  RAM
                </p>
              </div>
              <div style="padding:20px">
                <a href="index.php?category=solidstatedrive&name=Solid%20State%20Drive(SSD)"><img class="zoom" style="width:200px" src="../admin/icon/ssd.jpeg" /></a>
                <p>
                  Solid State Drive (SSD)
                </p>
              </div>
          </div>
          <?php
        }
           ?>
        </div>
    </div>
	</body>
</html>
