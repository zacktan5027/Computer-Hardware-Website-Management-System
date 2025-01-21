<?php
session_start();
$con=mysqli_connect("localhost", "root", "", "phplogin");
$stmt = $con->prepare('SELECT orderno FROM purchase ORDER BY orderno DESC LIMIT 1');
$stmt->execute();
$stmt->bind_result($orderno);
$stmt->fetch();
$stmt->close();
$orderno = $orderno + 1;
$_SESSION['orderno']=$orderno;
date_default_timezone_set('Asia/Kuala_Lumpur');
$date = date('y-m-d h:i:s a', time());
$total = 0;
$status="Wait to be shipped";
$name = $_SESSION['name'];
if (!empty($_SESSION['shopping_cart'])) {
    foreach ($_SESSION['shopping_cart'] as $keys => $values) {
        $total = $total + ($values['item_quantity'] * $values['item_price']);
        $stmt = $con->prepare('INSERT INTO `purchased`(`productid`, `quantity`, `orderno`) VALUES (?,?,?)');
        $stmt->bind_param('sss',$values['item_id'],$values['item_quantity'],$orderno);
        $stmt->execute();
        $stmt->close();
      }
      if($stmt = $con->prepare("SELECT address1,address2,postcode FROM accounts WHERE username = ?")){
        $stmt->bind_param('s',$name);
        $stmt->execute();
        $stmt->bind_result($address1,$address2,$postcode);
        $stmt->fetch();
        $stmt->close();
        if($address1!=null&&$address2!=null&&$postcode!=null){
        if ($stmt = $con->prepare('INSERT INTO `purchase`(`orderno`, `username`, `timepurchase`, `paid`, `status`) VALUES (?,?,?,?,?)')) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $stmt->bind_param('sssss', $orderno, $name, $date, $total,$status);
            $stmt->execute();
            $stmt->close();
            $stmt = $con->prepare('SELECT sold FROM product WHERE id=?');
            $stmt->bind_param('i',$values["item_id"]);
            // In this case we can use the account ID to get the account info.
            $stmt->execute();
            $stmt->bind_result($sold);
            $stmt->fetch();
            $stmt->close();
            $sold+=$values["item_quantity"];
            $stmt = $con->prepare('UPDATE `product` SET `sold`=? WHERE id=?');
            $stmt->bind_param('ii',$sold,$values["item_id"]);
            $stmt->execute();
            $stmt->close();
            $stmt = $con->prepare('SELECT stock FROM product WHERE id=?');
            $stmt->bind_param('i',$values["item_id"]);
            // In this case we can use the account ID to get the account info.
            $stmt->execute();
            $stmt->bind_result($stock);
            $stmt->fetch();
            $stmt->close();
            $stock-=$values["item_quantity"];
            $stmt = $con->prepare('UPDATE `product` SET `stock`=? WHERE id=?');
            $stmt->bind_param('ii',$stock,$values["item_id"]);
            $stmt->execute();
            $stmt->close();
            echo("<script LANGUAGE='JavaScript'>
            window.location.href='report.php';
            </script>");
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            echo 'Could not prepare statement!';
        }
    } else {
      echo("<script LANGUAGE='JavaScript'>
      window.alert('Please update your location first');
      window.location.href='orderlist.php';
      </script>");
    }
} else {
    // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
    echo 'Could not prepare statement!';
}
} else {
  echo("<script LANGUAGE='JavaScript'>
  window.alert('You have not choose any product yet.');
  window.location.href='orderlist.php';
  </script>");
}
?>
