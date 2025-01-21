<?php
session_start();
if(isset($_SESSION['shopping_cart'])){
unset($_SESSION['shopping_cart']);
// Redirect to the login page:
echo("<script LANGUAGE='JavaScript'>
window.alert('The list has been clear.');
window.location.href='orderlist.php';
</script>");
} else {
  echo("<script LANGUAGE='JavaScript'>
  window.alert('The list is empty.');
  window.location.href='orderlist.php';
  </script>");
}
?>
