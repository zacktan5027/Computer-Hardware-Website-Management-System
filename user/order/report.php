<?php
session_start();
$con=mysqli_connect("localhost", "root", "", "phplogin");
$year=date('Y', time());
settype($year, "integer");
$month=date('m', time());
settype($month, "integer");
$day=date('d', time());
settype($day, "integer");
$total=0;
foreach ($_SESSION["shopping_cart"] as $keys => $values) {
    $total = $total + ($values["item_quantity"] * $values["item_price"]);
}
if (!empty($_SESSION["shopping_cart"])) {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        if ($stmt = $con->prepare('SELECT year,month,day FROM report WHERE year=? AND month=? AND day=?')) {
            $stmt->bind_param('sss', $year, $month, $day);
            $stmt->execute();
            $stmt->store_result();
            $rnum = $stmt->num_rows;
            $stmt->close();
            if ($rnum ==0) {
                $stmt = $con->prepare("INSERT INTO report(year,month,day,paid) VALUES (?,?,?,?)");
                $stmt->bind_param('ssss', $year, $month, $day, $total);
                $stmt->execute();
                echo("<script LANGUAGE='JavaScript'>
            window.alert('Succesfully purchased.');
            window.location.href='../home.php';
            </script>");
                unset($_SESSION['shopping_cart']);
            } else {
                $stmt = $con->prepare('SELECT paid FROM report WHERE year=? AND month=? AND day=?');
                $stmt->bind_param('sss', $year, $month, $day);
                // In this case we can use the account ID to get the account info.
                $stmt->execute();
                $stmt->bind_result($paid);
                $stmt->fetch();
                $stmt->close();
                $paid+=$total;
                $stmt = $con->prepare('UPDATE `report` SET `paid`=? WHERE year=? AND month=? AND day=?');
                $stmt->bind_param('ssss', $paid, $year, $month, $day);
                $stmt->execute();
                $stmt->close();
                echo("<script LANGUAGE='JavaScript'>
  window.alert('Succesfully purchased.');
  window.location.href='../home.php';
  </script>");

                unset($_SESSION['shopping_cart']);
            }
        }
    }
}
