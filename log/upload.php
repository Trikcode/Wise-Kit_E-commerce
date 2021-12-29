
<?php 
include "functions.php";

if (isset($_POST['submit']) && isset($_FILES['file'])) {
	$name= $_POST['name'];
$price= $_POST['price'];
$product_desc = $_POST['desc'];
// $quantity= $_POST['quantity'];

	// echo "<pre>";
	// print_r($_FILES['my_image']);
	// echo "</pre>";

	$img_name = $_FILES['file']['name'];
	$img_size = $_FILES['file']['size'];
	$tmp_name = $_FILES['file']['tmp_name'];
	$error = $_FILES['file']['error'];

	

	if ($error === 0) {
		if ($img_size > 325000) {
			$em = "Sorry, your file is too large.";
		    header("Location: ../index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$folder = '../upload/'.	$img_name;
				move_uploaded_file($tmp_name, $folder);
				// Insert into Database
    $query = "INSERT INTO requests (product_name, product_price, product_desc, product_image) 
				VALUES('$name', '$price','$product_desc','$img_name')";
				mysqli_query($db, $query);
				session_start();
    $_SESSION['success_message'] = "Your item(s) will be displayed once approved. Thank you!";
				
				header("Location: ../index.php?uploadforapproval");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: ../index.php?error=$em");
			}
		}
	}else {
		$em = "You cannot upload nothing!";
		header("Location: ../index.php?error=$em");
	}

}else {
	header("Location: ../index.php");
}