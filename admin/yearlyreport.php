<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit();
}
if (isset($_POST['year'])) {
    $_SESSION['year']=$_POST['year'];
}
$year=date('Y', time());
settype($year, "integer");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Yearly Report</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
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
          <a style="float:left" href="report.php"><i class="fas fa-arrow-circle-left"></i> Back</a>
      </div>
      <div class="function">
          <a style="float:right" href="yearlyreport.php?type=table&year=<?php echo $_SESSION['year']?>"><i class="fas fa-table"></i> Summary</a>
          <a style="float:right" href="yearlyreport.php?type=graph&year=<?php echo $_SESSION['year']?>"><i class="fas fa-chart-bar"></i> Graph</a>
          <br /><br />
      </div>
		<div class="content">
      <form method="post" action="yearlyreport.php?type=<?php echo $_GET['type']?>">
      <h2>Input year:</h2>
      <input style="display:block" name="year" required type="number" oninput="maxLengthCheck(this)" maxlength="4" min="2000" max="<?php echo $year ?>" >
      <script>
      function maxLengthCheck(object)
        {
          if (object.value.length > object.maxLength)
          object.value = object.value.slice(0, object.maxLength)
        }
      </script>
      <input style="width:100%" type="submit" value="Yearly Report"/>
      </form>
      <br />
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
      <?php
      if (!isset($_SESSION['year'])) {
          $_SESSION['year']=$_POST['year'];
      } else {
          if (isset($_POST['year'])) {
              $_SESSION['year']=$_POST['year'];
          }
      }
      $year = $_SESSION['year'];
      $host = "localhost";
      $dbUsername = "root";
      $dbPassword = "";
      $dbname = "phplogin";

      $subtotal=0;
      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
      if ($_GET['type']=="table") {
          $sql ="SELECT * FROM report WHERE year = $year GROUP BY month order by month";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
              // output data of each row
              echo "<table class='table-all hoverable' style='width:100%' border='1' cellpadding='10'";
              echo "<thread>";
              echo "<th>Month</th>";
              echo "<th>Total Sales</th>";
              echo "</thread>";
              while ($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                  echo "<td style='width:100px'>" . $row['year'].'-'.$row['month'] . "</td>";
                  $paid=number_format($row['paid'], 2);
                  echo "<td style='width:100px'>RM " . $paid . "</td>";
                  echo "</tr>";
                  $subtotal+=$row['paid'];
              } ?>
                <td align="right"><strong>Total</strong></td>
                <td align="right">RM <?php echo number_format($subtotal, 2); ?></td>
                <?php
              echo "</table>";
          } else {
              echo "0 result";
          }
      } elseif ($_GET['type']=="graph") {
          $con  = mysqli_connect("localhost", "root", "", "phplogin");
          if (!$con) {
              # code...
              echo "Problem in database connection! Contact administrator!" . mysqli_error();
          } else {
              $sql ="SELECT * FROM report WHERE year = $year GROUP BY month order by month";
              $result = mysqli_query($conn, $sql);
              $chart_data="";
              if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_array($result)) {
                      $productname[]  = $row['year']."-".$row['month'];
                      $sales[] = $row['paid'];
                  } ?>
     </div>
       <div class="content" style="width:50%">
         <div>
             <h2 class="page-header" >Analytics Reports </h2>
             <div>Sales (RM)</div><br />
             <canvas  id="chartjs_bar"></canvas>
             <div style="float:right">Month</div>
         </div>
       </div>
         <script src="//code.jquery.com/jquery-1.9.1.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
       <script type="text/javascript">
             var ctx = document.getElementById("chartjs_bar").getContext('2d');
                       var myChart = new Chart(ctx, {
                           type: 'bar',
                           data: {
                               labels:<?php echo json_encode($productname); ?>,
                               datasets: [{
                                   backgroundColor: [
                                      "#5969ff",
                                       "#ff407b",
                                       "#25d5f2",
                                       "#ffc750",
                                       "#2ec551",
                                       "#7040fa",
                                       "#ff004e"
                                   ],
                                   data:<?php echo json_encode($sales); ?>,
                               }]
                           },
                           options: {
                             scales: {
                               yAxes: [{
                                 ticks: {
                                   beginAtZero: true,
                                   suggestedMin: 3
                                 }
                               }]
                             },
                                  legend: {
                               display: false,
                               position: 'bottom',

                               labels: {
                                   fontColor: '#71748d',
                                   fontFamily: 'Circular Std Book',
                                   fontSize: 14,
                               }
                           },


                       }
                       });
           </script>
         <?php
              } else {
                  echo "0 result";
              }
          }
      }
      ?>
       </html>
	</body>
</html>
