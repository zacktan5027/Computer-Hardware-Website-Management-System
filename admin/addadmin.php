<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add Staff</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
  background-color: black;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  }

  .container input[type=submit]:hover {
  background-color: white;
	color: black;
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
				<h2>Staff Registration</h2>
      <form action="addadminProcess.php" method="post" autocomplete="off">
          <div class="container">
						<div>
              <div>
                <label for="username"><b>Staff ID</b></label>
                  <div>
                    <input type="text" name="username" maxlength="6" placeholder="Staff ID" id="username" required>
                  </div>
              </div>
							<div>
								<label for="username"><b>Staff name</b></label>
									<div>
										<input type="text" name="nickname" maxlength="25" placeholder="Nickname" id="nickname" required>
									</div>
							</div>
							<style>
							#message {
								display:none;
								background: #f1f1f1;
								color: #000;
								position: relative;
								padding: 20px;
								margin-top: 10px;
							}

							#message p {
								padding: 10px 35px;
								font-size: 18px;
							}

							#message2 {
								display:none;
								background: #f1f1f1;
								color: #000;
								position: relative;
								padding: 20px;
								margin-top: 10px;
							}

							#message2 p {
								padding: 10px 35px;
								font-size: 18px;
							}
							/* Add a green text color and a checkmark when the requirements are right */
							.valid {
								color: green;
							}

							.valid:before {
								position: relative;
								left: -35px;
								content: "✔";
							}

							/* Add a red text color and an "x" icon when the requirements are wrong */
							.invalid {
								color: red;
							}

							.invalid:before {
								position: relative;
								left: -35px;
								content: "✖";
							}
						</style>
							<div><label for="password"><b>Password*</b></label>
										<div>
												 <input type="password" id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" maxlength="15" placeholder="Password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
												 <input type="checkbox" onclick="myFunction()">Show Password
										</div>
							<div id="message">
								<h3>Password must contain the following:</h3>
								<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
								<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
								<p id="number" class="invalid">A <b>number</b></p>
								<p id="length" class="invalid">Minimum <b>8 characters</b></p>
							</div>
							</div>
							<div><label for="password"><b>Re-enter Your Password*</b></label>
								<div>
										<input type="password" id="psw2" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" maxlength="15" placeholder="Password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
										<input type="checkbox" onclick="myFunction()">Show Password
								</div>
								<div id="message2">
									<h3>Password must match with the previous password:</h3>
									<p id="letter2" class="invalid"><b>Match</b></p>
								</div>
							 </div>
									<script>
									var myInput = document.getElementById("psw");
									var letter = document.getElementById("letter");
									var capital = document.getElementById("capital");
									var number = document.getElementById("number");
									var length = document.getElementById("length");
									var myInput2 = document.getElementById("psw2");

									// When the user clicks on the password field, show the message box
									myInput.onfocus = function() {
										document.getElementById("message").style.display = "block";
									}

									// When the user clicks outside of the password field, hide the message box
									myInput.onblur = function() {
										document.getElementById("message").style.display = "none";
										}

										// When the user clicks on the password field, show the message box
										myInput2.onfocus = function() {
											document.getElementById("message2").style.display = "block";
										}

										// When the user clicks outside of the password field, hide the message box
										myInput2.onblur = function() {
											document.getElementById("message2").style.display = "none";
										}

										// When the user starts to type something inside the password field
										myInput.onkeyup = function() {
											// Validate lowercase letters
											var lowerCaseLetters = /[a-z]/g;
											if(myInput.value.match(lowerCaseLetters)) {
												letter.classList.remove("invalid");
												letter.classList.add("valid");
											} else {
												letter.classList.remove("valid");
												letter.classList.add("invalid");
											}

											// Validate capital letters
											var upperCaseLetters = /[A-Z]/g;
											if(myInput.value.match(upperCaseLetters)) {
												capital.classList.remove("invalid");
												capital.classList.add("valid");
											} else {
												capital.classList.remove("valid");
												capital.classList.add("invalid");
											}

											// Validate numbers
											var numbers = /[0-9]/g;
											if(myInput.value.match(numbers)) {
												number.classList.remove("invalid");
												number.classList.add("valid");
											} else {
												number.classList.remove("valid");
												number.classList.add("invalid");
											}

											// Validate length
											if(myInput.value.length >= 8) {
												length.classList.remove("invalid");
												length.classList.add("valid");
											} else {
												length.classList.remove("valid");
												length.classList.add("invalid");
											}
										}
										myInput2.onkeyup = function() {
											if(document.getElementById("psw2").value ==document.getElementById("psw").value) {
												letter2.classList.remove("invalid");
												letter2.classList.add("valid");
											} else {
												letter2.classList.remove("valid");
												letter2.classList.add("invalid");
											}
										}
										function myFunction() {
											var x = document.getElementById("psw");
											if (x.type === "password") {
												x.type = "text";
											} else {
												x.type = "password";
											}
										}
									</script>
          <div>
            <label for="email"><b>Email</b></label>
              <div>
								<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}" maxlength="30" placeholder="Email" id="squestion" required />
              </div>
          </div>
	  			     <input style="width:30%" type="submit" name="register" value="Register" />
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
							 <a class="reset" style="padding:15px" href="addadmin.php">Reset</a>
						 </div>
      </form>
    </div>
	</body>
</html>
