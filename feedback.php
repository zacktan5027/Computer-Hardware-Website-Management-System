<?php
$id = $_GET['id'];
$location=$_GET['location'];
if(isset($_GET['categoryname'])){
$categoryname=$_GET['categoryname'];
}
if(isset($_GET['search'])){
  $search=$_GET['search'];
}
if (!isset($_SESSION['loggedin'])) {
  if($_GET['location']=="category"){
    echo("<script LANGUAGE='JavaScript'>
  window.alert('Please sign in first.');
  window.location.href='productdetail.php?action=add&id=$id&categoryname=$categoryname&location=$location';
  </script>");
} else if($_GET['location']=="search"){
  echo("<script LANGUAGE='JavaScript'>
window.alert('Please sign in first.');
window.location.href='productdetail.php?action=add&id=$id&search=$search&location=$location';
</script>");
  }
}
 ?>
