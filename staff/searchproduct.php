<?php
session_start();
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "phplogin";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if(isset($_GET['search'])){
  $search=$_GET['search'];
} else {
  $search = $_POST['search'];
}

$sql = "SELECT * FROM product WHERE name LIKE '%". $search ."%' ORDER BY id";
$result = mysqli_query($conn, $sql);
if(isset($_GET['search'])){
}else{
if (empty($_POST['search'])) {
  echo("<script LANGUAGE='JavaScript'>
window.alert('Please enter some text.');
window.location.href='home.php';
</script>");
}
}
 ?>
 <!DOCTYPE html>
 <html>
 	<head>
 		<meta charset="utf-8">
 		<title>Search Product</title>
 		<link href="style.css" rel="stylesheet" type="text/css">
 		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
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
    <a style="float:right" href="report.php"><i class="fas fa-newspaper"></i> Report</a>
  </div><br /><br />
 		<div class="content">
       <h2>Showing result of "<?php echo $search ?>"</h2>
      <div>
       <?php

       if (mysqli_num_rows($result) > 0) {
           // output data of each row
           echo "<table class='w3-table-all w3-hoverable' style='width:100%' border='1' cellpadding='10'";
           echo "<thread>";
           echo "<th>Image</th>";
           echo "<th>Name</th>";
           echo "<th>Price</th>";
           echo "<th>Stock</th>";
           echo "<th>Sold</th>";
           echo "<th>Description</th>";
           echo "<th>Category</th>";
           echo "<th>Edit</th>";
           echo "<th>Feedback</th>";
           echo "<th>Last edited</th>";
           echo "</thread>";
           while ($row = mysqli_fetch_assoc($result)) {
               echo "<tr>";
               echo "<td style='width:300px' ><img width='270' height='250' src='../admin/images/". $row["image"]."'</td>";
               echo "<td id=".$row['id']." style='width:200px'>" . $row['name'] . "</td>";
               echo "<td style='width:150px'>RM " . number_format($row['price'],2) . "</td>";
               echo "<td style='width:100px'>" . $row['stock'] . "</td>";
               echo "<td style='width:100px'>" . $row['sold'] . "</td>";
               echo "<td class='comment more' style='width:400px;'>" . $row['description'] . "</td>";
               echo "<td style='width:50px'>" . $row['category'] . "</td>";
               echo "<td style='width:100px;padding: 12px 20px'><a style='width:100px;padding: 10px 20px' href='feedback.php?search=".$search."&type=search&id=".$row['id']."'>Feedback</a></td>";
               echo "<td style='width:100px;padding: 12px 20px'><a style='width:100px;padding: 10px 20px' href='editproduct.php?search=".$search."&type=search&id=" . $row['id'] . "'>Edit</a></td>";
               echo "<td style='width:200px'>" . $row['edit'] . "</td>";
               echo "</tr>";
           }   echo "</table>";
       } else {
           echo "0 results";
       }
        ?>
            </div>
 		</div>
    <script>
    $(document).ready(function() {
      var showChar = 100;
      var ellipsestext = "...";
      var moretext = "more";
      var lesstext = "less";
      $('.more').each(function() {
        var content = $(this).html();

        if(content.length > showChar) {

          var c = content.substr(0, showChar);
          var h = content.substr(showChar-1, content.length - showChar);

          var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span style="display:none">' + h + ' </span>&nbsp;&nbsp;<a style="padding:5px 5px" href="" class="morelink">' + moretext + '</a></span>';

          $(this).html(html);
        }

      });

      $(".morelink").click(function(){
        if($(this).hasClass("less")) {
          $(this).removeClass("less");
          $(this).html(moretext);
        } else {
          $(this).addClass("less");
          $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
      });
    });
    </script>
 	</body>
 </html>
