<?php
require('../../fpdf181/fpdf.php');
session_start();

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "phplogin";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
$orderno=$_GET['orderno'];
$sql = "SELECT * FROM purchase WHERE orderno=$orderno";
$result = mysqli_query($conn, $sql);
$count=0;
$totalcost=0;
$name=$_SESSION['id'];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $time=$row['timepurchase'];
        $orderno=$row['orderno'];
        $total=number_format($row['paid'], 2);
        $pay=$row['paid'];
        $servicetax=6;
        if ($row['paid']>80) {
            $shipping=0;
        } else {
            $shipping=8;
        }
    }
}
$sql3 = "SELECT * FROM accounts WHERE id=$name";
$result3 = mysqli_query($conn, $sql3);
if (mysqli_num_rows($result3) > 0) {
    while ($row1 = mysqli_fetch_assoc($result3)) {
        $account=$row1['nickname'];
        $user=$row1['username'];
    }
}


$pdf = new FPDF('P', 'mm', 'A4');

$pdf->AddPage();

$pdf->SetFont('Arial', '', 40);

$pdf->Cell(200, 20, "The C Shop", 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(200, 5, '', 0, 1);
$pdf->Cell(55, 8, "Reference ID", 0, 0);
$pdf->Cell(58, 8, ": $orderno", 0, 0);
$pdf->Cell(25, 8, 'Date', 0, 0);
$pdf->Cell(52, 8, ": $time", 0, 1);

$pdf->Cell(55, 8, 'Channel', 0, 0);
$pdf->Cell(52, 8, ': Online', 0, 1);

$pdf->Cell(55, 8, 'Status', 0, 0);
$pdf->Cell(58, 8, ': Complete', 0, 1);

$pdf->Line(10, 31, 200, 31);
$pdf->Ln(10);
$pdf->Cell(20, 8, 'No.', 0, 0);
$pdf->Cell(100, 8, 'Product Name', 0, 0);
$pdf->Cell(30, 8, 'Quantity', 0, 0);
$pdf->Cell(30, 8, 'Cost', 0, 1);
$pdf->Ln(5);

$sql1 = "SELECT * FROM purchase WHERE username='$user' AND orderno=$orderno";
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_assoc($result1)) {
      $sql4 = "SELECT * FROM purchased WHERE orderno=$orderno";
      $result4=mysqli_query($conn,$sql4);
      while($row2=mysqli_fetch_assoc($result4)){
        $id=$row2['productid'];
        $sql2 = "SELECT * FROM product WHERE id=$id";
        $result2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result2) > 0) {
            while ($rows = mysqli_fetch_assoc($result2)) {
                $count++;
                $name=$rows['name'];
                $quantity=$row2['quantity'];
                $discount=$rows['discount'];
                if ($discount>0) {
                    $cost=number_format($rows['price'], 2);
                    $pdf->Cell(20, 8, "$count", 0, 0);
                    $pdf->SetFont('Arial', '', 10);
                    $pdf->Cell(100, 8, "$name", 0, 0);
                    $pdf->SetFont('Arial', '', 12);
                    $pdf->Cell(30, 8, "$quantity", 0, 0);
                    $pdf->Cell(30, 8, "RM $cost", 0, 1);
                    $cost1=$rows['price'];
                    $discountamount=$cost1*($discount/100);
                    $afterd=$cost1*(1-$discount/100);
                    $afterd1=$cost1*(1-$discount/100);
                    $afterd=number_format($afterd, 2);
                    $discountamount=number_format($discountamount, 2);
                    $pdf->Cell(120, 8, "", 0, 0);
                    $pdf->Cell(30, 8, "discount $discount%", 0, 0);
                    $pdf->Cell(30, 8, "-RM $discountamount", 0, 1);
                    $pdf->Cell(150, 8, "", 0, 0);
                    $pdf->Cell(30, 8, "RM $afterd", 0, 1);
                    $totalcost+=$afterd1;
                } else {
                    $cost=number_format($rows['price'], 2);
                    $pdf->Cell(20, 8, "$count", 0, 0);
                    $pdf->SetFont('Arial', '', 10);
                    $pdf->Cell(100, 8, "$name", 0, 0);
                    $pdf->SetFont('Arial', '', 12);
                    $pdf->Cell(30, 8, "$quantity", 0, 0);
                    $pdf->Cell(30, 8, "RM $cost", 0, 1);
                    $totalcost+=$rows['price'];
                }
            }
        } else {
            $sql2 = "SELECT * FROM deleted WHERE id=$id";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
                while ($rows = mysqli_fetch_assoc($result2)) {
                    $count++;
                    $name=$rows['name'];
                    $quantity=$row2['quantity'];
                    $discount=$rows['discount'];
                    if ($discount>0) {
                        $cost=number_format($rows['price'], 2);
                        $pdf->Cell(20, 8, "$count", 0, 0);
                        $pdf->Cell(100, 8, "$name", 0, 0);
                        $pdf->Cell(30, 8, "$quantity", 0, 0);
                        $pdf->Cell(30, 8, "RM $cost", 0, 1);
                        $discountamount=$cost*($discount/100);
                        $afterd=$cost*(1-$discount/100);
                        $pdf->Cell(120, 8, "", 0, 0);
                        $pdf->Cell(30, 8, "discount $discount%", 0, 0);
                        $pdf->Cell(30, 8, "-RM $discountamount", 0, 1);
                        $pdf->Cell(150, 8, "", 0, 0);
                        $pdf->Cell(30, 8, "RM $afterd", 0, 1);
                        $totalcost+=$afterd;
                    } else {
                        $cost=number_format($rows['price'], 2);
                        $pdf->Cell(20, 8, "$count", 0, 0);
                        $pdf->Cell(100, 8, "$name", 0, 0);
                        $pdf->Cell(30, 8, "$quantity", 0, 0);
                        $pdf->Cell(30, 8, "RM $cost", 0, 1);
                        $totalcost+=$rows['price'];
                    }
                }
            }
        }
      }
    }
}
$totalcost=$pay*1.06;
$finalpaid=$totalcost+$shipping;
$finalpaid=number_format($finalpaid, 2);
$totalcost=number_format($totalcost, 2);
$shipping=number_format($shipping, 2);
$pdf->Cell(120, 8, '', 0, 0);
$pdf->Cell(30, 8, 'Total', 0, 0);
$pdf->Cell(30, 8, "RM $total", 0, 1);

$pdf->Ln(15);
$pdf->Cell(55, 8, 'Service Tax', 0, 0);
$pdf->Cell(58, 8, ": $servicetax %", 0, 1);

$pdf->Cell(55, 8, 'After tax', 0, 0);
$pdf->Cell(58, 8, ": RM $totalcost", 0, 1);

$pdf->Cell(55, 8, 'Shipping fee', 0, 0);
$pdf->Cell(58, 8, ": RM $shipping", 0, 1);

$pdf->Cell(55, 8, 'Total paid', 0, 0);
$pdf->Cell(58, 8, ": RM $finalpaid", 0, 1);

$pdf->Line(10, 65, 200, 65);
$pdf->Ln(10);//Line break
$pdf->Cell(55, 8, 'Paid by', 0, 0);
$pdf->Cell(58, 8, ": $account", 0, 1);


$pdf->Ln(5);//Line break
if ($_GET['type']=="view") {
    $pdf->Output( 'I','receipt.pdf');
} elseif ($_GET['type']=="download") {
    $pdf->Output( 'D','receipt.pdf');
}
