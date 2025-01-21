<?php
session_start();
$id=$_GET['id'];
$image=$_GET['image'];
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
} else {
  $sql = "SELECT * FROM product WHERE id =$id";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);
  $id=$row['id'];
  $name=$row['name'];
  $price=$row['price'];
  $discount=$row['discount'];
    $stmt = $con->prepare("INSERT INTO deleted(`id`, `name`, `price`, `discount`) VALUES (?,?,?,?)");
    $stmt->bind_param('ssss',$id,$name,$price,$discount);
    $stmt->execute();
    $stmt->close();
    // We don't have the password or email info stored in sessions so instead we can get the results from the database.
    $stmt = $con->prepare('DELETE FROM product WHERE id ='.$id.'');
    // In this case we can use the account ID to get the account info.
    $stmt->execute();
    echo("<script LANGUAGE='JavaScript'>
		window.alert('Succesfully deleted.');
    window.location.href='home.php?';
		</script>");
    unlink('images/'.$image.'');
}
$con->close();
?>
