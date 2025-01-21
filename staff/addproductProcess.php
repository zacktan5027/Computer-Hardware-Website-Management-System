<?php
session_start();
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $stock = $_POST['stock'];
    if($discount>100 || $discount<0)
    echo("<script LANGUAGE='JavaScript'>
        window.alert('Invalid input in field **discount**');
        window.location.href='addproduct.php?name=$name&description=$description&price=$price&discount=$discount&stock=$stock';
        </script>");
    $category = $_POST['category'];
    $target_dir = "../admin/images/";
    $target = $target_dir . basename($_FILES["image"]["name"]);
    $image = $_FILES['image']['name'];
    if (file_exists($target)) {
      echo("<script LANGUAGE='JavaScript'>
          window.alert('Image already exist.');
          window.location.href='addproduct.php?name=$name&description=$description&price=$price&discount=$discount&stock=$stock';
          </script>");
} else {
if (!empty($name) || !empty($description) || !empty($price) || !empty($stock)|| !empty($category)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "phplogin";

    # Create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno().')' . mysqli_connect_error());
    } else {
        $stmt = $conn->prepare('SELECT name From product Where name = ?');
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $stmt->bind_result($name);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if ($rnum ==0) {
            if ($stmt = $conn->prepare('INSERT INTO `product`(`name`, `description`,`category`, `price`, `discount`, `stock`,`image`,`edit`) VALUES (?,?,?,?,?,?,?,?)')) {
                // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
                $stmt->bind_param('sssiiiss', $name, $description, $category, $price, $discount, $stock, $image,$_SESSION['name']);
                $stmt->execute();
                move_uploaded_file($_FILES["image"]["tmp_name"], $target);
                echo("<script LANGUAGE='JavaScript'>
								    window.alert('Succesfully added product.');
								    window.location.href='home.php';
								    </script>");
            } else {
                // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
                echo 'Could not prepare statement!';
            }
        } else {
            echo("<script LANGUAGE='JavaScript'>
							window.alert('Name exist, please use another one.');
							window.location.href='addproduct.php?name=$name&description=$description&price=$price&discount=$discount&stock=$stock';
							</script>");
        }
    }
    $conn->close();
} else {
    echo "All field are required";
    die();
}
}
?>
