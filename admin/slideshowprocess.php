<?php
session_start();

$target_dir = "slideshow/";
$target = $target_dir . basename($_FILES["image"]["name"]);
$image = $_FILES['image']['name'];

echo $image;
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "phplogin";

# Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if ($stmt = $conn->prepare('INSERT INTO `slideshow`(`image`) VALUES (?)')) {
  $stmt->bind_param('s',$image);
  $stmt->execute();
  move_uploaded_file($_FILES["image"]["tmp_name"], $target);
  echo("<script LANGUAGE='JavaScript'>
      window.alert('Succesfully added picture.');
      window.location.href='slideshow.php';
      </script>");
}

?>
