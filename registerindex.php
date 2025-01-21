<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Customer Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
background-color: lawngreen;
}

.container div {
border-radius: 5px;
background-color: #f2f2f2;
padding: 20px;
}
</style>
</head>
<body class="loggedin">
  <div id="id01" class="modal">
    <form class="modal-content animate" action="authenticate.php" method="post">
      <div style="margin:16px">
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
               <form action="searchproduct.php" method="post" autocomplete="off" >
                 <input type="text" placeholder="Search.." name="search" maxlength="25" required>
                 <button type="submit"><i class="fa fa-search"></i></button>
               </form>
             </div>
          </nav>
  <div class="content">
  	<h1 style="font-size:36px">Customer Registration</h1>
  <form action="register.php" method="post" autocomplete="off">
    <h4 style="color: red;">The field with (*) is required</h4>
      <div class="container">
          <div>
            <label for="username"><b>Username*</b></label>
              <div>
                <input type="text" name="username" placeholder="Username" id="textbox" maxlength="15" required />
                <div id="error_msg"></div>
              </div>
            </div>
            <script>
            $(document).ready(function(){
              $("#textbox").keypress(function (e) {
                $("#error_msg").html("");
                var key = e.keyCode;
                $return = ((key >= 48 && key <= 57) || (key > 64 && key < 91) || (key > 96 && key < 123)  );
                if(!$return) {
                  $("#error_msg").html("No special characters Please!");
                  return false;
                }
              });
            });
            </script>
              <div>
                <label for="nickname"><b>Nickname*</b></label>
                <div>
                  <input type="text" name="nickname" placeholder="Nickname" maxlength="20" required />
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
                 <input type="checkbox" onclick="myFunction()">Show Password<div id="error_msg2"></div>
            </div>
            <script>
            $(document).ready(function(){
              $("#psw").keypress(function (e) {
                $("#error_msg2").html("");
                var key = e.keyCode;
                $return = ((key >= 48 && key <= 57) || (key > 64 && key < 91) || (key > 96 && key < 123)  );
                if(!$return) {
                  $("#error_msg2").html("No special characters Please!");
                  return false;
                }
              });
            });
            </script>
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
            <input type="checkbox" onclick="myFunction()">Show Password<div id="error_msg3"></div>
       </div>
       <script>
       $(document).ready(function(){
         $("#psw2").keypress(function (e) {
           $("#error_msg3").html("");
           var key = e.keyCode;
           $return = ((key >= 48 && key <= 57) || (key > 64 && key < 91) || (key > 96 && key < 123)  );
           if(!$return) {
             $("#error_msg3").html("No special characters Please!");
             return false;
           }
         });
       });
       </script>
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
        <label for="email"><b>Email*</b></label>
          <div>
            <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}" maxlength="30" placeholder="Email" id="squestion" required />
          </div>
      </div>
      <div>
        <label for="gender"><b>Gender</b></label>
        <div>
          <select name="gender">
          <option selected="selected" value="">Please choose one</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          </select>
        </div>
      </div>
      <div>
        <label for="address1"><b>Address1</b></label>
          <div>
            <input type="text" name="address1" maxlength="25" placeholder="Address1" />
          </div>
      </div>
      <div>
        <label for="address2"><b>Address2</b></label>
          <div>
            <input type="text" name="address2" maxlength="25" placeholder="Address2" />
          </div>
      </div>
      <div>
        <label for="postcode"><b>Post Code</b></label>
          <div>
            <input title="Please input number only" type="text" pattern="\d*" name="postcode" id="pos" minlength="5" maxlength="5" placeholder="Post Code" />
          </div>
      </div>
      <div>
        <label for="city"><b>City</b></label>
          <div>
            <input type="text" name="city" maxlength="25" placeholder="City"  />
          </div>
      </div>
      <div>
        <label for="state"><b>State</b></label>
        <br /><br />
        <div>
          <select name="state">
          <option value="">Please choose one</option>
          <option value="Kedah">Kedah</option>
          <option value="Pulau Penang">Pulau Penang</option>
          <option value="Perlis">Perlis</option>
          <option value="Negeri Sembilan">Negeri Sembilan</option>
          <option value="Malacca">Malacca</option>
          <option value="Selangor">Selangor</option>
          <option value="Perak">Perak</option>
          <option value="Johor">Johor</option>
          <option value="Terengganu">Terengganu</option>
          <option value="Kelantan">Kelantan</option>
          <option value="Pahang">Pahang</option>
          <option value="Sabah">Sabah</option>
          <option value="Sarawak">Sarawak</option>
          </select>
        </div>
        </div>
      <div>
        <label for="security question"><b>Security Question*</b></label>
        <br /><br />
        <div>
          <select name="squestion" required>
          <option value="">Please choose one</option>
          <option value="1">What is your primary school name</option>
          <option value="2">What is your first pet name</option>
          <option value="3">Where do you born at</option>
          <option value="4">What is your mother's name</option>
          <option value="5">What is your favourite hobby</option>
          </select>
        </div>
        </div>
        <div>
          <label for="security answer"><b>Security Answer*</b></label>
            <div>
              <input type="text" name="sanswer" placeholder="Your answer" id="sanswer" maxlength="25" required />
            </div>
        </div>
          <div align="center">
  			     <input style="width:30%" type="submit" name="register" value="Register" />
             <a href="registerindex.php"><input style="width:30%" type="submit" name="reset" value="Reset" /></a>
            </div>
  </form>
</div>
</body>
</html>
