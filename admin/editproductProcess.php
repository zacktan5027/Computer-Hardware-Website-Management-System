<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$target_dir = "images/";
$target = $target_dir . basename($_FILES["image"]["name"]);
$image = $_FILES['image']['name'];
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
} else {
    if ($image=="") {
        // We don't have the password or email info stored in sessions so instead we can get the results from the database.
        $stmt = $con->prepare('UPDATE `product` SET `name`=?,`description`=?,`category`=?,`price`=?,`discount`=?,`stock`=?,`edit`=? WHERE id ='.$_POST['id'].'');
        // In this case we can use the account ID to get the account info.
        $stmt->bind_param('sssiiis', $_POST['name'], $_POST['description'], $_POST['category'], $_POST['price'], $_POST['discount'], $_POST['stock'], $_SESSION['name']);
        $stmt->execute();
        echo("<script LANGUAGE='JavaScript'>
		window.alert('11Succesfully updated');
		window.location.href='home.php#".$_POST['id']."';
		</script>");
    } else {
      // We don't have the password or email info stored in sessions so instead we can get the results from the database.
      $stmt = $con->prepare('UPDATE `product` SET `name`=?,`description`=?,`category`=?,`price`=?,`discount`=?,`stock`=?,`image`=?,`edit`=? WHERE id ='.$_POST['id'].'');
      // In this case we can use the account ID to get the account info.
      $stmt->bind_param('sssiiiss', $_POST['name'], $_POST['description'], $_POST['category'], $_POST['price'], $_POST['discount'], $_POST['stock'], $image, $_SESSION['name']);
      $stmt->execute();
      move_uploaded_file($_FILES["image"]["tmp_name"], $target);
      echo("<script LANGUAGE='JavaScript'>
  window.alert('22Succesfully updated');
  window.location.href='home.php#".$_POST['id']."';
  </script>");
      unlink('images/'.$_SESSION['image'].'');
    }
}
$con->close();
