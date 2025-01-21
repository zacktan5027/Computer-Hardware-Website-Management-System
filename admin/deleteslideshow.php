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
    // We don't have the password or email info stored in sessions so instead we can get the results from the database.
    $stmt = $con->prepare('DELETE FROM slideshow WHERE id ='.$id.'');
    // In this case we can use the account ID to get the account info.
    $stmt->execute();
    echo("<script LANGUAGE='JavaScript'>
		window.alert('Succesfully deleted.');
		window.location.href='slideshow.php';
		</script>");
    unlink('slideshow/'.$image.'');
}
$conn->close();
?>
