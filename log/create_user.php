<?php include('functions.php') ?>
<?php include ('homeserver.php');?> 

<!DOCTYPE html>
<html>
<head>
	<title>Accept</title>	
	  <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- semanti-ui -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body>
		<div class="header">
<?php require_once ("header.php"); ?>

	</div>

<?php
    $query = "select * from `requests` order by `id`; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
           				$product_name = $row['product_name'];
															$product_price = $row['product_price'];
															$product_desc = $row['product_desc'];
															$product_image = $row['product_image'];
															$id = $row['id'];

																	$query = "INSERT INTO `productdb` (`id`,`product_name`,`product_price`, `product_desc`, `product_image`) VALUES (NULL,'$product_name','$product_price', '$product_desc', '$product_image');";
															mysqli_query($db, $query);
        }
        $query .= "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
        if(performQuery($query)){
            echo "Product has been accepted.";
        }else{
										
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }
      ?>
<br/><br/>

<a href="home.php">Back</a>

</body>
</html>